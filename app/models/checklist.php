<?php

include_once MODELS_PATH."club.php";

include_once MODELS_PATH."post.php";

include_once MODELS_PATH."Users.php";

include_once MODELS_PATH."club.php";

include_once MODELS_PATH."Member.php";


 class submission_state
{

    const APPROVED = 1;

    const PENDING = 0;

    const RESPOND = 2;

    const NOT_APPROVED = -1;

    protected $post_url;

    public $body;


    public function __construct(String $post_url)
    {
        $this->post_url = $post_url;
    }




    public function approved_checklist()
    {

        return $this->change_state(submission_state::APPROVED);

    }



    public function unapproved_checklist()
    {

        return $this->change_state(submission_state::NOT_APPROVED);

    }


    public function respond_checklist()
    {

        return $this->post(self::RESPOND);

    }


    public function resubmit_checklist()
    {

        return $this->change_state(submission_state::PENDING,submission_state::APPROVED);

    }


    protected function post(String $status) : bool
    {

        $post_state = new post_checklist_state();

        $post_state->body = $this->body;

        $post_state->status = $status;

        $post_state->target_post_url = $this->post_url;

        $post = new post($post_state);

        $renewal_code = post::_basicDetails($this->post_url)['r_code'];

        return $post->create($renewal_code);

    }


    protected function change_state(int $state,$from_state = submission_state::PENDING) : bool
    {


        $where = [

            'post_url' => $this->post_url,
            'isApproved' => $from_state,
            "checklist_id" => checklist::getUpdatedID()

        ];


        $is_success =  database::getInstance()->update('submission',
            ['isApproved' => $state],$where)->rowCount();


        if($is_success)

            return $this->post($state);


        return false;



    }




}





abstract class FS_type {



    protected $r_code;




    public function __construct(String $r_code)
    {
        $this->r_code = $r_code;
    }



    private function checkIfAlreadySave()
    {

        return database::getInstance()->has("fs",["r_code" => $this->r_code]);

    }



    private function update(String $type, Array $value)
    {

        return database::getInstance()->update('fs', $value,
            ["r_code" => $this->r_code])->rowCount();

    }



    private function insert(String $type, Array $value)
    {


        return database::getInstance()->insert("fs",array_merge([
            "r_code" => $this->r_code,
            "checklist_id" => checklist::getUpdatedID()
        ],$value));

    }


    protected function updateOrInsert(String $type,Array $value)
    {


        $isRCodeExist = $this->checkIfAlreadySave();


        if($isRCodeExist)

            return $this->update($type,$value);


        if(!$isRCodeExist)

            return $this->insert($type,$value);


        return null;


    }


    protected function xmlFormattedData(String $folder)
    {


        $xml = new XML($this->r_code);

        $xml->folder = $folder;

        return $xml->get();

    }


    public function getData() {




    }


    abstract public function getXML();

}



class FS_cash_collection_report extends FS_type {





    public function save(Array $data)
    {


        $this->updateOrInsert('cash_collection_report',$data);

    }


    public function getXML()
    {


        return $this->xmlFormattedData(self::FOLDER);

    }


}


class FS_cash_received extends FS_type {


    const FOLDER = "cash_received";


    public function save(Array $data)
    {

        $this->updateOrInsert('cash_received',$data);

    }


    public function getXML()
    {

        return $this->xmlFormattedData(self::FOLDER);

    }


}


class FS_cash_flows extends FS_type {


    const FOLDER = "cash_flows";


    public function save(Array $data)
    {

        $this->updateOrInsert('cash_flows',$data);

    }


    public function getXML()
    {

        return $this->xmlFormattedData(self::FOLDER);

    }


    public function getData()
    {

        $result = database::getInstance()->get('fs',"cash_flows",[

            "r_code" => $this->r_code,
            "ORDER" => ['id' => "DESC"],
            "LIMIT" => 1

        ]);


        return $result;


    }



}


class FS_note_disbursement extends FS_type {


    const FOLDER = "note_disbursement";


    public function save(Array $data)
    {

        $this->updateOrInsert('note_disbursement',$data);

    }


    public function getXML()
    {

        return $this->xmlFormattedData(self::FOLDER);

    }


}



class FS_cash_statement extends FS_type {


    const FOLDER = "cash_statement";


    public function save(Array $data)
    {

        $this->updateOrInsert('cash_statement',$data);

    }


    public function getXML()
    {

        return $this->xmlFormattedData(self::FOLDER);

    }


}




abstract class checklist_type
{

    const AOP = 1;

    const MAM = 2;

    const CBL = 3;

    const FS = 4;

    const DE = 5;




    public $body;

    public $files;

    public $approval = 0;

    protected $renewal;

    protected $id;

    private $feeds; /** for optimize */


    /**
     * checklist_type constructor.
     * @param String $renewal
     * @param int|null $checklist_id
     */

    public function __construct(String $renewal = '',int $checklist_id = null)
    {

        $this->renewal = $renewal;


        $this->id = $checklist_id ?: checklist::getUpdatedID();


    }


    /**
     * @param String $type
     *
     *
     * @param bool $isMemberState
     * set true if member request for other members
     *
     * @return bool
     */


    protected function save(String $type,bool $MemberState)
    {

        $post_request = new post_checklist;

        $post_request->body = $this->body;

        $post_request->type = $type;

        $post_request->id = $this->id;

        $post_request->approval = $this->approval;

        $post_request->isMemberState = $MemberState;


        if(!$post_request->id)

            return false;


        $post = new post($post_request);

        $post->files = $this->files;

        return $post->create($this->renewal);

    }



    public function pending()
    {


        return $this->filter(submission_state::PENDING,[

            'submission.id' => checklist::approved_request_query()


        ]);

    }



    public function approved_list()
    {

       return $this->filter(submission_state::APPROVED);

    }




    public function unsubmit_list()
    {


        $approved_list = array_column($this->approved_list(),"r_code");

        $pending_list = array_column($this->pending(),"r_code");


        $details  = checklist::getBatchDetails($this->id);


        $org = club::basicInformation_org_list([

            "renewal.RCode" => club::getAllUpdatedRenewalCode(),

            "renewal.approval_date_time[>=]" => $details['date_time'],

            'GROUP' => 'renewal.RCode'

        ]);


        return array_filter($org,function($value) use ($approved_list,$pending_list)
        {

            return !(in_array($value['RCode'],$approved_list)
                or in_array($value['RCode'],$pending_list));

        });



    }



    public function filter(int $state,Array $custom = [])
    {

        $default = [

            "submission.isApproved" => $state,

            "submission.type" => $this->getType(),

            "submission.isMemberState[!]" => FS::MEMBERS_SET_APPROVED

            ];


        if($this->id)

            $default['submission.checklist_id'] = $this->id;


        return $this->get(array_merge($default,$custom));


    }



    protected function get(Array $filter = [])
    {


        if($this->renewal)

            $filter['feeds.r_code'] = $this->renewal;


        $this->feeds = post::feeds(array_merge([

            "feeds.type" => post_checklist::TYPE,

            "ORDER" => ["feeds.Id" => "DESC"]


            ],$filter));


        return $this->feeds;

    }




    abstract public function insert();


    abstract protected function getType();


}



class AOP extends checklist_type
{


    public function insert(bool $isMemberState = false)
    {

        return $this->save('AOP',$isMemberState);

    }


    protected function getType()
    {
        return __CLASS__;
    }


}



class MAM extends checklist_type
{



    public function insert(bool $isMemberState = false)
    {
        return $this->save('MAM',$isMemberState);

    }


    protected function getType()
    {
        return __CLASS__;
    }


}


class CBL extends checklist_type
{


    public function insert(bool $isMemberState = false)
    {
        return $this->save('CBL',$isMemberState);
    }


    protected function getType()
    {
        return __CLASS__;
    }


}


class FS extends checklist_type
{

    const MEMBERS_SET = 1;

    const MEMBERS_SET_APPROVED = 1;

    const MEMBERS_SET_UNAPPROVED = 0;


    public function insert(bool $isMemberState = false)
    {

        return $this->save('FS',$isMemberState);

    }


    protected function getType()
    {

        return __CLASS__;

    }


    /**
     * check the status of FS of a current user and a member
     * of specified organization if is valid to sign as approved
     *
     * @return bool true if a current user of a organization
     * has not been approved the FS , false if has
     */


    public function is_valid_to_sign()
    {

        $check =  database::getInstance()->has('members',[

            "R_code" => $this->renewal,
            "FS_state" => 0,
            "user" => (new Users())->get_id(),
            "LIMIT" => 1

        ]);

        return !$check;

    }




    public function getUserByPosition($position) {



        return  database::getInstance()->get(
            'members',["[>]user" => ["user" => "id"]], "*", [

            "R_code" => $this->renewal,

            "members.position" => $position,

            "members.IsApproved" => Member::APPROVED,

            "user.id[!]" => null

        ]);



    }


    public function getAlreadySignUsers()
    {


        return database::getInstance()->select(
            'members',["[>]user" => ["user" => "id"]], "*", [

            "R_code" => $this->renewal,

            "FS_state[!]" => 0,

            "LIMIT" => 1

        ]);

    }





    public function getUnSignUsers()
    {

        return database::getInstance()->select(
            'members',["[>]user" => ["user" => "id"]], "*", [

            "R_code" => $this->renewal,

            "FS_state" => [0,null],

            "LIMIT" => 1

        ]);

    }


    public function isAdviserApproved()
    {
        return database::getInstance()->has(
            'members',["[>]user" => ["user" => "id"]], "*", [

            "R_code" => $this->renewal,

            "FS_state" => submission_state::APPROVED,

            "position" => Position::Adviser,

            "LIMIT" => 1

        ]);

    }



    public function getAdviser()
    {
        return database::getInstance()->get(
            'members',["[>]user" => ["user" => "id"]], "*", [

            "R_code" => $this->renewal,

            "position" => Position::Adviser,

            "LIMIT" => 1

        ]);

    }


    public function isRequiredFill()
    {

        $check =  database::getInstance()->query(

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
               
               and FS_state != 0
               
               ) 
               
               as positions where Treasurer is not false  and Auditor is not false
               and President is not false and Governor is not false
               and Adviser is not false) as check_if_fill"

        )->fetchAll();


        return $check['check_if_fill'];


    }


    private function member_state(int $state)
    {

        $this->approval = $state;


        $success = database::getInstance()->update('members',["FS_state" => $state,], [

            "R_code" => $this->renewal,

            "user" => (new Users())->get_id()

            ]

        )->rowCount();


        if(!$success) return false;


        return true;


    }



    public function member_approved()
    {

       return $this->member_state(self::MEMBERS_SET_APPROVED);

    }



    public function member_decline()
    {

        return $this->member_state(self::MEMBERS_SET_UNAPPROVED);
    }


    /**
     * get the current status of request
     * @param $r_code
     * @return array|bool|mixed
     */

    public function check_request($r_code)
    {
        $database = new database();


        $where = [

            "submission.checklist_id" => checklist::getUpdatedID(),

            "submission.type" => FS::getType(),

            "submission.isMemberState[!]" => FS::MEMBERS_SET,

            "feeds.r_code" => $r_code,

            "ORDER" => ["feeds.PDT" => "DESC"],

            "LIMIT" => 1


        ];

        return $database->get("submission",[

            "[>]feeds" => ["post_url" => "path"]

        ],"isApproved",$where);


    }


    private static function isAlreadyRequest($validate)
    {

        /**
         * return true
         * if a request is pending "0" or
         * if a request is approved "1"
         * or a request is empty or null
         */


        return ($validate == submission_state::PENDING or
            $validate == submission_state::APPROVED)
            and is_numeric($validate);



    }

    /**
     * generate post fs and notify admin and users
     * when the approval base of members is complete
     */

    public function generate_post_fs()
    {


       $r_code = $this->getCompletedOrg();

       foreach ($r_code as $every => $org)
       {

           $this->renewal = $org;

           $request = $this->check_request($this->renewal);

           $isAlreadyRequest = self::isAlreadyRequest($request);

           if(!$isAlreadyRequest)

               $this->insert();

       }

    }


    private function getCompletedOrg()
    {

        $where = [

            "submission.isMemberState" => FS::MEMBERS_SET,

            "submission.isApproved" => submission_state::APPROVED,

            "members.FS_state" => FS::MEMBERS_SET_APPROVED,

            "GROUP" => "members.id",

            "ORDER" => ["feeds.PDT" => "DESC"],

            "checklist_id" => checklist::getUpdatedID()

        ];


        $columns = ["members.R_code","members.position","feeds.Id"];

        $database = new database();

        $partial = $database->debug(true)->select("submission",[

            "[>]feeds" => ["post_url" => "path"],
            "[>]members" => ["feeds.user" => "user"]

        ], $columns, $where);


        $positions = "
        
        SELECT R_code,
        
        COUNT(CASE when position = 1 then 1 end) as Treasurer,
        
        COUNT(CASE when position = 2 then 1 end) as Auditor,
        
        COUNT(CASE when position = 3 then 1 end) as President,
        
        COUNT(CASE when position = 4 then 1 end) as Governor,
        
        COUNT(CASE when position = 5 then 1 end) as Adviser
        
        FROM ({$database->tempQuery}) as FS_REQUEST 
        
        group by R_code
        
        ";


       $result =  $database->query("
        
        SELECT R_code
        
        FROM ({$positions}) AS FS
        
        WHERE 
        
        FS.Treasurer is not false and
        
        FS.Auditor is not false and
        
        (FS.President is not false or
        
        FS.Governor is not false) and
        
        FS.Adviser is not false

        ")->fetchAll();


       return array_column($result,'R_code');


    }


    public static function cash_flow(String $RCode) {


       return database::getInstance()->query("
        
       SELECT 
       
       _cash_flows.* FROM dbscoa.fs ,
       
       json_table(
       
       cash_flows,'$[*]' 
       
       columns(
       
       name varchar(40) 
       
       path '$.name' 
       
       default '0' 
       
       ON ERROR DEFAULT '0' 
       
       ON EMPTY ,
       
       amount varchar(40) 
       
       path '$.amount'
        
       default '0' 
       
       ON ERROR DEFAULT '0' ON EMPTY
       
       )) 
       as _cash_flows  
       
       WHERE fs.r_code = '{$RCode}' 
       
       and
       
       _cash_flows.name is not null
       
       ")->fetchAll();


    }



    public static function getUnformattedData(String $RCode)
    {

        return database::getInstance()->get('fs',"*",[

            "r_code" => $RCode

        ]);

    }




    public function getData(Array $renewals = []) {

        $database = new database();


        $quote = "
        
        SELECT
        
        *,
        
        fs.r_code,
        
        renewal.approval_date_time as start,
        
        renewal.unapproved_date_time as end,
        
        cash_collection_report->'$[*].amount' as cash_report_amount,
        
        cash_received->'$[*].amount' as cash_received_amount,
        
        cash_flows->'$[*].amount' as cash_flow_amount,
        
        date_format(approval_date_time,'%Y') as data_startY_from,
        
        date_format(unapproved_date_time,'%Y') as data_endY_from,
        
        date_format(approval_date_time,'%M') as data_startM_from,
        
        date_format(unapproved_date_time,'%M') as data_endM_from,
        
        if(not renewal.unapproved_date_time,1,0) as isCurrent
        
        FROM 
        
        dbscoa.renewal
        
        right join fs
        
        on renewal.RCode = fs.r_code
        
        left join checklist 
        
        on fs.checklist_id = checklist.id_checklist
        
        where  renewal.approval_date_time is not false and renewal.IsApprove
        
        
        ";


        $with = constraint::implode_has($renewals,"'");


        if($renewals)

            $quote .= "and renewal.RCode IN ({$with})";


        $result =  $database->query($quote)->fetchAll(PDO::ATTR_AUTOCOMMIT);


        $json = constraint::toValidJSON($result);


        return $json;



    }


}


class DE extends checklist_type
{


    public function insert(bool $isMemberState = false)
    {
        return $this->save('DE',$isMemberState);
    }


    protected function getType()
    {
        return __CLASS__;
    }


}


class checklist
{

    public $id;




    public function __construct(String $id = '')
    {

        $this->id = $id;

    }




    public static function is_valid_checklist_type(String $type) : bool
    {

        return (bool) constant("checklist_type::{$type}");

    }




    /**
     * @param DateTime $date
     * @param array $custom
     * @return int
     */


    public function updateDeadline(DateTime $date,Array $custom = [])
    {

        return database::getInstance()->update('checklist',
            ["deadline" => $date->format(`Y-m-d H:i:s`)],
            array_merge(['ORDER' => ["id_checklist" => "DESC"]],$custom)
        )->rowCount();

    }






    public function setAutoDeadline() : int
    {

        $id = self::getUpdatedID();

        if(!$this->isUpdatedId_valid())

            return false;

        return database::getInstance()->update('checklist',[
            "deadline" => Date::Now(),
        ],["id_checklist" => $id])->rowCount();


    }






    private function isUpdatedId_valid() : bool
    {

        return database::getInstance()->has('checklist',[
           "id_checklist" => self::getUpdatedID(),
            "deadline[!]" => null
        ]);

    }




    public static function getUpdatedID()
    {

       return database::getInstance()->get('checklist','id_checklist',
            [
                'ORDER' => ['id_checklist' => "DESC"],
            ]);

    }





    public function newBatch()
    {

        $club_class = new club();

        $has_org = $club_class->has_renewable_org();

        $isStaff = (new Users())->isStaff;


        if(!$isStaff)

            return false;


        if(!$has_org)

            return false;

        $club_class->renewOrgs();

        $this->setAutoDeadline();

        $is_success = $this->setChecklist();


        if(!$is_success)

            return false;


        return true;

    }





    public static function getAllChecklist() {

        return database::getInstance()->select("checklist","*");
    }




    private function setChecklist(String $dateTime = '') : bool
    {


        $type = new post_batch_set();

        $type->deadline = $dateTime;

        $type->date_time = Date::Now();

        $post = new post($type);

        return $post->create();



//       return (bool) database::getInstance()->insert("checklist",[
//
//            "date_time" => Date::Now(),
//
//            "deadline" => $dateTime
//
//        ])->rowCount();


    }





    /**
     * check if a club is already submitted and approved
     * of a specified checklist type
     *
     * @param String $rcode unique identifier of organization
     * @param $type checklist type @see checklist_type
     * @return bool false if not true if already submitted
     */



    public static function isSubmitted(String $rcode,$type) : bool
    {


       return database::getInstance()->has("feeds",[

           "[>]submission" => ["path"=>"post_url"]

       ],[

           "submission.type" => $type,

           "submission.id[!]" => null,

           "feeds.r_code" => $rcode,

           "submission.isApproved[!]" =>
               [submission_state::PENDING,submission_state::NOT_APPROVED],

           "submission.isMemberState[!]" => FS::MEMBERS_SET_APPROVED

       ]);

    }




    /**
     * get a array of the specified checklist id information
     *
     * @access public
     *
     * @param String $id unique identifier of checklist
     * @param array $filter customize the result
     * @return array|bool|mixed
     * @table checklist
     */

    public static function getBatchDetails(String $id = '',Array $filter = [])
    {


        if(!$id)

            $id = self::getUpdatedID();


        $today = Date::Now();


        return database::getInstance()->get("checklist",[

            "id_checklist",

            "date_time",

            "deadline",

            "isUponDeadline" =>
                \Medoo\Medoo::raw("(if(deadline > '{$today}',1,0))"),

            "isDeadlineSet" =>
                \Medoo\Medoo::raw("(if(dayname(deadline) is null,0,1))")

        ],array_merge([
            'id_checklist' => $id
        ],$filter));


    }




    private function array_of_submission(Array $filter) : Array
    {

        return post::feeds(array_merge(
            ["feeds.type" => post_checklist::TYPE],$filter));

    }






    public function arrayOf_approved_submission($org_url)
    {

       $filter = ["submission.isApproved" => submission_state::APPROVED];

       return $this->array_of_submission(array_merge($filter,
           ['feeds.r_code' => (new club())->getAllRCode($org_url)]));

    }




    public static function isDeadline() : bool
    {

        return database::getInstance()->has('checklist',[
           "id_checklist" => self::getUpdatedID(),
            "OR" => ["deadline[>=]" => Date::Now(),"deadline" => null]
        ]);

    }



    public function arrayOf_pending_submission($org_url)
    {
        /**
         * @var  $approved array a submission is approved, the other request
         * has same type and renewal code will be ignore
         */

        return $this->array_of_submission([

            'feeds.r_code' => (new club())->getAllRCode($org_url),

            'submission.id' => self::approved_request_query(),

            "submission.isApproved" => submission_state::PENDING

            ]);



    }



    public function getApprovedTypeList($RCode) : Array
    {



        return database::getInstance()->select('feeds',
            ['[<]submission' => ["path" => "post_url"]], "submission.type", [

               'feeds.r_code' => $RCode,

               'submission.checklist_id' => self::getUpdatedID(),

               'submission.isApproved' => submission_state::APPROVED,

               'isMemberState[!]' => FS::MEMBERS_SET_APPROVED,

               'GROUP' => "submission.type"

            ]);


    }





    public static function getSubmittedChecklist(String $RCode) {


        return database::getInstance()->select('feeds',

            [
                '[<]submission' => ["path" => "post_url"],
                "[<]user" => ["user" => "id"]

            ], "*", [

                'feeds.r_code' => $RCode,

                'submission.checklist_id' => self::getUpdatedID(),

                'isMemberState[!]' => FS::MEMBERS_SET_APPROVED,

            ]);

    }



    public function getFsAttributes(String $RCode,String $fsType)
    {

        $class = "FS_{$fsType}";

        if(!class_exists($class))

            throw new Error("Invalid fs Type");


        return new $class($RCode);


    }


    public static function FS(String $RCode)
    {

        $class = new FS($RCode);

        return $class;

    }



    public static function approved_request_query()
    {

        return Medoo\Medoo::raw('(
                 
                 case when (!exists(
                 
                 select _submission.id 
                 
                 from submission as _submission
                  
                 right join feeds as _feeds
                 
                 on _feeds.path = _submission.post_url 
                 
                 where _submission.type = submission.type 
                 
                 and _submission.isApproved = 1
                  
                 and _submission.checklist_id = submission.checklist_id 
                 
                 and _feeds.r_code = feeds.r_code
                 
                 limit 1 ))
                 
                 then submission.id  end)');

    }




















}