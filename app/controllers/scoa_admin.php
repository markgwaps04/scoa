<?php

include_once "abstract/global_controller.php";


class scoa_admin extends AUTH
{

    public function __construct()
    {
        parent::__construct();

        $this->__isUser();

        $this->org_class();

    }


    public function index()
    {


        include_once "../app/models/Users.php";

        include_once "../app/models/post.php";

        include_once "../app/models/checklist.php";

        include_once "../app/models/club.php";


        $num_users = Users::getNumberOfUser();

        $active_users = Users::getNumberOfActiveUsers();

        /** @var  $unreadPost int get the number of unread post globally */

        $unreadPost = post::getNumberOfUnreadPost();

        /** @var  $requests int get the number of request/messages post globally */

        $requests = post::getNumberOfRequest();


        $orgStatus = (new club())->getRequirementStatus();


        $this->smarty->assign("userCount",$num_users);

        $this->smarty->assign("activeUsersCount",$active_users);

        $this->smarty->assign("unread_post",$unreadPost);

        $this->smarty->assign("requestCount",$requests);

        $this->smarty->assign("orgStatus",$orgStatus);

        $this->smarty->assign("checklist_data",json_encode(checklist::getAllChecklist()));

        Controller::view("admin\index\welcome_page",$this->smarty);



    }



    public function getData()
    {

        $fs = $this->fs();

        $data = $fs->getData();

        $this->smarty->assign("fs_data",$data,true);

        echo json_encode($data);

    }









}