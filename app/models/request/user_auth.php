
<?php


include_once MODELS_PATH."Users.php";
include_once MODELS_PATH."sms.php";


class user_auth extends Users {



    public function __construct()
    {

        parent::__construct();

    }



    public function addSubAdmin() {

        $request = $_POST;

        $valid = constraint::strict($_POST,[
            "user_url",
            "Lastname",
            "Firstname",
            "CP",
        ],false);


       if(!$request || !$valid) return;


        /** generate password if has no password to fill */


        if(!isset($request['password']) || !$request['password']) {

            $request['password'] =  (new Tokenizer(6))->create(RAND_UNIQUE)->check([
                "staff" => "password",
                "user"  => "password"
            ]);

        }



        $request['createBy'] = $this->username;

        $sendCredential = isset($request['sendCredentials']);

        unset($request['sendCredentials']);

        $_POST = $request;

        $result = $this->create_account(false);

        if($sendCredential) {


            $phone = constraint::unMaskPhoneNumber($request['CP']);

            $template = "Good day! "
                . $request['Firstname']
                .", "
                ."you can now sign In to your account as sub Administrator "
                ."at following credentials \n";


            foreach ($request as $every => $credentials) {

                $template.= $every ." : ". $credentials ."\n";

            }


            sms::send($phone,$template);

        }

        return $result;

    }




    public function newStaff(String $path = DEFAULT_VALUE,bool $strict = false)
    {

        $is_valid =

            /** check staff is valid **/

            $this->checkStaff($path) &&

            /** check if a request is valid */

            constraint::strict($_POST,["user_url","Lastname","Firstname","CP","password"]);


        if(!$is_valid)

            self::INVALID_REQUEST;


        if($this->hasAdmin())

            $_POST['Path'] = (new Tokenizer(4))->create()->token;


        $this->create_account();

    }


    /**
     * Safe to to signing out the current user
     *
     * @return bool
     */

    public function sign_out()
    {

        /** @var $not_login verify if theres a current user if not return false */

        $not_login =  !$this->isLogin();


        if($not_login)

            return false;


        $this->update_info(["last_active" => Date::Now()]);


        /** unset session id key */

        return Session::unset(SESSION_KEY);

    }


    /**
     * update details of a current user request sent
     * tru $_POST
     * @return array|void
     *
     */




    public function edit_info()
    {

        if(!$_POST) return;

        constraint::htmlspecialchars($_POST);

        constraint::removeEmpty($_POST);

        constraint::filter_keys($_POST,[
            'Lastname',
            'Middlename',
            'Firstname',
            'CP',
            'email',
            'studID',
            'sign_svgbase64',
            'sign_base30'
        ]);


        $cp = $_POST['CP'];

        /** check current user phone number before update */

        $currentUserPhone = constraint::unMaskPhoneNumber($this->getPhoneNumber());


        if($cp) {

            $attemptedToChangeCp = constraint::unMaskPhoneNumber($cp);

            if($attemptedToChangeCp !== $currentUserPhone) {

                $_POST['isVerify'] = user_type::PHONE_NUMBER_UNVERIFIED;

                $_POST['verification_code'] = DEFAULT_VALUE;

            }


        }



        $result =  $this->update_info($_POST);

        return $result;

    }


    /**
     * @access private
     *
     * @param array $req
     *
     * @return bool
     */


    private function is_account_valid(Array $req)
    {


        $req = constraint::removeEmpty($req);




        $check =


            /** false if regex is true  **/

            !preg_match("/(^(\(\+63\))+(\s)+([9][0-9]{3})+(\s)+([0-9]{3})+(\s)+([0-9]{3}$))/",@$req['CP']) ||


            !$this->is_password_valid(@$req['password']) ||


            /** false if all keys is exist **/

            !constraint::keys_exist($req,[
                "Lastname",
                "Firstname",
                "user_url",
                "CP",
                "password"
            ]);



        return !$check;



    }



    /**
     * validate request sent into <b>$_POST</b>
     *
     * @access public
     *
     * @return int
     *
     * usually return <br><br><br>
     *
     * <table class="table table-bordered">
     * <tbody>
     * <tr>
     * <td><b>USERNAME NOT EXIST(-1)</b></td>
     * <td>if the username is not found or the request is invalid&nbsp;</td>
     * </tr>
     * <tr>
     * <td><b>INVALID REQUEST(3)</b></td>
     * <td>if the user sent a custom request</td>
     * </tr>
     * <tr>
     * <td><b>VALID_REQUEST(1)</b></td>
     * <td>if the request is valid</td>
     * </tr>
     * </tbody>
     * </table>
     */


    public function create_account(bool $directlyLogIn = true)
    {



        $req = $_POST;

        if(!$req) return;


        if(!$this->is_account_valid($req))

            return self::INVALID_REQUEST;


        constraint::htmlspecialchars($req);

        if($this->isUsernameExist($req['user_url']))

            return self::USERNAME_EXIST;


        /**  @var String $_POST['DT'] set the current date_time **/

        $_POST['DT'] = Date::Now();


        /** @var String $password set un hashable password for another use */
        $password =  $req['password'];

        /** @var $_POST['password'] hash password */


        $req['password'] = password_hash($password,PASSWORD_DEFAULT);

        /** PDOStatement insert(table,values) declare a statement */


        $this->database->insert($this->isStaff ? "staff" : "user",$req);


        /** bool set(username,password) set current user */

        if($directlyLogIn)

            $this->set(@$req['user_url'],$password);


        return self::VALID_REQUEST;

    }



    /**
     * update credentials of a user
     *
     * @return int
     *
     * (usally return )
     *
     * <table class="table table-bordered">
     * <tbody>
     * <tr>
     * <td><b>USERNAME_EXIST(-2)</b></td>
     * <td>if the username is exist or the request is invalid&nbsp;</td>
     * </tr>
     * <tr>
     * <td><b>PASSWORD_INVALID(1)</b></td>
     * <td>if the username not exist but the password is invalid</td>
     * </tr>
     * <tr>
     * <td><b>VALID_REQUEST(2)</b></td>
     * <td>if the request is valid</td>
     * </tr>
     * </tbody>
     * </table>
     */

    public function update_credentials($old_password) : int
    {


        if(!$_POST)

            return self::INVALID_REQUEST;


        constraint::removeEmpty($_POST);


        constraint::filter_keys($_POST,[
            'user_url',
            'password'
        ]);



        if(!$this->update_username(@$_POST["user_url"],true))

            return self::USERNAME_EXIST;


        if(!$this->update_password(@$_POST["password"],$old_password))

            return self::PASSWORD_INVALID;


        return $this->validate(true)
            ? self::VALID_REQUEST
            : self::INVALID_REQUEST;


    }



    /**
     * validate request sent into <b>$_POST</b>
     *
     * @access public
     *
     * @return int|void
     *
     * usually return <br><br><br>
     *
     * <table class="table table-bordered">
     * <tbody>
     * <tr>
     * <td><b>USERNAME NOT EXIST(-1)</b></td>
     * <td>if the username is not found or the request is invalid&nbsp;</td>
     * </tr>
     * <tr>
     * <td><b>PASSWORD_INVALID(0)</b></td>
     * <td>if the username is exist but the password is invalid</td>
     * </tr>
     * <tr>
     * <td><b>VALID_REQUEST(1)</b></td>
     * <td>if the request is valid</td>
     * </tr>
     * </tbody>
     * </table>
     */


    public function sign_in()
    {


        $request = $_POST;

        if(!$request)

            return;


        constraint::htmlspecialchars($request);


        $has_empty_field = constraint::isThereEmpty($request);


        if($has_empty_field)

            return self::USERNAME_NOT_EXIST;



        $this->set(@$request['user'],@$request['pass']);


        if($this->validate())

            return self::VALID_REQUEST;



        if($this->isUsernameExist())

            return self::PASSWORD_INVALID;


        return self::USERNAME_NOT_EXIST;

    }



    public function verifyPhoneNumber() {

        if(!$_POST) return;

        $request = $_POST;

        $is_valid = constraint::keys_exist($request,["type"]);

        if(!$is_valid) return INVALID_REQUEST;

        $class = new phone_verification;

        $isExist = method_exists($class,$request["type"]);

        if(!$isExist) return INVALID_REQUEST;

        $class->code = $request["code"];

        return $class->{$request["type"]}();

    }







}


