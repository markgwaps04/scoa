<?php




class user

{


    protected $smarty;


    protected $user_model;




    public function __construct()
    {


        $this->user_model = Controller::model('request/user_auth');


        /** @var Smarty $smarty set default config for smarty plugin */

        $this->smarty = smarty_config::set();


        /** @var Object $user model */

        $this->smarty->assign("user",Controller::model('request/user_auth'));


    }


    /** restrict a user to visit this class */

    public function index()
    {

        die("Something wen't wrong....");
//
//        header("location: " .PUBLIC_PATH , true);
//
//        exit();

    }

    /**
     * @ajax
     *
     * edit details of a user
     */

    public function edit_info()
    {


        constraint::validRequest();

        include_once "../app/models/request/user_auth.php";

        $user_model = new user_auth();

        echo json_encode($user_model->edit_info());

    }


    /**
     * @ajax
     *
     * update credentials of a user
     *
     * @access public
     *
     * @param $old_password
     */


    public function update_credentials(String $old_password = '')
    {

        constraint::validRequest();

        include_once "../app/models/request/user_auth.php";

        $user_model = new user_auth();

        echo $user_model->update_credentials($old_password);

    }





    public function new_account()
    {

        $user_model = $this->user_model;


        $request = $user_model->create_account();


        $this->smarty->assign('request',$request,true);


        $this->is_already_logIn();


        Controller::view("Users\login\\user_register",$this->smarty);


    }


    /**
     * for ajax call
     *
     * please be aware
     * the user can enter url with this method
     * @param $value
     *
     * @deprecated not safe
     */


    public function is_user_exist($value = '')
    {


        //constraint::validRequest();

        $user_model = $this->user_model;

        echo $user_model->isUsernameExist($value);


    }


    /**
     * invoke when login button is press in both staff and user
     *
     * @access private
     *
     * @return void
     */


    protected function sent_request()
    {

        $user_model = $this->user_model;


        $validate = $user_model->sign_in();


        $this->is_already_logIn();


        ($this->smarty)->assign('request',$validate,true);


    }


    /**
     * check if there's a current user
     *
     * @access private
     *
     * @return void
     */


    protected function is_already_logIn()
    {

        $user_model = $this->user_model;

        $is_login =  $user_model->isLogin();

        if($is_login){

            /**
             * My index file
             *
             * admin page not implemented yet
             */

            if($this->user_model->isStaff)
            {

                header("location: ".PUBLIC_PATH."scoa_admin");

                exit();

            }


            //when user

            header("location: ".PUBLIC_PATH."organization");

            exit();

        }

    }



    public function set_profile()
    {

        constraint::validRequest();

        $user_model = $this->user_model;

        echo $user_model->set_profile();

    }


    public function account()
    {

        include_once "../app/models/request/user_auth.php";

        $current = new current_USER();


        $this->smarty->assign("currentUserClass",$current);

        $this->smarty->assign("_currentUser",current_USER::getDetails());

        Controller::view("Users\home\\account",$this->smarty);

    }


    public function log_out()
    {

        $user_model = $this->user_model;

        $user_model->sign_out();

        header("location:".PUBLIC_PATH);

    }



    public function isAlreadySign () {


        constraint::validRequest();

        $user_model = $this->user_model;

        echo json_encode([
            "isLogin" =>  $user_model->isLogin(),
            "isStaff" => $user_model->isStaff,
            "userId" => $user_model->get_id()
        ]);




    }



    public function confirmAccount()
    {

        include_once "../app/models/request/user_auth.php";

        $user = new user_auth();

        $request = $user->verifyPhoneNumber();

        $this->smarty->assign('request', $request,true);

        $current = new current_USER();

        $this->smarty->assign("currentUserClass",$current);

        Controller::view("Users\home\\confirm_account",$this->smarty);

    }



    public function isVerified() {

        constraint::validRequest();

        include_once "../app/models/request/user_auth.php";

        $user = new user_auth();

        echo $user->isPhoneNumberVerify();

    }








}