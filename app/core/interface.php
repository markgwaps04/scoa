<?php

interface IController {

    public static function model($model);

    public static function view(String $file, Smarty $smarty);

}



interface IUser {

    public function isLogin();

    public function staff();

    public function sign_in_request();

    public function create_account_request();

    public function isUsernameExist(String $username = '');

    public function user_details(String $username);

    public function current_user();

}

