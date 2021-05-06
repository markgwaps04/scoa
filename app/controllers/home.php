<?php
/**
 * Created by PhpStorm.
 * User: Sunlee
 * Date: 1/14/2019
 * Time: 8:10 PM
 */


include_once "User.php";


class home extends User
{


    /**
     * default controller
     *
     * @return void
     */

    public function index()
    {



        $this->sent_request();

        /** if there's no current user display the login page */

        Controller::view("Users\login\user_login",$this->smarty);


    }




}