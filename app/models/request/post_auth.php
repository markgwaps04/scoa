<?php
/**
 * Created by PhpStorm.
 * User: Sunlee
 * Date: 1/28/2019
 * Time: 6:48 PM
 */

include_once MODELS_PATH."club.php";

include_once MODELS_PATH."checklist.php";

include_once MODELS_PATH."Member.php";

include_once MODELS_PATH."post.php";

include_once MODELS_PATH."sms.php";

include_once MODELS_PATH."reminders.php";



class post_auth
{


    public function __construct()
    {

        (new FS())->generate_post_fs();

    }


    public function user_news_feed(String $RCode = '')
    {

        $request = $_POST;

        if(!$RCode) {


            if(!$request) return;


            $is_valid = constraint::strict($request,['post_count',"url"]);


            if(!$is_valid) return;


            if(!is_numeric($request['post_count']))

                return;



            /**
             * @var  $user_renewal Member get
             * the updated renewal code of the current user
             *
             */

            $RCode = Member::get_renewalOf_current_user($request['url']);



        }


        return $this->populate_feeds($RCode,$request);




    }


    public static function staff_feeds(Array $filter = []) {


        $default_filter = [

            "feeds.Id[!]" => Session::get()->{FEEDS_KEY},

            "feeds.isBlocked[!]" => post_state::BLOCKED,

            "ORDER" => ["feeds.id" => "DESC"],

            'LIMIT' => 10

        ];



        $feeds = post::feeds(array_merge($default_filter,$filter));

        post::_sessionKeys(array_column($feeds,"feedsId"));

        return $feeds;



    }


    private function populate_feeds(String $updated_renewal_code, Array $post_request)
    {


        $org = new club();

        $org->org_url = $post_request['url'];

        $org->renewal_code = $updated_renewal_code;

        /** @var  $every_renewal club get every renewal
         * code before the renewal code of the current user
         *
         * e.g.
         *
         * A | B   | C
         * 1   xc    1
         * 2   vb    2
         * 3   vb    3
         * 4   vb    4
         *
         * select vb and 3
         *
         * output :
         * 2   vb    2
         * 3   vb    3
         */

        $defaultFilter = [

            "feeds.Id[!]" => Session::get()->{FEEDS_KEY},

            "feeds.isBlocked[!]" => post_state::BLOCKED,

            "ORDER" => ["feeds.id" => "DESC"],

            'LIMIT' => 3

        ];



        $every_renewal = $org->get_renewal_by_id();



        $renewal_state = club::isUpdated_renewal_code($updated_renewal_code);


        if($renewal_state)

            $defaultFilter["OR"] = [
                "feeds.r_code" => $every_renewal,
                "isStaff" => Medoo\Medoo::raw("(case feeds.r_code != '' when true then -1 else 1 end)")];



        if(!$renewal_state)

            $defaultFilter["feeds.r_code"] = $every_renewal;



        $feeds = post::feeds($defaultFilter);


        post::_sessionKeys(array_column($feeds,"feedsId"));

        return $feeds;

    }


    public function recent_activity(bool $hasLimit = true,$query = [])
    {



        /** @var
         *
         * slow load
         *
         * $organizations = (new club())->user_organizations(true,
            ['members.IsApproved' => Member::APPROVED]); **/


        $organizations = (new club())->organizations([
            'members.IsApproved' => Member::APPROVED,
            'members.user' => (new Users())->get_id()
        ]);


        $Rcode = array_column($organizations,"RCode");


        $query['OR'] = ['r_code' => $Rcode, 'user' => (new Users())->get_id()];


        if(!$Rcode)

             $query = ['user' => (new Users())->get_id()];



        $filter = [
            'feeds.isStaff' => user_type::USER,
            "ORDER" => ["feeds.id" => "DESC"]
        ];


        if($hasLimit) {

            $filter["LIMIT"] = 10;

        }


        $feed = post::feeds(array_merge($filter,$query));


        constraint::encrypt_result($feed);

        return array_unique($feed,SORT_REGULAR);



    }


    /** @temporary **/


    private function getUserNotif()
    {

        $current_user = ${(new Users())->get_id()};


        $rcodes = Member::getRCode(); //unvalidated r_code

        $where =  [

            "GROUP" => "feeds.id",
            "feeds.user[!]" => "if(not feeds.isStaff  ,`feeds`.`user` != '{$current_user}', -1)",
            "feeds.type[!]" => [post_club_owner::TYPE],
            "OR" => [
                "feeds.type" => ['I','J'],
                "feeds.id" => \Medoo\Medoo::raw(
                    "if(feeds.type = 'C',feeds.id,-1)")
            ],
            "HAVING" => [
                "feeds.id" => \Medoo\Medoo::raw("(case when feeds.r_code and isUponPDT then feeds.id when feeds.isStaff and not feeds.r_code and isUponGlobalPDT then feeds.id else -1 end)")
            ]

        ];


        if(count($rcodes))

            $where["OR"]["feeds.r_code"] = $rcodes;


        return $where;


    }


    private function getStaffNotif()
    {

        $currentStaff = (new Users())->get_id();

        $where = [

            "submission.isMemberState[!]" => FS::MEMBERS_SET,

            "feeds.type" => [ post_checklist::TYPE , post_checklist_state::TYPE ],

            "feeds.isStaff" => \Medoo\Medoo::raw("if(feeds.isStaff and feeds.user = {$currentStaff},1,0)"),

            "GROUP" => "feeds.id"

        ];

        return $where;


    }


    public function inbox(Array $filter = []) {


        $request = constraint::htmlspecialchars($_POST);

        $currentStaff = (new Users())->get_id();

        $filterBy = (Array) json_decode($request['data']);

        $filterByTemp = constraint::toArray($filterBy);

        $filterByTemp = array_merge($filterByTemp,$filter);

        $defaultParams = ['LIMIT' => 30, "ORDER" => ["feeds.isRead" => "ASC" , "feeds.id" => "DESC"]];

        $isStaff = (new Users())->isStaff;


        if($isStaff) {

            $defaultParams = array_merge($defaultParams, $this->getStaffNotif());

        }


        if(!$isStaff) {

            $defaultParams = array_merge($defaultParams, $this->getUserNotif());

        }



       $merge = array_replace_recursive($defaultParams,$filterByTemp);

       return post::feeds($merge);


    }


    /** get post that has more entry */

    public function entries()
    {

        return $this->inbox([

            "feeds.id" => \Medoo\Medoo::raw("
            if(
            
            (select 1 
            from feeds as _feeds 
            right join submission as _submission 
            on _feeds.path = _submission.post_url 
            where _feeds.r_code = feeds.r_code
            and _submission.checklist_id = submission.checklist_id
            and _submission.type = submission.type
            and _submission.isMemberState != 1
            and _submission.isApproved = 1) = 1
            , feeds.id , -1)"),

            "submission.isApproved[!]" => submission_state::APPROVED


        ]);

    }


    public function mark_as_read()
    {

        $request = constraint::htmlspecialchars($_POST);

        $currentStaff = (new Users())->get_id();

        $filterBy = (Array) json_decode($request['data']);

        $filterByTemp = constraint::toArray($filterBy);

        return post::AsRead($filterByTemp);

    }


    public function postAttachments()
    {

        $request = constraint::keys_exist($_POST,["post_url"]);


        if($request)

            return post::getAttachmentsDetails($_POST["post_url"]);

        return;

    }




    public function create(String $RCode = '')
    {

        $request = $_POST;

        if(!$request)

           return INVALID_REQUEST;


        $is_valid = constraint::keys_exist($request,['body','type','org_url',"notify"]);


        if(!$is_valid)

            return INVALID_REQUEST;


        $org_feeds = new post_organization_feed;

        $org_feeds->body = htmlspecialchars($request['body']);

        $post = new post($org_feeds);

        $post->files = isset($request['files']) ? $request['files'] : null;

        $post->notify = $request['notify'];


        if(!$RCode)

            $RCode =  Member::get_renewalOf_current_user($request['org_url']);


        $is_success = $post->create($RCode);


        if($is_success)

            return VALID_REQUEST;


        return INVALID_REQUEST;

        
    }


    public function postGlobally() {


        $request = $_POST;

        if(!$request)

            return INVALID_REQUEST;


        $is_valid = constraint::keys_exist($request,['body',"notify"]);


        if(!$is_valid)

            return INVALID_REQUEST;


        $org_feeds = new post_organization_feed;


        $org_feeds->body = htmlspecialchars($request['body']);


        $post = new post($org_feeds);


        $post->files = isset($request['files']) ? $request['files'] : null;

        /** set to true to post as globally */

        $post->globally = true;
        $post->notify = $request['notify'];

        $is_success = $post->create();


        if($is_success)

            return VALID_REQUEST;



        return INVALID_REQUEST;


    }





    public function seenPost() {

        $request = constraint::htmlspecialchars($_POST);

        $filterBy = (Array) json_decode($request['data']);

        $filterByTemp = constraint::toArray($filterBy);

        return post::markAsRead($filterByTemp);

    }






    public static function _staffFeeds($StaffId = null) {

        $default = [];

        if($StaffId) {

            $default = ["feeds.user" => $StaffId];

        }

        $query =  post::feeds(array_merge([
            "feeds.isStaff" => 1
        ],$default));

        return $query;

    }






    public static function byUniqueType(bool $StaffId) {

        return database::getInstance()->select('feeds',[
            "user",
            "PDT",
            "type",
            "DAY" => \Medoo\Medoo::raw("FORMAT(PDT,'YYYY-MM-DD')")
        ],[
            "user" => $StaffId,
            "isStaff" => user_type::STAFF,
            "GROUP"=> ["DAY","type"]
        ]);


    }


    public static function getReminders($limit = 5) {

        $request = $_POST;

        constraint::removeEmpty($request);

        constraint::htmlspecialchars($request);

        $isValid = constraint::keys_exist($request,["set","by"]);

        if(!$isValid)

            throw new Exception("Invalid parameters");

        $reminders = new reminders($request['set'],$request);

        $reminders->by = $request['by'];

        $reminders->limit = $limit;

        return $reminders->get();

    }






//    public static function getReminders($limit = 5) {
//
//        $request = $_POST;
//
//        constraint::removeEmpty($request);
//
//        constraint::htmlspecialchars($request);
//
//        $arr = [];
//
//
//
//        switch (true) {
//
//
//            case isset($request['url']) :
//
//                $r_code = Member::get_renewalOf_current_user($request['url']);
//
//                $arr = array_merge($arr,[
//                    "feeds.r_code" => Medoo\Medoo::raw("(case feeds.type
//                when 'E' then '$r_code'
//                when 'F' then '$r_code'
//                else '' end)")
//                ]);
//
//                break;
//
//
//
//            case isset($request['full_rcode']) and  !(new Users())->isStaff :
//
//
//                $renewal = Member::get_renewalOf_current_user($request['full_rcode']);
//
//                $arr = array_merge($arr,[
//
//                    "OR" => [
//
//                        "feeds.r_code" => $renewal,
//                        "feeds.r_code" => null
//
//                    ]
//
//                ]);
//
//                break;
//
//
//
//
//
//
//        }
//
//
//
//
//        return post::reminders($limit,$arr);
//
//    }








}