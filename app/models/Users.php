<?php
/**
 * Created by PhpStorm.
 * User: Sunlee
 * Date: 1/14/2019
 * Time: 10:53 PM
 */


/***
 * Model
 */


include_once 'Session.php';

include_once MODELS_PATH."club.php";

include_once MODELS_PATH."sms.php";

/**
 *
 * Class Users
 */

class user_type
{

    const STAFF = 1;

    const USER = 0;

    const PHONE_NUMBER_VERIFIED = 1;

    const PHONE_NUMBER_UNVERIFIED = 0;


    public static function defined(bool $state) : String
    {
        return $state ? "staff" : "user";
    }

}



class phone_verification {


    public $code;

    /**
     * generate a code and send the code to a current user to
     * verify if he/she is the owner of the mobile phone
     * number used for the account
     * @return void
     */

    public function generate() {

        /** @var $code String generate code */

        $code = (new Users())->phoneNumber_GenerateCode();

        /** @var  $user Array get the details of a current user */

        $user = (new Users())->current_user();

        /**
         * @var $phone_format String format mobile phone number
         *   to non space and non special character format
         */

        $phone_format = preg_replace("/[\W\s]/m","",$user['CP']);

        /** @var $template String a message to send **/

        $template = "From SCOA, use this code to verify your account '{$code}' ";

        /** @void send sms and notify the current user */

        sms::send($phone_format,$template);

    }


    /**
     * check if a specified code is valid or not
     * @return the return value is usually,
     * invalid request(1) - if a code is invalid or not equal
     * valid request(2) -if a specified code is valid and equal
     */

    public function check() : int
    {

        /**
         * @return invalid request(1) if a code is empty ,null or undefined,
         * if not continue the next execution
         */

        if(!$this->code) return INVALID_REQUEST;


        /** @var $is_valid check the specified code is equal and valid  */

        $is_valid =  database::getInstance()->has('user',[

           "id" => (new Users())->get_id(),

           "verification_code" => $this->code

        ]);

        /** validation  */

       if($is_valid) {

           /** @var $success if a specified code is valid
            * update the current status of "isVerify" attribute of a database
            * to PHONE_NUMBER_VERIFIED(1) and
            * @return the number of affected rows
            */

           $success  = database::getInstance()->update('user',['isVerify'=>user_type::PHONE_NUMBER_VERIFIED],[

               "id"=> (new Users())->get_id()

           ])->rowCount();

           /** if has a affeted rows return valid request(2), invalid request if not */

           return $success ? VALID_REQUEST : INVALID_REQUEST;

       }


       /** return invalid request(1) if a code is not equal */

       return INVALID_REQUEST;



    }


}





abstract class user_details {


    public $id; public $user_url; public $password;

    public $Lastname; public $Middlename; public $Firstname;

    public $CP;  public $DT;  public $profile;

    public $dept; public $email; public $studID;

    public $sign_svgbase64; public $sign_base30;

    public $last_active; public  $suffix;

    public $isVerify; public $verification_code;

    protected $info;


    public function setInformation() {


        foreach ($this->info as $every => $property) {

            $is_valid =  property_exists("user_details",$every);

            if(!$is_valid) continue;

            $this->{$every} = $property;

        }

    }

    public function is_profile_set() : bool
    {

        $profile = $this->profile;

        return (!empty($profile) and FILE::isExist($profile,"profile"));

    }

    public function getProfile()  {

        $checkIfValid = $this->is_profile_set();

        if(!$checkIfValid) return null;

        return $this->profile;

    }

    public function isPhoneVerify() {

        return (bool) $this->isVerify;

    }



}


class Credentials {

    private $user_url;

    private $state;

    private $id;

    private $session_key;

    private $session_pass;

    public $details;


    public function __construct()
    {

        $this->session_key = Session::get()->{SESSION_KEY};

        $this->user_url = $this->session_key['user'];

        $this->state = $this->session_key['staff'];

        $this->id =  $this->session_key['id'];

        $this->session_pass = $this->session_key['pass'];

    }


    public static function isExist() {

        return isset(Session::get()->{SESSION_KEY}[CREDENTIALS_KEY]);

    }


    public function check() {

        $this->defaultValue();

        $this->incrementRequest();

        return $this->RequestExceed();

    }



    /**
     * @return bool (Usually true when there's change false if not)
     */


    private function isNotChanged() {

        /** @var $session to avoid redundant of inserting data */

        $session = (Array) Session::key();

        $state = $this->state ? "staff" : "user";

        $password = database::getInstance()->get($state,"password",$session['currentUser']);

        if(!$password) return false;

        return password_verify($session['pass'],$password);

    }




    private function RequestExceed()
    {

        $session = (Array) Session::key();

        $no_request = $session[CREDENTIALS_KEY]['request'];

        if(!($no_request >= 40)) return true;

        $session[CREDENTIALS_KEY]['request'] = 0;

        Session::set()->{SESSION_KEY} = $session;

        return $this->isNotChanged();

    }



    public function defaultValue()
    {
        $session = (Array) Session::key();

        if(isset($session[CREDENTIALS_KEY]['request'])) return;

        $session[CREDENTIALS_KEY]['request'] = 0;

        Session::set()->{SESSION_KEY} = $session;

    }



    private function incrementRequest(){

        $session = (Array) Session::key();

        $no_request = $session[CREDENTIALS_KEY]['request'];

        if(!$no_request) $no_request = 0;

        $session[CREDENTIALS_KEY]['request'] = $no_request + 1;

        Session::set()->{SESSION_KEY} = $session;

    }






}



/** @deprecated  */



class Users  {


    public $username;

    private $password;

    public $isStaff = false;

    private $id;

    protected $database;


    const USERNAME_NOT_EXIST = -1;

    const PASSWORD_INVALID = 1;

    const VALID_REQUEST = 2;

    const INVALID_REQUEST = 3;

    const USERNAME_EXIST = -2;



    public function __construct()
    {


        $this->database = new database();

        $this->validate();
        

    }



    public static function getSessionId() {

        $session_key = Session::get()->{SESSION_KEY};

        if(!isset($session_key))  {

            throw new Error("Invalid Parameters");

        }

        return $session_key["id"];


    }



    public static function isStaff() {

        $session_key = Session::get()->{SESSION_KEY};

        if(!isset($session_key))  {

            throw new Error("Invalid Parameters");

        }

        return $session_key["staff"];


    }


    public static function detailsByFilter(Array $filter,bool $isStaff = false) {

        $state = $isStaff ? "staff" : "user";

        $result = database::getInstance()->select($state,[

            "user_url",
            "id",
            "Lastname",
            "Middlename",
            "Firstname",
            "CP",
            "profile" ,
            "suffix",
            "isVerify"

        ],$filter);

        return constraint::encrypt_result($result);

    }


    public static function getNumberOfUser()
    {
        return database::getInstance()->count("user");
    }


    public static function getNumberOfActiveUsers()
    {

        $activeRenewalOrg = club::getAllUpdatedRenewalCode();

        return database::getInstance()->count("members",[
            "R_code" => $activeRenewalOrg
        ]);

    }


    /**
     * Check if has valid Administrator staff path
     * return true if has no staff or the specified path is valid false if not
     */


    public function checkStaff(String $path) {


       if(!$this->isStaff) return false;

       $result = database::getInstance()->get('staff',[

          "hasNoStaff" => Medoo\Medoo::raw("(if(count(staff.id),0,1))"),

           "isPathValid" => Medoo\Medoo::raw("if(staff.Path = '$path',1,0)")

       ]);



       if($result['hasNoStaff']) return true;

       if($result['isPathValid']) return true;


       return false;



    }


    /** check if has a admin return true if has false if not */

    public function hasAdmin() {

        return database::getInstance()->has("staff",["Path[!]" => null]);

    }



    /**
     * get id of a user
     * @return array|bool|mixed
     */




    public function get_id()
    {

        $user_type = $this->isStaff ? "staff" : "user";

        return $this->database->get($user_type,'id',['user_url' => $this->username]);

    }



    /**
     * Safe use to get user profile
     *
     * @return string|void
     * @deprecated
     */



    public function get_profile($username = '')
    {


        if($username) $this->username = $username;

        $details =  (Object) $this->user_details($this->username);

        $profile = $details->profile;

        $not_valid = !(!empty($profile) and FILE::isExist($profile,"profile"));

        if($not_valid) return;

        return $profile;


    }


    /**
     * set user profile
     *
     * @return bool
     */


     public function set_profile() : bool
    {


       $file = FILE::upload($_FILES,"profile","image");

       if(!$file)

           return false;


       $file_name = $file[0]["fname"];


       return (bool) $this->update_info(["profile" => $file_name ]);


    }




    /**
     * safe use to update username of a cuurent user
     * @note the parameter username should unique otherwise it return false
     *
     * @access private
     *
     * @return bool
     */

    protected function update_username($username,$not_strict = false) : bool
    {


        if(empty($username))

            return $not_strict;


        $username = constraint::htmlspecialchars($username)[0];


        $username_exist = $this->isUsernameExist($username);


        if($username_exist)

            return false;


        $this->update_info(["user_url" => $username]);


        /** @var password , set_session_key() update sessions */

        $this->username = $username;
        $this->set_session_key();


        return true;



    }



    /**
     * safe use to update password of a current user
     *
     * @access public
     *
     * @return bool
     */



    public function update_password($password, String $old_password = '') : bool
    {


        if(empty($password))

            /** @var bool empty($old_pass word) return if is empty or null false if not */

            return empty($old_password);


        $password = htmlspecialchars($password);

        $old_password = htmlspecialchars($old_password);

        $this->password = $password;


        $not_valid = !($this->is_password_valid(false,$password) and $this->recognized_password());


        if($not_valid)

            return false;


        $this->update_info(["password" => password_hash($this->password,PASSWORD_DEFAULT)]);

        /** set_session_key() update sessions */


        $this->set_session_key();


        return true;

    }


    /**
     * safe use to check if the phone number of a user
     * is specified or valid
     * @return bool (return true if success false if failure)
     * @deprecated
     */


    public function is_phone_number_specified($username = '')
    {

        if($username) $this->username = $username;


        $cp = database::getInstance()->get('user',"CP",[

            "isVerify" => user_type::PHONE_NUMBER_VERIFIED,

            "verification_code[!]" => null,

            "user_url" => $this->username

        ]);


        return preg_match(REGEX::PHONE_NUMBER,$cp);

    }





    /**
     * @deprecated  remove after several days (Temporary)
     *
     * @return bool (usualy true when success false if not)
     */


    public function required() : bool
    {



        $is_valid_phone_number = $this->is_phone_number_specified();


        if(!$is_valid_phone_number)

            return false;



        $is_profile_set = $this->get_profile();


        if(!$is_profile_set)

            return false;



        $is_valid_signature = $this->is_Signature_set();


        if(!$is_valid_signature)

            return false;



       return true;

    }



    /**
     * @deprecated not safe
     *
     * @return bool
     */



    public function is_Signature_set($username = '')
    {

        if($username) $this->username = $username;


        $info = (Object) $this->user_details($this->username);


        if(empty($info->sign_svgbase64) or empty($info->sign_base30))

            return false;


        $is_valid_sign_base64 = explode(",",$info->sign_svgbase64);


        $is_valid_sign_base30 = explode(",",$info->sign_base30);


        if(empty($is_valid_sign_base64[1]))

            return false;


        if(empty($is_valid_sign_base30[1]))

            return false;



        return true;



    }



    /**
     * retrieve the details of a user
     *
     * @access public
     *
     * @param String $username
     *
     * @return array
     */


    public function user_details(String $username) : Array {


        $user_type = $this->isStaff ? "staff" : "user";


        $details = $this->database->select($user_type ,"*",[

            "user_url" => htmlspecialchars($username),

            "LIMIT" => 1

        ]);


        $unrecognized_user = !$details;


        if($unrecognized_user)

            return [];


        constraint::encrypt_result($details[0]);


        return $details[0];


    }


    /**
     * retrieve the details of a current user
     *
     * @access public
     *
     * @return arra
     */


    public function current_user() : Array
    {


        /** @var $is_valid check if valid and set the current type of user e.g staff **/


        return Session::key()->currentUser;


//       $not_valid =  !$this->validate();
//
//       if($not_valid) return [];
//
//       $result = $this->user_details($this->username);
//
//       constraint::encrypt_result($result);
//
//       return $result;


    }


    /**
     *
     * check if theres a current user
     *
     * @access public
     *
     * @return bool (return true if has false if not)
     *
     */


    public function isLogin() : bool
    {


        return (bool) Session::key()->currentUser;

        //return $this->validate();

    }



    /**
     * <p>Determine if a current user is a admin
     *
     * @access public
     *
     * @return bool false if not
     */


    public function staff() : bool
    {

        return $this->validate() && $this->isStaff;


    }




    /**
     * @access private
     *
     * @return bool
     */


    public function isUsernameExist(String $username = '') : bool {

        if(!$username)

            $username = htmlspecialchars($this->username);


        $where = ["user_url" => $username,"LIMIT" => 1];


        $user = $this->database->has("user",$where);

        $staff = $this->database->has("staff",$where);

        return $user || $staff;

    }


    /**
     * update user details
     *
     * @param array $Arr
     *
     * @param String $user
     *
     * @return array (return an empty array if update_info is not
     * successfully update , if not return a array of details of selected user)
     */


    protected function update_info(Array $Arr, String $user = '') : Array
    {

        if(empty($user)) $user = $this->username;

        $this->database->update($this->isStaff ? "staff" : "user",$Arr,['user_url' => $user]);

        $has_error = $this->database->error();

        if($has_error[2])

            return [];

        $this->validate(true);

        return $this->user_details($user);

    }



    /**
     * get All Staff include the
     * Administrator
     */

    public function getAdministrator() {

        return database::getInstance()->select('staff',"*");


    }


    /**
     *
     * check the specified attributes is exist on database
     *
     * @note should not contains empty value
     *
     * @param array $attribute
     *
     * @param bool $not_strict
     *
     * @return bool
     */

    private function is_attribute_exist(Array $attribute =  [],$not_strict = true)
    {
        $has_empty = constraint::isThereEmpty($attribute);

        if($has_empty) return false;

        return $this->database->has('user',"*",$attribute);

    }


    /**
     * check the specified password if is valid or not this usually
     * use when checking the request sent tru $_POST by
     * "password" attribute
     *
     * @note when using $_POST use the key "password" this referred on
     * the database to easily execute a statement
     *
     * @access protected
     *
     * @param String $phone_number
     *
     * @param bool $not_strict (Optional)
     *
     * @return bool
     *
     */


    protected function is_password_valid($not_strict = true , String $password = '') : bool
    {

        $password = $password ? $password : @$_POST['password'];

        if(!$password and $not_strict) return true;

        return preg_match("/([A-Z])+([a-z])+([0-9])/",$password);

    }


    /**
     * @access private
     *
     * @param array $req
     *
     * @return bool
     */


    private function is_request_for_account_valid(Array $req)
    {



        $check =

            /** true if has empty field , false if not  **/

            constraint::isThereEmpty($req) ||

            /** false if regex is true  **/

            !preg_match(REGEX::PHONE_NUMBER ,@$req['CP']) ||


            !$this->is_password_valid(@$req['password']) ||


            /** false if all keys is exist **/

            !constraint::keys_exist($req,[
                "Lastname"
                ,"Middlename"
                ,"Firstname"
                ,"user_url"
                ,"CP"
                ,"password"
            ]);



        return !$check;



    }


    /**
     * SESSION_KEY : Array ( [pass], [user] , [ID] )
     * @return bool
     *
     * The return value (usually TRUE on success, FALSE on failure)
     *
     */


    protected function validate(bool $force = false) : bool
    {

        $login_data = Session::get()->{SESSION_KEY};

        $undefined_session_key = !$login_data;


        if($undefined_session_key)

            return false;


        $not_array = !is_array($login_data);


        if($not_array)

            return false;



        $login_data = (Object) $login_data;


        if(empty(@$login_data->pass) || empty(@$login_data->user))

            return false;



        if(@$login_data->staff)

            $this->isStaff = true;



        $this->username = $login_data->user;

        $this->password = $login_data->pass;

        $credential = new Credentials();

        if(!$credential->check() || $force)

            return self::LogIn();

        return true;

    }





    /**
     * reset first the session <b>session::close()</b> then check if <b>$this->username</b>
     * and <b>$this->password</b> is empty if it false then check if username is exist on database
     * @param string or Integer $id referred as idlogin in database
     * @return bool
     *
     * The return value (usually TRUE on success, FALSE on failure)
     *
     */


    private function LogIn() : bool
    {

        //session::close();


        $not_specified_user_and_pass = empty($this->username) and empty($this->password);


        if($not_specified_user_and_pass)

            return false;


        $user = $this->user_details($this->username);


        $username_not_exists = !$user; //Not user


        if($username_not_exists)

            return false;



        $unrecognized_password = !$this->recognized_password();


        if($unrecognized_password)

            return false;


        $this->id = $user["id"];

        return $this->set_session_key($user);



    }



    protected function set($username,$password) : bool {


        $this->username = $username;

        $this->password = $password;

        return $this->LogIn();


    }



    /**
     * @access private
     *
     * @return bool
     */


    private function set_session_key(Array $details = []) : bool
    {


        $session_key_values = [
            "pass" => $this->password,
            "user" => $this->username,
            "staff" => $this->isStaff,
            "id" => $this->id,
            "currentUser" => $details
        ];


        Session::set()->{SESSION_KEY} = $session_key_values;


        return true;



    }


    /**
     * verify and compare ($this->password) of a current user
     *
     * @return bool
     */


    private function recognized_password(String $user = '') : bool
    {

        $user_type = $this->isStaff ? "staff" : "user";


        if(!$user)

            $user = $this->username;


        $password_from_database = $this->database->get($user_type,"password", ["user_url" => $user]);

        return (bool) password_verify($this->password,$password_from_database);

    }




    /**
     * check if phone number is verify
     * @return bool
     */


    public function isPhoneNumberVerify()
    {

        return database::getInstance()->has("user",[
            "isVerify" => user_type::PHONE_NUMBER_VERIFIED,
            "id" => $this->get_id()
        ]);

    }


    public function phoneNumber_GenerateCode()
    {

        if($this->isPhoneNumberVerify()) return false;

        $code =  (new Tokenizer(3))->create(HASH_CODE,false)->check(['user'=>'member_code']);

        database::getInstance()->update('user',["verification_code" => $code],[
                "id" => $this->get_id()
        ])->rowCount();


        return $code;

    }


    public function hasVerificatonCode() {


        return database::getInstance()->has('user',[
            "verification_code[!]" => null ,
            "verification_code[!]" => '' ,
            "id" => $this->get_id()
        ]);


    }


    public  function getPhoneNumber(String $username = DEFAULT_VALUE) {


        if(!$username)

            $username = $this->username;


        return database::getInstance()->get('user','CP',['user_url' => $username]);


    }


    public static function numberOfStaff() {

        return database::getInstance()->count("staff","*");

    }




}



class user_requirements extends user_details {


    public function __construct(Array $details)
    {
        $this->info = $details;

        $this->setInformation();
    }


    public function is_phone_number_specified() : bool
    {

        $CP = $this->CP;

        return preg_match(REGEX::PHONE_NUMBER,$CP);

    }


    public function is_signature_set() : bool {

        $target =  $this->sign_svgbase64;

        $imageContent = base64_decode($target);

        $encode = base64_encode($imageContent);

        $target = preg_replace("/\W/","",$target);

        $target = strtolower($target);

        $encode = preg_replace("/\W/","",$encode);

        $encode = strtolower($target);

        return $target === $encode;

    }


    public function completion_of_identity() : bool {


        return $this->is_profile_set() && $this->is_phone_number_specified() &&
            $this->is_signature_set();

    }

}




class _User extends user_requirements {



    public function __construct(array $details)
    {
        parent::__construct($details);
    }


    public static function get(String $user, bool $isStaff = false) : _User
    {
        /** @var $state return 'user' id isStaff is false, 'staff' if not */

        $state = user_type::defined($isStaff);

        $details = database::getInstance()->select($state,"*",[
            "OR" => [
                "id" => $user,
                "user_url" => $user
            ],
            "LIMIT" => 1
        ]);


        return new _User($details);

    }

}





class current_USER extends user_details {


    private $session_key;


    public function __construct()
    {

        $this->session_key = Session::key();


        if(!$this->session_key)

            throw new Error("Information not specified");


        $this->info = $this->session_key->currentUser;


        if(!$this->info)

            throw new Error("Current user not specified");


        $this->setInformation();


    }


    public static function isCompletedRequirements() : bool {


        $details = self::getDetails();

        $req = new user_requirements($details);

        return $req->completion_of_identity();

    }


    public static function  getDetails() : Array {

        return Session::key()->currentUser;

    }


    public static function refresh() : current_USER {

        $ref = new Users();

        $user = new current_USER();

        return $user;

    }


    public function isStaff() : bool
    {

        return $this->session_key->staff;

    }



}


