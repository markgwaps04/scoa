<?php


include_once "abstract/global_controller.php";



class message extends AUTH  {


    public function __construct()
    {

        parent::__construct();

        $this->__isStaff();

    }

    public function index() {

        echo "Success";

    }

    private function page() {



    }

}