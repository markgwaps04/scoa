<?php

include_once "abstract/global_controller.php";

class scoa_checklist extends AUTH
{




    public function __construct()
    {
        parent::__construct();

        $this->org_class();

    }


    public function index()
    {

        $this->__isUser();

        $respond = $this->checklist_class()->updateBatch();

        $this->smarty->assign("updateBatch_request",$respond);

        Controller::view("admin\index\checklist",$this->smarty);

    }


    
    
    public function new_set()
    {

        $this->__isUser();

        constraint::validRequest();

        $checklist_model = Controller::model('checklist');

        echo $checklist_model->newBatch();


    }






    public function view(String $org_url = '')
    {

        $this->__isUser();

        if(!$org_url)

            $this->home();


        $this->update_state();

        $this->checklist_class();

        $this->smarty->assign("orgURL",$org_url);

        Controller::view("admin\index\\view_checklist",$this->smarty);

    }



    public function update_state()
    {

        $this->__isUser();

        $request = $this->checklist_class()->change_state();

        $this->smarty->assign("checklist_state_request",$request);

    }


    public function FS()
    {

        Controller::view("users\home\\FS",$this->smarty);

    }



}