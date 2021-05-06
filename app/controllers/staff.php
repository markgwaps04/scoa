<?php

include_once "User.php";

class staff extends user
{

    protected $smarty;



    /**
     * login page for staff
     *
     * @return void
     */


    public function index()
    {

        /** @var bool isStaff */

        $this->user_model->isStaff = true;

        /** validate request when the user hit the login button */

        $this->sent_request();

        /** display admin login page when the request is not valid or no request sent */

        Controller::view("admin/login/admin_login",$this->smarty);

    }


    public function _new() {

        /** @var bool isStaff */

        $this->user_model->isStaff = true;

        $this->user_model->newStaff(1);

    }










}