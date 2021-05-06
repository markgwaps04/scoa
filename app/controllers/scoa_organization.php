<?php

include_once "abstract/global_controller.php";

include_once "organization.php";

class scoa_organization extends AUTH
{



    public function __construct()
    {
        parent::__construct();

        $this->__isUser();

        $this->org_class();
    }



    public function unapproved_group() {

        include_once MODELS_PATH."request/club_auth.php";

        $club = new club();

        echo json_encode($club->unapproved_organizations());

    }



    /** restrict a user to visit this class */

    public function index()
    {

        header("location: " .PUBLIC_PATH , true);

        exit();

    }



    public function addOrg() {

        include_once "../app/models/request/scoa_organization_request.php";

        $request = scoa_organization_request::create_org();

        if($request !== INVALID && $request)

            $this->page("scoa_organization/view_info/".$request);

        $this->smarty->assign("request",$request);

        Controller::view("admin\index\\misc\\addOrg",$this->smarty);

    }


    public function QueryUsers($query = "Mar") {


        echo json_encode(Users::detailsByFilter([
            "OR" => [
                "user.Firstname[~]" => $query,
                "user.Middlename[~]" => $query,
                "user.Lastname[~]" => $query,
                "user.user_url[~]" => $query,
                "user.CP[~]" => $query,
            ],
            "LIMIT" => 4
        ]));

    }



    public function request()
    {


        //$this->club_approval_request();

        Controller::view("admin\index\\request",$this->smarty);

    }


    public function renewable_organizations()
    {

        $this->org_model();

        Controller::view("admin\index\\user_organizations_renewable",$this->smarty);

    }


    public function un_renewable_organizations()
    {

        $this->org_model();

        Controller::view("admin\index\\user_organizations_unrenewable",$this->smarty);

    }


    public function view_info(String $id = '')
    {

        $response = $this->details($id);

        $user_model = Controller::model('Users');

        $user_model->isStaff = false;

        $this->smarty->assign("user_model",$user_model);

        Controller::view("admin\index\\org_info",$this->smarty);

        die();


    }


    public function feeds(String $rcode = '')
    {

        $this->details($rcode);

        $membership = new Member($rcode);

        $this->smarty->assign("_membership",$membership);

        Controller::view("admin\index\\feeds",$this->smarty);

    }


    private function org_model()
    {

        $org = Controller::model('request/club_auth');

        $this->smarty->assign("org_model",$org);

        return $org;

    }


    private function details(String $id)
    {


        $org = $this->org_model();


        $this->members_state_in_org();


        $details = $org->organizations(['renewal.id' => $id]);


        if(!$details)

            $this->home();


        $this->smarty->assign("user_org",$details);

        return $org;

    }






    public function club_approval_request($OnURL = FALSE)
    {

        if($url) constraint::validRequest();

        include_once MODELS_PATH."request/club_auth.php";

        $org = new club_auth();

        $reponse = $org->change_club_state();

        $this->smarty->assign("request",$reponse);

        if($url) return $reponse;

        echo $reponse;

    }





    public function club_approval_request_ONURL()
    {


        include_once MODELS_PATH."request/club_auth.php";

        $org = new club_auth();

        $reponse = $org->change_club_state();

        $this->smarty->assign("request",$reponse);

        return $reponse;

    }



    /**
     * @deprecated
     * @param String $Rcode
     */

    public function requirements(String $Rcode = '')
    {

        constraint::validRequest();

        $club = Controller::model('request/club_auth');

        $request = $club->org_requirements($Rcode);

        echo json_encode($request);


    }


    private function members_state_in_org()
    {

        $org = Controller::model('request/club_auth');

        $request = $org->member_status();

        $this->smarty->assign("request",$request);

    }


    public function getMembers() {

        constraint::validRequest();

        constraint::dashToPointKey($_POST);

        constraint::htmlspecialchars($_POST);

        constraint::removeEmpty($_POST);

        $result = Member::getAllUsers($_POST);

        echo json_encode($result);

    }



}