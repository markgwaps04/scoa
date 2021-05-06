<?php

include_once "abstract/global_controller.php";


class Dashboard extends AUTH {


       public function __construct()
       {

           parent::__construct();

           $this->org_class();

           $this->restrictUsers();



       }



    private function restrictUsers()
    {

        $this->__isUser();

    }



}
