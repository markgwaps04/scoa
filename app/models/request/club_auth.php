<?php
/**
 * Created by PhpStorm.
 * User: Sunlee
 * Date: 1/25/2019
 * Time: 12:11 AM
 */

include_once MODELS_PATH."club.php";

include_once MODELS_PATH."post.php";


/**
 * highly dependent on club class
 *
 * handles inbound outbound request of a user for
 * club,renewals,member,and post
 *
 * pinaka hugaw na class
 *
 * Class club_auth
 */


class club_auth extends club
{



    public function create()
    {


        if(!$_POST) return;


        $request = $_POST;


        $position = htmlspecialchars(@$request['position']);

        $is_valid = !constraint::strict($request,["name","details"]);


        if($is_valid)

            return INVALID_REQUEST;


        $error = !$this->new_org($request,$position);


        if($error)

            return INVALID_REQUEST;


        $post_type = new post_club_owner();

        $post = new Post($post_type);

        $post->create($this->renewal_code);

        return VALID_REQUEST;


    }







    public function join()
    {

        $request = $_POST;

        /** @var $not_valid : pass by reference */

        $not_valid = !constraint::strict($request,["member_code","position"]);


        if($not_valid) return false;



        $this->renewal_code =

            $this->get_renewal_code(['renewal.member_code' => $request['member_code']]);




        $renewal = $this->renewal_code;
        if(!$renewal) return INVALID_REQUEST;



        $membership = new Member($renewal,$request['position']);

        $number_of_users = count($membership->list_of_users());


        $is_success = $membership->new_member(

            !$number_of_users

                ? Member::APPROVED
                : Member::NOT_APPROVED

        );




        if(!$is_success)

            return INVALID_REQUEST;


        $member_request = new post_member_request;

        $member_request->position = $request['position'];
        $member_request->target_user = (new Users())->get_id();


        $member_request->type = $number_of_users ?  (member_request::JOIN) : (member_request::APPROVED);

        $post = new Post($member_request);

        $post->create($renewal);


        return VALID_REQUEST;


    }


    public function org_requirements(String $renewal = '')
    {


        $request = $_POST;


        $is_valid =  constraint::strict($request,["tempath"]);


        if(!$is_valid) return [];


        if(!$renewal)
        {

            $renewal = $this->get_renewal_code(
                [
                    'org.tempath' => $request['tempath'],
                    "renewal.member_code" => self::user_member_codes()

                ],true);


        }


        $data['is_position_fill'] =

            (new Member($renewal))->is_position_fill();



        $data['is_cover_photo_set'] =

            (bool) $this->get_cover_photo($renewal);



        $data['is_members_set_the_requirements'] =

            (bool) $this->listOf_user_required_toSet_their_requirements($renewal);


        return $data;


    }





    /**
     * @access private
     *
     * @param String $rcode
     *
     * @return array
     */


    private function listOf_user_required_toSet_their_requirements(String $rcode) : bool
    {



        $member = new Member($rcode);

        /** @var  $users get the list of arrproved user */

        $users = $member->list_of_users(['members.IsApproved' => Member::APPROVED]);


        if(!$users)

            return false;


        foreach ($users as $every_user => $details){


            $user = new Users();

            $user->username = $details['user_url'];

            $user->isStaff = false;


            if(!$user->required())

                return false;


        }


        return true;

    }




    /**
     * @access public
     *
     * @return array
     */



    public function renew_member_path() : bool
    {

        $request = $_POST;


        $is_valid =  constraint::strict($request,["url"]);


        if(!$is_valid)

            return false;

        $renewal = Member::get_renewalOf_current_user($request['url']);


        $membership = new Member($renewal);
        $membership->change_code();

        return true;


    }



    public function member_status()
    {


        $request = $_POST;


        if(!$request)

            return false;



        $is_valid =  constraint::strict($request,["tempath","state","user_id","renewalID"]);


        if(!$is_valid)

            return false;


        $renewal = $this->get_renewal_code([
            'renewal.id' => $request['renewalID'],
            "org.tempath" => $request['tempath']
        ]);


        if(!$renewal)

            return false;


        $class = $request['state']."_member";


        if(class_exists($class))
        {


            $info =  new $class($renewal,$request['user_id']);

            $this->org_url = self::get_orgURL(['tempath' => $request['tempath']]);

            $this->change_tempath();

            return $info->state();


        }


        return false;


    }




    /**
     * @deprecated theres a better version of this
     * @return bool
     */


    public function club_state_active()
    {

        $request = $_POST;

        $is_valid = constraint::strict($request,['renewal_code']);


        if(!$is_valid)

            return false;


        $this->renewal_code =  $request['renewal_code'];


        $org_details = self::details($request['renewal_code']);


        $this->org_url = $org_details['url'];


        $this->change_tempath();


        return $this->approved_org();


    }

    /**
     * @deprecated theres a better version of this
     * @return bool
     */

    public function club_state_decline()
    {

        $request = $_POST;

        $is_valid = constraint::strict($request,['renewal_code_decline','tempath']);


        if(!$is_valid) return false;


        $this->renewal_code =  $request['renewal_code_decline'];

        return $this->decline_org($request['tempath']);


    }


    public function change_club_state() {

        $request = $_POST;

        $is_valid = constraint::strict($request,["state","id","orgId"]);

        if(!$is_valid) return false;

        $state = new club_state();

        if(!method_exists($state,$request['state']))

            throw new Error("Invalid Parameters");

        $state->orgId = $request['orgId'];
        $state->renewalId = $request["id"];

        return $response = $state->{$request['state']}();

    }

    public function Invitation() {

        $request = $_POST;

        $is_valid = constraint::strict($request,['numbers','url']);

        if(!$is_valid) return INVALID_REQUEST;


        $rcode = Member::get_renewalOf_current_user($request['url']);

        if(!$rcode) return INVALID_REQUEST;


        $phones = explode(",",$request['numbers']);

        $membership = new Member($rcode);

        $is_success = $membership->invite($phones);

        $this->PhoneTagsAddAttempt($rcode,$request['numbers']);

        return $is_success ? VALID_REQUEST : INVALID_REQUEST;


    }














}