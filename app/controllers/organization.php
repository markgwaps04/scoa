<?php
/**
 * Created by PhpStorm.
 * User: Sunlee
 * Date: 1/14/2019
 * Time: 8:10 PM
 */

include_once "abstract/global_controller.php";



class organization extends AUTH
{



    public function __construct()
    {

        parent::__construct();

        $this->__isStaff();

        $this->__org();


    }




    private function join_request()
    {

        $club_auth = Controller::model('request/club_auth');

        $request = $club_auth->join();

        $this->is_valid_request($request);

    }


    /**
     * page for creating new organization
     *
     * @access public
     *
     * @return void
     */


    public function create()
    {


        $organization = Controller::model('request/club_auth');

        $request = $organization->create();

        $this->is_valid_request($request);

        Controller::view("Users\home\create_org",$this->smarty);


    }



    /**
     * default method for this class
     *
     * @access public
     *
     * @return void
     */



    public function index()
    {

        $this->join_request();

        Controller::view("Users\home\welcome_page",$this->smarty);



    }





    public function recent_activity() {

        constraint::validRequest();

        include_once "../app/models/request/post_auth.php";

        $post = new post_auth();

        $this->smarty->assign("activity",$post->recent_activity());

        Controller::view("Users\misc\\recent_activity",$this->smarty);


    }



    public function user_groups() {

        constraint::validRequest();

        include_once "../app/models/request/club_auth.php";

        $club = new club_auth();

        $groups = $club->user_organizations(true);

        $this->smarty->assign("has_organization",$groups);

        Controller::view("Users\misc\user_groups",$this->smarty);


    }




    /**
     * assign public variable for smarty
     *
     * @access private
     *
     * @return void
     */

    private function __org()
    {


        $org = Controller::model('club');

        $this->smarty->assign("club",$org);

    }





    public function join()
    {

        $this->join_request();

        Controller::view("Users\home\join_org",$this->smarty);

    }





    private function is_valid_request($request) : bool
    {

        if($request === VALID_REQUEST)

            $this->home();


        $this->smarty->assign("request",$request);

        return false;
    }





    public function requirements(String $Rcode = '')
    {

        constraint::validRequest();

        $club = Controller::model('request/club_auth');

        $request = $club->org_requirements($Rcode);

        echo json_encode($request);


    }


    /**
     * populate members of a specified organization
     *
     * @access public
     * @param String $url referring
     * temporary path of organization in database
     *
     * @return void
     */


    public function members(String $url = '')
    {

        $club = Controller::model('request/club_auth');

        $request = $club->member_status();

        $this->smarty->assign("request",$request);

        $org = $club->user_organizations(true, ['org.url' => $url, "LIMIT" => 1]);


        //of not valid tempath

        if (!$org) $this->home();


        $this->smarty->assign("user_club", @$org[FIRST_ROW]);

        Controller::view("Users\home\\org_members", $this->smarty);


    }





    public function members_state()
    {

        constraint::validRequest();

        $club = Controller::model('request/club_auth');

        echo  json_encode([
            "response"   =>   $club->member_status(),
            "tempath"    =>   $club->get_tempPath()
        ]);

    }





    public function info(String $url = '')
    {

        $user_organization = $this->org($url);


        if(!$user_organization) //of not valid tempath

            $this->home();


        $this->smarty->assign("user_club",@$user_organization[0]);

        Controller::view("Users\home\\org_info",$this->smarty);

    }






    public function submitChecklist()
    {

        constraint::validRequest();

        $checklist_auth = Controller::model('request/checklist_auth');

        echo $checklist_auth->submitChecklist();

    }




    public function submitFS()
    {

        constraint::validRequest();

        include_once "../app/models/request/checklist_auth.php";

        $checklist = new checklist_auth();

        echo $checklist->saveFS();

    }





    public function getCashFlow() {


        include_once "../app/models/request/checklist_auth.php";

        include_once "../app/models/request/club_auth.php";

        $validate = constraint::strict($_POST,["url"]);


        if($validate) {


            $renewal = Member::get_renewalOf_current_user($_POST["url"]);

            if(!$renewal) return;

            $membership = new Member($renewal);

            $validate = $membership->is_member((new Users())->get_id());

            if(!$validate) return;

            $fs = new FS_cash_flows($renewal);

            echo $fs->getData();


        }




    }







    public function reminders($limit = null) {

//        constraint::validRequest();

        include_once "../app/models/request/post_auth.php";


        $post = new post_auth();

        $activitys = [];

        if($limit) {

            $activitys = $post->recent_activity(true,[
                "LIMIT" => 3
            ]);


        }


        else {

            $activitys = $post->recent_activity(false);

        }


        $this->smarty->assign("activity",$activitys,true);

        Controller::view("Misc\Reminders",$this->smarty);


    }








}