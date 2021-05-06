<?php
/**
 * Created by PhpStorm.
 * User: Sunlee
 * Date: 1/30/2019
 * Time: 2:30 PM
 */

include_once "abstract/global_controller.php";



class feeds extends AUTH
{

    public $org_url;


    public function __construct()
    {

        parent::__construct();

        $this->org_class();


    }

    /**
     * default controller
     *
     * @param String $url
     */


    public function index(String $url = '')
    {

        include_once "../app/models/request/club_auth.php";

        $club = new club_auth();

        $this->smarty->assign("request",$club->Invitation());

        $org = $this->getOrgFromURI($url);

        include_once "../app/models/Member.php";

        $membership = new Member($org['RCode']);

        $position = $membership->getCurrentUserPosition();

        $this->smarty->assign("_membership",$membership);
        $this->smarty->assign("cUPosition",$position);

        $this->change_position($org['RCode']);

        if($position != 0) {

            Controller::view("Users\home\\feeds",$this->smarty);

            exit();
        }

        Controller::view("Users\misc\\position_required",$this->smarty);


    }


    public function change_position($renewal) {

        if(!$_POST) return;

        $request = $_POST;

        $is_valid = constraint::strict($request,['position_update']);

        if(!$is_valid) return;

        include_once "../app/models/Member.php";

        $membership = new Member($renewal,$request['position_update']);

        $current = new current_USER();


        $response = $membership->update_position( $current->id);

        $this->smarty->assign('position_update',$response ? VALID_REQUEST : INVALID_REQUEST);

    }





    public function users_post()
    {


        constraint::validRequest();

        include_once MODELS_PATH."request/post_auth.php";

        $post_class = new post_auth();

        $this->smarty->assign("post",$post_class->user_news_feed());

        Controller::view("Users\home\\feeds_populate",$this->smarty);


    }











}