<?php

/**
 * Model
 */




include_once MODELS_PATH."Users.php";

include_once MODELS_PATH."Member.php";

include_once MODELS_PATH."checklist.php";



abstract class Position {

    const Treasurer = 1;

    const Auditor = 2;

    const Org_Pres = 3;

    const Governor = 4;

    const Adviser = 5;

    const INVALID = 0;

}


abstract class Renewal
{

    const NOT_APPROVED = 0;

    const APPROVED = 1;

    const BLOCKED = -1;

}

abstract class Group_type {

    const DEPARTMENT = 1;

    const ORGANIZATION = 2;

    const CLUB = 3;

    const NOT_SET = 0;

}


class club
{


    public $org_url;

    public $renewal_code;

    public $renewalId;



    public function get_renewal_by_id() : Array
    {

        $current_org_url = self::get_orgURL(['renewal.RCode' => $this->renewal_code]);


        if(!$current_org_url)

            return [];


        return database::getInstance()->select("renewal","RCode",[

            "id[<=]" => \Medoo\Medoo::raw("(select id from dbscoa.renewal 
            where RCode = '{$this->renewal_code}'  LIMIT 1)"),

            "org_url" => $current_org_url

        ]);

    }



    public static function getPreviousOrgURL(String $url) {

       $result =  database::getInstance()->select('renewal',
            ["[>]org" => ["org_url" => "url"]],["url"],[

            "org.url" => $url, "LIMIT" => [1,1]
        ]);


       if($result)

           return $result[FIRST_ROW];


       return [];

    }

    /**
     *
     * insert new renewal for a specified organization
     *
     * @param String $org_url
     *
     * @return String
     */


    protected function new_renewal($org_url = null,$isQue = false) : String
    {

        if(!$this->org_url && !$org_url) return false;


        if(!$org_url) $org_url = $this->org_url;


        $database = new database();

        $renewal_code =  $this->generate_code_for_renewal();

        $member_code = Member::generate_code();


        $details = [
            "RCode" => $renewal_code,
            "org_url" => $org_url,
            "member_code" => $member_code,
            "isQue" => $isQue
        ];


        $not_success = !$database->insert("renewal",$details)->rowCount();

        if($not_success) return '';


        $this->renewalId = $database->id();


        return $renewal_code;



    }


    /**
     * generate code for renewal of organization
     *
     * @return String
     */

    private function generate_code_for_renewal() : String
    {
        return (new Tokenizer(5))->create()->check(['members' => 'R_code', 'renewal'=>'RCode']);
    }



    /**
     * generate unique id for organization url
     *
     * @return String
     */

    protected function generate_url() : String
    {
        return (new Tokenizer(5))->create()->check([
            'org' => 'url',
            'feeds' => 'org_url',
            'renewal' => 'org_url',
        ]);
    }



    /**
     * generate unique id for organization temporary path
     *
     * @return String
     */


    protected function generate_temporaryPath() : String
    {

        return (new Tokenizer(5))->create()->check(['org' => 'tempath',]);

    }


    /**
     * get the array of renewable,updated and approved organization
     * @return array
     */

    public function renewable_org_list() : Array
    {

        return $this->updated_renewal_org_list(['renewal.IsApprove' => Renewal::APPROVED]);

    }


    /**
     * get the array of renewable,updated and approved organization
     * @return array
     */

    public function unrenewable_org_list() : Array
    {

        return $this->updated_renewal_org_list(['renewal.IsApprove' => Renewal::NOT_APPROVED]);

    }



    /**
     * get the array of all updated and approved organizations
     * @param array $filter , custom a result
     * @return array
     * @table org,member,renewal
     */

    private function updated_renewal_org_list(Array $filter = []) : Array
    {

        return $this->organizations(array_merge([

            "renewal.RCode[!]" => null,

            "renewal.id" => \Medoo\Medoo::raw("(
             select id 
             from dbscoa.renewal 
             where org_url = org.url 
             order by renewal.id desc 
             limit 1)"),

            "GROUP" => "renewal.id"


        ],$filter));

    }



    /**
     * insert new organization with additional information
     *
     * @param array $org_info
     *
     * @return bool|String (return false if failure , url if success)
     */


    protected function new_org(Array $org_info,String $position)
    {


        $database = new database();

        $this->org_url = $this->generate_url();


        $additional_info = [

            "url" => $this->org_url,

            "tempath" => $this->generate_temporaryPath(),

            "user" => (new Users())->get_id(),

            "create_date_time" => Date::Now()

        ];


        $error_inserting = !$this->insert_organization(array_merge($org_info,$additional_info));


        if($error_inserting)

            return false;


        $this->renewal_code = $this->new_renewal();


        if(!$this->renewal_code)

            return false;


        return $this->new_club_owner($position);


    }



    private function new_club_owner(String $position) : bool
    {

        $membership  = new Member($this->renewal_code,$position);

        return $membership->new_member(Member::APPROVED);

    }


    /**
     * insert orgaization
     *
     * @access private
     *
     * @param array $informations of organization
     *
     * @return bool (return false if failure , true if success)
     *
     * @deprecated use create_org class
     */


    private function insert_organization(Array $informations)
    {

        $database = new database();

        $is_error = !$database->insert('org',$informations)->rowCount();

        if($is_error)

            return false;

        return true;

    }


    /**
     * get the list of user organizations
     *
     * @return array
     */


    public static function user_member_codes() : Array
    {

        $database = new database();

        $result = $database->select(

            'members',

            [
                '[<]renewal' => ['R_code' => 'RCode']], 'member_code', [
                'members.user' => (new Users())->get_id(),
                'OR' => ["members.IsApproved" => [Member::APPROVED ,Member::NOT_APPROVED]]
            ]

        );

        return array_unique($result,SORT_REGULAR);

    }


    /**
     * @param array $filter
     *
     * @param bool $onUpdated if true select the most updated renewal code
     *
     * @return array|bool|mixed
     *
     *@table org,renewal
     */



    public function get_renewal_code(Array $filter,$onUpdated = false)
    {

        if($onUpdated)

            $filter['ORDER'] = ["renewal.id" => "DESC"];

        return database::getInstance()->get('org',
            ["[>]renewal" => ['url' => 'org_url']],'renewal.RCode',$filter);

    }


    public static function getAllUpdatedRenewalCode()
    {

        return database::getInstance()->select('org',
            ["[>]renewal" => ['url' => 'org_url']],'renewal.RCode',
            ['ORDER' => ["renewal.id" => "DESC"]]);


    }



    /**
     * check if a organization had renew or has and old renewal code
     * @param String $url
     * @table org,renewal
     * @return bool
     */


    public function had_renew(String $url) : bool
    {

       $num =  database::getInstance()->count("org",
           ['[>]renewal' => ['url' => 'org_url']],"*",['org.url' => $url]);

       return $num > 1;

    }


    /**
     * check the existance of member code
     *
     * @param String $code
     *
     * @return bool (false on failure if not return true )
     */

    public function is_member_code_exist(String $code) : bool
    {

        $database = new database();

        return $database->has('renewal',['member_code' => $code]);

    }


    /**
     * get the organizations of a current user
     *
     * @return array
     */


    public function user_organizations(bool $isStrict = false, Array $filter = []) : Array
    {


        $member_codes = self::user_member_codes();

        /** if isStrict is set to true the result grouped by org.id */

        if($isStrict)

            $filter['GROUP'] = "org.id";


        $organization = $this->organizations(array_merge([

            "renewal.id" => \Medoo\Medoo::raw("(select 
        
            renewal.id from renewal where renewal.org_url = org.url
        
            and renewal.member_code 
        
            IN (".constraint::sql_IN_statement_array($member_codes).") 
        
            order by renewal.id desc limit 1)"),

            "members.user" => (new Users())->get_id()

        ],$filter));


        constraint::encrypt_result($organization);

        return $organization;




    }


    public function approved_org() : bool
    {

        if(!$this->renewal_code)

            return false;


        database::getInstance()->update('renewal',[
            'approval_date_time' => Date::Now(),
            'IsApprove' => Renewal::APPROVED
        ],
            ['RCode' => $this->renewal_code]);




        $type = new post_club_approval_state();

        $type->status = true;

        $post = new post($type);

        $post->create($this->renewal_code);



        return true;

    }


    private function setRenewal_unapproved_date_time(Array $RCode) : bool
    {

       return (bool) database::getInstance()->update("renewal",[

            "unapproved_date_time" => Date::Now()

        ],["RCode" => $RCode])->rowCount();

    }


    public function has_renewable_org()
    {

        return (new self())->updated_renewal_org_list(['renewal.IsApprove' => Renewal::APPROVED]);

    }





    public function renewOrgs() : bool
    {

        $clubs =  $this->updated_renewal_org_list(['renewal.IsApprove' => Renewal::APPROVED]);

        $arrayOF_org_url = array_column($clubs,'url');
        $arrayOF_renewal = array_column($clubs,'RCode');

        $this->setRenewal_unapproved_date_time($arrayOF_renewal);

        foreach ($arrayOF_org_url as $every => $url)
        {


            $this->org_url = $url;

            $this->new_renewal();

        }

        return (bool) $clubs;

    }


    /**
     * @deprecated at change_state class
     * @param String $tempath
     * @return bool
     */

    public function decline_org(String $tempath) : bool
    {


        if(!$this->renewal_code) return false;


        if(!$tempath) return false;


        /** check if a required params is valid */

        $valid_renewal = $this->get_renewal_code(
            ['org.tempath' => $tempath,'renewal.RCode' => $this->renewal_code]);


        if(!$valid_renewal) return false;


        database::getInstance()->delete('renewal',['RCode' => $valid_renewal]);


        $type = new post_club_approval_state();

        $type->status = false;

        $post = new post($type);

        return $post->create($this->renewal_code);

//        return true;


    }



    /**
     * get the "details" and "name" of a specified organization
     *
     * @param String $Rcode
     * @table org,renewal
     */

    public static function details(String $Rcode)
    {

        $database = new database();

        return $database->get('org',["[>]renewal" => ["url" => "org_url"]],[
            "details",
            "name",
            "url",
            "renewal.RCode",
            "renewal.cover",
            "renewal.member_code",
            "renewal.approval_date_time",
            "renewal.unapproved_date_time",
            "attempt_to_change_numbers"
        ],["renewal.RCode" => $Rcode]);


    }





    public function old_members(String $RCode)
    {



      $old_org =  database::getInstance()->select('org',

           ["[>]renewal" => ['url' => 'org_url']], '*', [

               "renewal.org_url" => \Medoo\Medoo::raw("(SELECT org_url FROM dbscoa.renewal where RCode =  '{$RCode}')"),

               "renewal.RCode[!]" => $RCode,

               'ORDER' => ["renewal.id" => "DESC"],

                'renewal.IsApprove' => Member::APPROVED

           ]);




       foreach ($old_org as $every => &$club)
       {

           $club['members'] = (new Member($club['RCode']))->list_of_users();

       }



       return $old_org;



    }



    public function unapproved_organizations()
    {


        return $this->organizations([
            'renewal.IsApprove' => Renewal::NOT_APPROVED,
            'GROUP' => 'renewal.member_code',
            "members.user[!]" => null
        ]);


    }



    public function approved_organizations()
    {

        return;

        return $this->organizations([
            'renewal.IsApprove' => Renewal::APPROVED,
            'GROUP' => 'renewal.member_code',
            "members.user[!]" => null,
        ]);

    }


    /**
     * get the basic information of every organization
     * @param array $filter
     */


    public static function basicInformation_org_list(Array $filter)
    {

       return database::getInstance()->select('org',
           ["[>]renewal" => ['url' => 'org_url']],[
               "renewal.RCode",
               "org.name",
               "org.details",
               "renewal.cover",
               "org.url",
               "renewal.member_code",
           ],$filter);

    }




    /**
     * get the information of all organizations
     * including members , renewals , and users
     *
     * @param array $filter
     *
     * @return array|bool
     */



    public function organizations(Array $filter = [],$select = []) : Array
    {

        $database = new database();

        if(!$select) {

            $select = [

                "org.url",
                "org.id (orgID)",
                "org.tempath",
                "org.name",
                "org.details",
                "org.user (orgOwner)",
                "org.create_date_time",
                "org.group_type",
                "renewal.IsQue",
                "renewal.attempt_to_change_numbers",
                "renewal.temp_numbers",
                "renewal.RCode",
                "renewal.id (renewalId)",
                "renewal.IsApprove (isRenewalApproved)",
                "renewal.member_code",
                "renewal.cover",
                "members.user (currentUser)",
                "members.join_date_time (currentUserJDT)",
                "members.IsApproved (isCurrentUserApproved)",
                "members.approved_date_time (currentUserADT)",
                "members.position (currentUserPosition)"


            ];


        }


        $org =  $database->select('org', [
                "[>]renewal" => ['url' => 'org_url'],
                "[>]members" => ['renewal.RCode' => 'R_code']
            ],$select,$filter);



         /**
         * @var  Array $every_org
         *
         * @var  Array $information pass by reference
         */


        foreach ($org as $every_org => &$information )
        {

            if(!$information['RCode']) continue;

            $member = new Member($information['RCode']);

           $member->is_position_fill();


           $information["members"] = [

               "approved" => $member->list_of_users(['members.IsApproved' => Member::APPROVED]),

               "unapproved" => $member->list_of_users(['members.IsApproved' => Member::NOT_APPROVED])

           ];



            $information['isUpdated_RCode'] =

                self::isUpdated_renewal_code($information['RCode']);



            $information['had_renew'] =

                $this->had_renew($information['url']);



        }

        return $org;


    }


    /**
     * Safe use to get current cover photo of a specified renewal code
     *
     * @access public
     *
     * @param String $renewal_code
     *
     * @return String|void
     */


    public function get_cover_photo(String $renewal_code)
    {


        $details =  $this->organizations(['renewal.RCode' => $renewal_code]);


        if(!$details)

            return;


        $cover_photo = $details[0]['cover'];


        $not_valid = !(!empty($cover_photo) and FILE::isExist($cover_photo,"cover"));


        if($not_valid)

            return;


        return $cover_photo;



    }


    /**
     * get org url
     *
     * @access public
     * @param array $filter
     * @return array|bool|mixed
     * @table org
     */


    public static function get_orgURL(Array $filter)
    {


        return database::getInstance()->get('org',
            ['[>]renewal' => ['url'=>'org_url']] ,'org.url',array_merge(['LIMIT' => 1],$filter));

    }



    public static function isUpdated_renewal_code(String $rcode)
    {


        $result = database::getInstance()->get('renewal',"RCode",
            ['org_url' => \Medoo\Medoo::raw("(select org_url
            from dbscoa.renewal where RCode = '{$rcode}')  order by id desc")]);

        return $result == $rcode;



    }



    public function get_tempPath()
    {
        return database::getInstance()->get('org', 'tempath',['url' => $this->org_url]);
    }


    /**
     * check if a organization url is exist or not
     *
     * @return bool
     */


    public function is_orgURL_exist($orgURL = null) : bool
    {


        if(!$orgURL) $orgURL = $this->org_url;

        $database = new database();

        return $database->has('org', ['url' => $orgURL]);

    }


    /**
     * change temporary path of a organization
     *
     * @return bool
     */


    public function change_tempath()
    {


        if(!$this->is_orgURL_exist())

            return false;



        $database = new database();

        $new_tempath = $this->generate_temporaryPath();


        return $database->update('org' ,['tempath' => $new_tempath],
            ['url' => $this->org_url]);

    }



    public function getAllRCode(String $orgURL,$strict = true)
    {


        $isStaff = (new Users())->isStaff;


        if(!$isStaff and $strict)
        {

            $this->renewal_code = Member::get_renewalOf_current_user($orgURL);

            return $this->get_renewal_by_id();

        }



        $org = $this->organizations(["renewal.org_url" => $orgURL, "GROUP" => "renewal.RCode"]);

        return array_column($org,'RCode');

    }


    public function getRequirementStatus($org_url = null) {


        $org =  $this->renewable_org_list();

        foreach ($org as $every => &$details)
        {

            $typeList = (new checklist())->getApprovedTypeList($details['RCode']);

            $typeList = array_filter($typeList,function ($type){

                return $type === "AOP" ||
                    $type === "MAM" ||
                    $type === "CBL" ||
                    $type === "FS" ||
                    $type === "DE";

            });

            $details["status"] = $typeList;

            $details["statusPercentage"] = (count($typeList) / 10) *  100;

        }


        return $org;

    }


    public static function has_club($userId = DEFAULT_VALUE) {


        if(!$userId)

            $userId = (new Users())->get_id();


        return database::getInstance()->count('org',
            ["[>]renewal" => ["url" => "org_url"], "[>]members" => ["renewal.RCode" => "R_code"]],"*",
            ["members.user" => $userId]);

    }



    public function PhoneTagsAddAttempt(String $RCode,String $phone = DEFAULT_VALUE) {

        $attempt = self::details($RCode)['attempt_to_change_numbers'];


        return database::getInstance()->update('renewal',[

            "attempt_to_change_numbers" => $attempt+1,
            "temp_numbers" => $phone

        ],["RCode" => $RCode])->rowCount();

    }


}



class create_club extends club {

    public $name;

    public $details;

    public $isDept = 0;

    public $IsApproved = false;

    public $renewal;

    public $members = [];

    public $position = Position::INVALID;

    private $IsStaff = false;

    private $orgUrl;

    private $tempPath;


    public function __construct()
    {

        $this->orgUrl = parent::generate_url();

        $this->tempPath = parent::generate_temporaryPath();

        $this->IsStaff = (new Users())->isStaff;

    }


    public function save() {


        $database = new database();

        $params  = [

            "url" => $this->orgUrl,

            "tempath" => $this->tempPath,

            "user" => (new Users())->get_id(),

            "create_date_time" => Date::Now(),

            "IsDept" => $this->isDept,

            "isStaff" => $this->IsStaff,

            "name" => $this->name,

            "details" => $this->details

        ];


        return constraint::callAsync([


           function() use ($params) {

            return $this->insert($params);

           },


           function() {

            $this->renewal =  $this->set_renewal();

            return $this->renewal;

           },


           function() {

            return $this->setMembers();

           }


        ]);







    }

    private function set_renewal() {

        $validity = parent::is_orgURL_exist($this->orgUrl);

        if(!$validity) return false;

        $isQue = false;

        /**
         * if a staff and a state of dept/org is not
         * approved then
         * return false
         */

        if($this->IsStaff && !$this->IsApproved) $isQue = true;


        return parent::new_renewal($this->orgUrl,$isQue);


    }


    private function setMembers(int $memberState = Member::APPROVED) {

        $membership  = new Member($this->renewal,$this->position);

        /** return true create an org/dept but has no members */

        if(!$this->members) return true;


        if(count($this->members) > 1 || $memberState === Member::APPROVED) {

            return $membership->setMembers($this->members);

        }

        if(count($this->members) === 1) {

            return $membership->new_member($memberState);

        }

        return false;


    }


    /**
     * insert orgaization
     *
     * @access private
     *
     * @param array $informations of organization
     *
     * @return bool (return false if failure , true if success)
     */

    private function insert(Array $informations) {

        $database = new database();

        $is_error = !$database->insert('org',$informations)->rowCount();

        if($is_error)

            return false;

        return true;

    }

}

class club_state extends club{

    public $orgId;

    public $renewalId;


    public function activate() {

        if(!$this->orgId || !$this->renewalId) return false;

        /** check if a required params is valid */

        $getRenewal = $this->getRenewal();

        if(!$getRenewal) return false;

        $update_state = database::getInstance()->update('renewal',[

            'approval_date_time' => Date::Now(),
            'IsApprove' => Renewal::APPROVED

        ], ['id' => $this->renewalId])->rowCount();


        if(!$update_state)

            throw new Error("Unable to update state of group");


        return $this->addPost(TRUE,$getRenewal);

    }


    public function decline() {


        if(!$this->orgId || !$this->renewalId) return false;

        /** check if a required params is valid */

        $getRenewal = $this->getRenewal();

        if(!$getRenewal) return false;

        $update_state = database::getInstance()->update('renewal',[
            "IsApprove" => Renewal::BLOCKED
        ], ["RCode" => $getRenewal , "id" => $this->renewalId ])->rowCount();


        if(!$update_state)

            throw new Error("Unable to update state of group");


        return $this->addPost(FALSE,$getRenewal);


    }


    private function getRenewal() {

        $getRenewal = $this->get_renewal_code([
            "org.id" => $this->orgId,
            "renewal.id" => $this->renewalId
        ]);

        return $getRenewal;

    }

    private function addPost($state,$renewal) {

        $type = new post_club_approval_state();
        $type->status = $state;
        $post = new post($type);

        return $post->create($renewal);

    }

}
