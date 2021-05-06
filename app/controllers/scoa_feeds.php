<?php


include_once "abstract/global_controller.php";

class scoa_feeds extends AUTH
{



    public function __construct()
    {

        parent::__construct();

        $this->__isUser();

        $this->org_class();

        $this->user_model();

    }



    public function index() {

       // $this->getOrgFromURI($url);

        Session::unset(FEEDS_KEY);

        Controller::view("admin\index\\newfeeds",$this->smarty);

    }


    public function SetNewPostGlobally() {

        constraint::validRequest();

        include_once "../app/models/request/post_auth.php";

        $post_class = new post_auth();

        echo $post_class->postGlobally();

    }


    public function search($que) {


        include_once "../app/models/club.php";
        include_once "../app/models/Users.php";


        $users = Users::detailsByFilter([
            "OR" => [

                "Lastname[~]" => $que,
                "Middlename[~]" => $que,
                "Firstname[~]" => $que,
            ]
        ]);


        echo json_encode(array_merge([],$users));


    }



    public function org_posts(String $RCode = '')
    {

        constraint::validRequest();

        $post_class = Controller::model('request/post_auth');

        $this->smarty->assign("post",$post_class->user_news_feed($RCode));

        Controller::view("Users\home\\feeds_populate",$this->smarty);

    }



    public function viewAllFeeds(String $staffId = DEFAULT_VALUE) {


        include_once "../app/models/request/post_auth.php";

        $post_class = new post_auth();

        if($staffId) {

            $this->smarty->assign("post",post_auth::staff_feeds([
                "isStaff" => user_type::STAFF,
                "user" => $staffId
            ]));

        }


        if(!$staffId) {

            $this->smarty->assign("post",post_auth::staff_feeds());

        }


        $this->smarty->assign("isGlobalfeeds",true);

        Controller::view("Users\home\\feeds_populate",$this->smarty);


    }




}