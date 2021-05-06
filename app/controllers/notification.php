<?php
/**
 * Created by PhpStorm.
 * User: Sunlee
 * Date: 3/2/2019
 * Time: 11:00 PM
 */



include_once "abstract/global_controller.php";

class notification extends  AUTH
{

    public function __construct()
    {
        parent::__construct();
    }



    public function index() {

        include_once "../app/models/request/post_auth.php";

        $auth = new post_auth();

        $this->smarty->assign("notify",$auth->inbox(),true);

        Controller::view("admin/index/notification",$this->smarty);

    }



    public function markAsRead() {

        include_once "../app/models/request/post_auth.php";

        $auth = new post_auth();

        $auth->seenPost();

    }


    public function test() {

        include_once "../app/models/request/post_auth.php";

        $auth = new post_auth();

        $this->smarty->assign("notify",$auth->inbox(),true);

    }




}