<?php

include_once "abstract/global_controller.php";


class scoa_account extends AUTH
{

    public function __construct()
    {
        parent::__construct();

        $this->__isUser();

        $this->org_class();

    }


    public function index() {

        include_once MODELS_PATH."request/user_auth.php";

        $numStaff = Users::numberOfStaff();

        $this->smarty->assign("numStaff",$numStaff);

        Controller::view("admin\index\account",$this->smarty);

    }



    public function addAdministrator() {

        include_once MODELS_PATH."request/user_auth.php";

        $user = new user_auth();

        echo $user->addSubAdmin();

    }


    public function staffs() {

        constraint::validRequest();

        include_once "../app/models/request/Users.php";

        $user = new Users();

        $administrators = $user->getAdministrator();

        constraint::encrypt_result($administrators);

        $this->smarty->assign("accounts",$administrators,true);

        Controller::view("admin\index\misc\populate_accounts",$this->smarty);


    }


    public function profile($id = DEFAULT_VALUE) {

        Session::unset(FEEDS_KEY);

        if(!$id) $this->home();

        include_once "../app/models/request/Users.php";

        $user = Users::detailsByFilter(["id" => $id],true);

        if(!$user) $this->home();

        $this->smarty->assign("byUser",$user,true);

        Controller::view("admin\index\\view_profile",$this->smarty);

    }


    public function feedsState($id = null) {


        include_once "../app/models/request/post_auth.php";

        echo json_encode(post_auth::_staffFeeds($id));


    }


    public function byType($id = null) {

        if($id) {

            include_once "../app/models/request/post_auth.php";

            return json_encode(post_auth::byUniqueType($id));

        }

    }


}