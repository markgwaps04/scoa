<?php

include_once "abstract/global_controller.php";

class Inbox extends AUTH
{

    public function __construct()
    {


        parent::__construct();

        $this->org_class();

        $this->restrictUsers();


    }


    public function index()
    {

        Controller::view("admin\index\\Inbox",$this->smarty);

    }


    public function get($method = null)
    {

         constraint::validRequest();

         $this->data($method);

         Controller::view("admin\index\misc\inbox_populate",$this->smarty);


    }


    public function data($method = null)
    {


        include_once "../app/models/request/post_auth.php";

        $auth = new post_auth();


        if($method && method_exists($auth,$method))
        {

            $get = $auth->{$method}();

            $this->smarty->assign("inbox_data",$get,true);

            return $get;

        }

        else
        {

            $get = $auth->inbox();

            $this->smarty->assign("inbox_data",$get,true);

            return $get;

        }



    }


    public function state_of_already_read_feed()
    {

        constraint::validRequest();

        include_once "../app/models/request/post_auth.php";

        $auth = new post_auth();

        echo $auth->mark_as_read();


    }



    public function view() {

        constraint::validRequest();

        include_once "../app/models/request/post_auth.php";

        $auth = new post_auth();

        $this->getFS();

        $this->getChecklistClass();

        $this->org_class();

        $this->smarty->assign("inbox_data",$auth->inbox(),true);

        $this->smarty->assign("inbox_data",$auth->inbox(),true);

        Controller::view("admin\index\misc\inbox_view",$this->smarty);

    }




    public function saveXMLFS()
    {

        constraint::validRequest();

        include_once "../app/models/request/checklist.php";

        $auth = new checklist_auth();

        echo $auth->saveXML($_POST);

    }




    public function update_submitted_checklist_status()
    {


        include_once MODELS_PATH."request/checklist.php";

        $auth = new checklist_auth();

        echo $auth->change_state();

    }


    public function getComments()
    {

        include_once "../app/models/request/post_auth.php";

        $auth = new post_auth();

        $this->smarty->assign("post_details",$auth->postAttachments(),true);

        Controller::view("admin\index\misc\inbox_comments",$this->smarty);

    }




    private function getFS() {

        include_once "../app/models/request/checklist.php";

        $fs = new FS();

        $this->smarty->assign("fs_data",$fs,true);


    }




    private function getChecklistClass() {

        include_once "../app/models/request/checklist.php";

        $this->smarty->assign("checklist_class",new checklist_auth(),true);

    }





    private function restrictUsers()
    {

        $this->__isUser();

    }










}