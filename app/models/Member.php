<?php

include_once MODELS_PATH."post.php";

include_once MODELS_PATH."Users.php";

include_once MODELS_PATH."sms.php";


abstract class member_request
{

    const JOIN = "A";

    const APPROVED = "B";

    const REMOVED = "C";

    const UNAPPROVED = "D";

}


abstract class member_status
{

    protected $renewal;

    protected $id;


    public function __construct(String $renewal, String $user_id)
    {

        $this->renewal = $renewal;

        $this->id = $user_id;

    }


    abstract public function state();


    protected function inform_others(String $type)
    {

        $member_request = new post_member_request;


        $member_request->type = $type;
        $member_request->target_user = $this->id;

        $member_request->position = $this->getUser_Position();


        $post = new Post($member_request);

        $post->create($this->renewal);

    }


    private function getUser_Position()
    {

        $membership = new Member($this->renewal);

        return $membership->getPosition($this->id);

    }




}

class unapproved_member extends member_status
{

    public function state()
    {

        $this->inform_others(member_request::UNAPPROVED);

        return database::getInstance()->delete("members",[
            "user" => $this->id,
            "R_code" => $this->renewal
        ])->rowCount();


    }

}


class remove_member extends member_status
{

    public function state()
    {

        $this->inform_others(member_request::REMOVED);

        return database::getInstance()->delete("members",[
            "user" => $this->id,
            "R_code" => $this->renewal
        ])->rowCount();

    }

}


class approved_member extends member_status
{

    public function state()
    {


        $this->inform_others(member_request::APPROVED);


        return database::getInstance()->update('members',[
            "IsApproved" => Member::APPROVED,
            "addedBy" => Users::getSessionId(),
            "addByStaff" => Users::isStaff()
        ],
            [
                "user" => $this->id,
                "R_code" => $this->renewal,
            ])->rowCount();

    }



}


class blocked_member extends member_status
{

    public function state()
    {

        return database::getInstance()->update('members',["IsApproved" => Member::BLOCKED],
            [
                "user" => $this->id,
                "R_code" => $this->renewal

            ])->rowCount();

    }

}





class Member
{

    const APPROVED = 1;

    const NOT_APPROVED = 0;

    const BLOCKED = -1;

    private $position;

    private $renewal;

    private $attributes;

    public $userID;



    public function __construct(String $renewal , int $position = Position::INVALID)
    {


        $this->position = $position;

        $this->renewal = $renewal;

        $this->userID = (new Users())->get_id();

    }


    private function attributesToInsert($userId = null) {


        if(!$userId) $userId = $this->userID;

        return [

            "R_code"         => $this->renewal,

            "user"           => $userId,

            "join_date_time" => Date::Now(),

            "position"       => $this->position

        ];


    }


    public function getPhoneNumbers(Array $filter = [])
    {


        $numbers =  database::getInstance()->select("members",
            ["[>]user" => ["user"=>"id"]],"CP",array_merge([

            "members.R_code" => $this->renewal

        ],$filter));


        /** format numbers to non characters **/

        return array_map(function($phone){

            return preg_replace("/[\W\s]/m","",$phone);

        },$numbers);

    }


    public function getPosition(String $id,Array $filter = [])
    {

        return database::getInstance()->get("members","position",
            array_merge(['R_code' => $this->renewal, 'user' => $id],$filter));

    }


    public function getUserId()
    {

        return database::getInstance()->get('members',"*",[
            'R_code' => $this->renewal,
            'position' => $this->position
        ]);

    }


    public function getCurrentUserPosition() {

        return $this->getPosition((new Users())->get_id());

    }


    /**
     * get the updated renewal code of a current user on a
     * specified organization the difference between this method
     * on get_renewal_code is that this method doesn't require
     * anything besides the org_url
     *
     * return nothing when
     * a user is not a valid member of that organization,
     * the org_url is not valid or not exist
     *
     * @param String $org_url
     *
     * @return String
     */


    public static function get_renewalOf_current_user(String $org_url) : String
    {

        return database::getInstance()->get('members',["[>]renewal" => ['R_code' => 'RCode']],
            "renewal.RCode",
            [

                'renewal.org_url' => $org_url,
                "members.IsApproved" => Member::APPROVED,
                "members.user" => (new Users())->get_id(),
                "ORDER" => ['renewal.id' => "DESC"],
                "LIMIT" => 1 ,

            ]);


    }


    /**
     * get un filtered and un validated list of renewal code of a members
     * doesn't matter if he or she approved or not but not blocked
     * @param array $filter
     * @return array|bool
     */

    public static function getRCode(Array $filter = [])
    {

      return  database::getInstance()->select('members',"R_code",array_merge($filter,[
          "user" => (new Users())->get_id(),
          "IsApproved[!]" => -1
      ]));

    }



    /**
     * insert a member for a specified renewal
     *
     * @access private
     *
     * @param Member $member
     *
     * @param int $isApproved
     *
     * @return bool
     */



    public function new_member(int $isApproved = 0) : bool
    {

        $details = $this->attributesToInsert();


        $details["IsApproved"] = $isApproved;


        if($isApproved) {

            $details['approved_date_time'] = Date::Now();

            $details['addedBy'] = Users::getSessionId();

            $details['addByStaff'] = Users::isStaff();

        }



        if(!$this->is_valid_toBe_a_member())

            return false;


        $not_success = database::getInstance()->insert("members",$details)->rowCount();


        if(!$not_success)

            return false;


        return true;

    }



    public function setMembers(Array $usersId,bool $setPosition = false) {

        $usersId = array_filter($usersId,function($item) {

           return !$this->is_member($item);

        });


        $usersId = array_map(function ($item) {

            return array_merge($this->attributesToInsert($item),[

                "approved_date_time" => Date::Now(),

                "IsApproved" => Member::APPROVED,

                "addedBy" => Users::getSessionId(),

                "addByStaff" => Users::isStaff()

            ]);


        },$usersId);


        return database::getInstance()->insert('members',$usersId)->rowCount();

    }



    public function update_position($userId) {


        if(!$this->is_position_available())

            return false;


        if(!$this->is_valid_position())

            return false;


        return database::getInstance()->update('members',[
            "position" => $this->position
        ],[
            'IsApproved' => Member::APPROVED,
            'user' => $userId,
            'R_code' => $this->renewal
        ])->rowCount();


    }


    /**
     * check if a user is valid member
     * in order to add a member of organization a user should
     * not already a member of that organization
     * the position is available for the user
     * and the requesting position is valid and not unknown
     *
     * @access protected
     *
     * @return bool
     */


    public function is_valid_toBe_a_member()
    {

        if($this->is_member()) //

            return false;



        if(!$this->is_position_available())

            return false;



        if(!$this->is_valid_position())

            return false;


        return true;

    }


    /**
     * generate a code for member
     * a member code usually
     * 4 numbers on the left side and 3 letters on the right side
     * the length of every side is default you can set it anytime
     *
     * @access public
     *
     * @return String
     */




    public static function generate_code() : String
    {

        return (new Tokenizer(3))->create(HASH_CODE)->check
        (['renewal'=>'member_code']);

    }




    /**
     * populate the members of a specified organization
     *
     * @access public
     *
     * @param array $user_filter filter the result
     *
     * @return array
     *
     * @table members,user
     */


    public function list_of_users(Array $user_filter = []) : Array
    {


        $database = new database();

        $where = array_merge([

            'members.R_code' => $this->renewal ,

            'members.position[!]' => Position::INVALID,

            'members.IsApproved[!]' => Member::BLOCKED,

            'GROUP' => "members.user",

            "ORDER" => ["members.id" => "DESC"]



        ],$user_filter);



         $users = $database->select('members' , ["[>]user" => ['user' => 'id']],'*',$where);


        /** encrypt result base on valid attributes */


        return constraint::encrypt_result($users);

    }


    /**
     * get the basic information of a organization
     *
     * @param String $r_code
     *
     * @param String $user_id
     *
     * @return array|bool|mixed
     */



    public static function details(String $r_code,String $user_id)
    {

        $database = new database();

        return $database->get('members','*',[

            "R_code" => $r_code,

            "user" => $user_id

        ]);

    }


    private function is_valid_position() : bool
    {

        /** 1 to 5 is the min and max of values in property of class position */

        return in_array($this->position,range(1,5));

    }


    public function is_member(String $user_id = '') : bool
    {


        $database = new database();

        if(!$user_id)

            $user_id = $this->userID;


        return $database->has('members', [

            "R_code" => $this->renewal,

            "user" => $user_id,

            "IsApproved" => Member::APPROVED

        ]);


    }


    private function is_position_available() : bool
    {


        $database = new database();

        return  !$database->has('members', [

            'position' => $this->position,

            'IsApproved[!]'=> self::BLOCKED,

            "R_code" => $this->renewal

        ]);

    }


    /**
     * safe use
     *
     * @access public
     *
     * @return bool
     */



     
    public function is_position_fill() : bool
    {

        $database = new database();


        $query =  $database->query(

            "SELECT EXISTS (
               SELECT 1 FROM (
               SELECT id,
               COUNT(CASE when position = 1 then id end) as Treasurer , 
               COUNT(CASE when position = 2 then id end) as Auditor,
               COUNT(CASE when position = 3 then id end) as President,
               COUNT(CASE when position = 4 then id end) as Governor,
               COUNT(CASE when position = 5 then id end) as Adviser
               FROM dbscoa.members where R_code = '{$this->renewal}'
               and IsApproved != -1
               ) as positions where Treasurer is not false  and Auditor is not false
               and (President is not false or Governor is not false)
               and Adviser is not false) as check_if_fill"

        )->fetchAll()[FIRST_ROW];


        return $query['check_if_fill'];


    }


    public function change_code()
    {

        if(!$this->is_member())

            return false;



        $new_code = self::generate_code();


        $database = new database();


        return $database->update('renewal',['member_code' => $new_code],
            ['RCode' => $this->renewal]);


    }


    public function invite(Array $numbers,bool $strict = true) {


        if(!$this->renewal) return false;

        $currentUser = (new Users())->current_user();

        $org = club::details($this->renewal);

        if(!$org) return false;

        if($org["attempt_to_change_numbers"] >= 3 and $strict) return false;


        $fullname = $currentUser["Firstname"] ." ".$currentUser["Middlename"]." " .$currentUser['Lastname'];

        $link = PARENT_URI."/SCOA/public/feeds/". $this->renewal;

        $timeOfDay = "Good ". Date::getTimeofDay();

        $message = $timeOfDay . " this is to inform you that";

        $message = $message.", ".$fullname." is requesting  ";

        $message = $message."you to join '{$org['name']}' a org/dept by using this code '{$org['member_code']}' at our site.";

        $message = $message." ".$link ." thank you .";


        foreach ($numbers as $every => $phone) {

            $phone = "63".$phone;

            sms::send($phone,$message);

        }


        return true;

    }


    public static function getAllUsers(Array $filter = []) {

       $users =  database::getInstance()->select('members',[

           "[>]user" => ["user" => "id"],

           "[>]renewal" => ["R_code" => "RCode"]

        ], [

           "members.join_date_time",
           "members.IsApproved",
           "members.position",
           "members.addedBy",
           "members.addByStaff",
           "members.FS_state",
           "members.approved_date_time",
           "user.id",
           "user.user_url",
           "user.Lastname",
           "user.Middlename",
           "user.Firstname",
           "user.CP",
           "user.profile",
           "user.sign_svgbase64",
           "user.last_active"

       ],array_merge([

           "user.id[!]" => null

       ],$filter));

       return $users;


    }


}
