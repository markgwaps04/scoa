<?php
/**
 * Created by PhpStorm.
 * User: Sunlee
 * Date: 1/30/2019
 * Time: 10:49 PM
 */



class AUTH
{

    protected $smarty;


    public function __construct()
    {


        $this->smarty = smarty_config::set();

        $this->__is_login_valid();

        $this->user_model();

        $this->__current_user();

        $this->checklist_class();

        $this->date_class();

        //echo base64_encode(["dsds"]);



    }



    public function page(String $path) {

        header("location: " .PUBLIC_PATH.$path , true);

        exit();

        die();

    }


    /**
     * check if the authentication is valid
     * if not display home page
     *
     * @access private
     *
     * @return void
     */

    protected function __is_login_valid()
    {

        include_once "../app/models/request/user_auth.php";

        $user_model = new user_auth();

        $not_login = !$user_model->isLogin();

        if($not_login)

            $this->home();


    }



    /**
     * check if a current user is Staff
     * if true display Forbidden page
     *
     * @access private
     *
     * @return void
     */


    protected  function __isStaff()
    {


        $is_admin = $this->is_admin();

        if($is_admin)
        {
            header(HTTP_RESPOND::FORBIDDEN,true);

            exit();

        }

    }



    protected function __isUser()
    {

        $is_admin = $this->is_admin();

        if(!$is_admin)
        {

            header(HTTP_RESPOND::FORBIDDEN,true);

            exit();

        }

    }



    protected function is_admin()
    {

        $user_model = Controller::model('Users');

        $is_admin = $user_model->staff();

        return $is_admin;

    }




    public function newFS($url = '')
    {

        constraint::validRequest();

        $this->getOrgFromURI($url);

        Controller::view("Misc\\newFS", $this->smarty);

    }



    public function fs()
    {

        include_once "../app/models/request/checklist_auth.php";

        $fs = new FS();

        $this->smarty->assign("FS_class",$fs,true);

        return $fs;

    }



    protected function getOrgFromURI(String $url) {

        Session::unset(FEEDS_KEY);

        $this->checklist_class();

        $user_organization = $this->org($url);

        if(!$user_organization) //of not valid tempath

            $this->home();


        $this->org_url = $url;

        $this->smarty->assign("user_club",@$user_organization[0]);

        return $user_organization[0];

    }



    /**
     * a void to display home page
     *
     * @access private
     *
     * @return void
     */

    protected function home()
    {


        header("location: ". PUBLIC_PATH,true,301);

        exit;

    }


    /**
     * assign public variable for smarty
     *
     * @deprecated
     *
     * @access private
     *
     * @return void
     */

    private function __current_user()
    {

//        include_once "../app/models/request/user_auth.php";
//
//        $user_model = new user_auth();
//
//        $this->smarty->assign("user",$user_model);
//

        include_once "../app/models/request/user_auth.php";

        $current = new current_USER();

        $this->smarty->assign("currentUserClass",$current);

        $this->smarty->assign("safe_profile", $current->getProfile());

        $this->smarty->assign("is_identify",current_USER::isCompletedRequirements());

        $user_details = current_USER::getDetails();

        $this->smarty->assign("_currentUser",$user_details);

        $user_detailEncryped = constraint::encrypt_result($user_details);

        $this->smarty->assign("_currentUserEncoded",base64_encode(json_encode($user_detailEncryped)));

    }




    protected function user_model()
    {

        include_once "../app/models/request/user_auth.php";

        $this->smarty->registerClass("user_model", "_User");


//        $user_model = Controller::model('request/user_auth');
//
//        $this->smarty->assign("user_model",$user_model);

    }


    protected function club_class()
    {

        return Controller::model('request/club_auth');
    }



    protected function org(String $url)
    {

        $club = Controller::model('request/club_auth');

        $club->renew_member_path();

        $this->smarty->assign("club",$club);

        return $club->user_organizations(true,['org.url' => $url,"LIMIT" => 1]);

    }



    public function upload($folder = "upload")
    {

        constraint::validRequest();

        $result = FILE::upload($_FILES,$folder);

        echo json_encode($result);

    }



    public function byGroupData(String $url) {

        include_once MODELS_PATH."request/checklist_auth.php";

        $club = new checklist_auth();

        $result = $club->getByClubData($url);

        echo json_encode($result);

    }


    public function post_request(String $RCode = '')
    {

        constraint::validRequest();

        include_once MODELS_PATH."request/post_auth.php";

        $post_class = new post_auth();

        echo $post_class->create($RCode);

    }


    protected function org_class()
    {

        $org = Controller::model('club');

        $this->smarty->assign("club",$org);

    }


    public function checklist_class()
    {

        $checklistAUTH_model = Controller::model('request/checklist_auth');

        $this->smarty->assign("checklist_class",$checklistAUTH_model);

        return $checklistAUTH_model;

    }


    public function post_class()
    {

        $post = Controller::model('request/post_auth');

        $this->smarty->assign("post_class",$post);

        return $post;

    }


    public function date_class()
    {

        $this->smarty->assign("date_class",Date::getInstance());

    }


    public function getUnformattedData() {

       // constraint::validRequest();


        include_once "../app/models/request/checklist_auth.php";

        $checklist = new checklist_auth();

        $result = $checklist->getFSUnformattedData();

        if($result) echo json_encode($checklist->getFSUnformattedData());


    }


    public function print_reports($url = '')
    {



        include_once "../app/models/request/checklist_auth.php";

        include_once "../app/models/request/club_auth.php";

        include_once "../app/models/Member.php";

        $org_details = (new club())->organizations([
            'renewal.org_url' => $url,
            "LIMIT" => 1,
            "ORDER" => ["renewal.id"=>"DESC"]
        ]);



        if(!$org_details) return;

        $fs = new FS($org_details[0]["RCode"]);

        $this->smarty->assign("fs", $fs);

        $this->smarty->assign("org_details", $org_details);

        $this->smarty->assign("checklist_class", new checklist_auth());

        Controller::view("Misc\print_reports_", $this->smarty);


    }


    public function isUserExist() {

        constraint::validRequest();

        $is_valid = constraint::strict($_POST,["user_url"]);

        if(!$is_valid) return;

        include_once MODELS_PATH."request/user_auth";

        $user = new user_auth();

        echo $user->isUsernameExist($_POST['user_url']);

    }



    public function testingRelative() {

        Controller::view("test",$this->smarty);

    }


    public function getReminders($limit = 10) {

        include_once MODELS_PATH."request/post_auth.php";

        $post = post_auth::getReminders($limit);

        echo json_encode($post);

    }


    public function ApprovedChecklist() {

        $result = checklist_auth::getAllApprovedChecklist();

        echo json_encode($result);

    }


    public function getUser() {

        include_once "../app/models/request/user_auth.php";

        $request = $_POST;

        constraint::strict($request,["id","state"]);

        $users =  Users::detailsByFilter([

            "user.id" => $_POST['id'],

            "LIMIT" => 1

        ],$_POST['state']);


        if(!$users) $users = [];

        if($users) $users = $users[FIRST_ROW];

        echo constraint::ArrayEncodeBase64($users);

    }


    public function getTemplate() {

        $request = $_POST;

        $is_valid = constraint::strict($request, ["template_url","data","template_variable"]);

        if(!$is_valid) throw new Error("Not valid parameters");

        $request['data'] = constraint::toArray( (Array) json_decode($request['data']));

        $this->smarty->assign($request['template_variable'],$request['data']);

        $this->smarty->display($request['template_url'].".tpl");

    }


    public function getGroup($RenewalId) {

        constraint::validRequest();

        $RenewalId = htmlspecialchars($RenewalId);

        include_once "../app/models/request/club_auth.php";

        $club = new club();

        $org = $club->organizations([
            "renewal.id" => $RenewalId,
            "LIMIT" => 1
        ]);

        if($org) $org = $org[FIRST_ROW];

        echo json_encode($org);

    }






}


