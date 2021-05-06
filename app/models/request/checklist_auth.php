<?php
/**
 * Created by PhpStorm.
 * User: Sunlee
 * Date: 2/9/2019
 * Time: 2:46 PM
 */

include_once MODELS_PATH."checklist.php";

include_once MODELS_PATH."club.php";

include_once MODELS_PATH."post.php";

include_once MODELS_PATH."Member.php";




class checklist_auth extends checklist
{



    public function updateBatch(String $id = '')
    {

        $request = $_POST;


        $is_valid = constraint::strict($request,['date','time']);


        $isStaff = (new Users())->isStaff;


        if(!$request or !$is_valid or !$isStaff)

            return;

        $formatDate = Date::format($request['date'],"Y-m-d");

        $formatTime = Date::format($request['time'],"H:m:s");

        $FullDate = $formatDate." ".$formatTime;

        //$date_time = new Date($formatDate,$request['time']);



//        $inverted = $date_time->isInverted();
//

        if(false)

            return INVALID_REQUEST;


        if(!$id)

            $id = self::getUpdatedID();



        $check_changes = $this->getBatchDetails($id,['deadline' => $FullDate]);



        if($check_changes)

            return ERROR;



        $database = new database();


        $state = $database->update('checklist',
            ["deadline" => $FullDate], ['id_checklist' => $id]);


        if($state instanceof PDOStatement)
        {


            if($state->rowCount())
            {



                $post_type = new post_batch_update();

                $post_type->date = $FullDate;

                $post_type->batchId = $id;

                $_post = new post($post_type);

                return $_post->create() ? VALID_REQUEST : INVALID_REQUEST;

            }

            return INVALID_REQUEST;
        }


        return INVALID_REQUEST;

    }


    public function submitChecklist()
    {

        $request = $_POST;

        $is_valid = constraint::strict($request,[
            "body",
            "type",
            "url",
            "isMemberState"
        ],false); //strict but dont remove rempty fields



        if(!$is_valid)

            return false;



        $renewal = Member::get_renewalOf_current_user($request['url']);



        if(!$renewal)

            return false;



        if(!self::is_valid_checklist_type($request['type']))

            return false;



        if(self::isSubmitted($renewal,$request['type']))

            return false;


        if(!class_exists($request["type"]))

            return false;


        $type = new $request["type"]($renewal);


        $type->body = $request['body'];


        $type->files = $_POST['files'];


        if($request['isMemberState'])
        {

           $is_success = $this->FS_update_member_state($_POST,$type);


           if(!$is_success)

               return INVALID_REQUEST;

        }




        return $type->insert($request['isMemberState']);


    }


    private function FS_update_member_state($request,FS $fs)
    {


        $request = $_POST;


        $is_valid = constraint::strict($request,["method"]);


        if(!$is_valid) return false;


        $exist = method_exists($fs,$request['method']);


        if(!$exist) return false;


        return $fs->{$request['method']}();



    }


    public function change_state()
    {

        $request = $_POST;

        $is_valid  = constraint::strict($request,["body","post_url","type"],false);

        if(!$is_valid) return;

        $submission = new submission_state($request['post_url']);

        if(method_exists($submission,$request['type'])) {

            $submission->body = $request['body'];

            return $submission->{$request['type']}();

        }

        return;

    }


    public function getTypeObject(String $type)
    {

        if(!constant("checklist_type::$type"))

            return false;

        return new $type();


    }


    public function saveFS()
    {

        $request = $_POST;


        $is_valid  = constraint::keys_exist($request,[
            "data",
            "type",
            "url"
        ]);


        if(!$is_valid) return false;


        $class = "FS_{$request['type']}";


        $r_code = Member::get_renewalOf_current_user($request['url']);


        if(!class_exists($class) || !$r_code)

            return INVALID_REQUEST;


        $call = new $class($r_code);

        /** void */


        $call->save($request['data']);



    }


    public function saveXML(Array $request) {


        $is_valid  = constraint::keys_exist($request,[
            "xml",
            "folder",
            "rcode"
        ]);


        if(!$is_valid) return INVALID_REQUEST;

        $xml = new XML($request['rcode'],$request['xml']);

        $xml->folder = $request["folder"];

        $xml->save();

        return VALID_REQUEST ;


    }


    public function getFSUnformattedData() {


        $request = $_POST;

        $is_valid = constraint::strip_request($request,["url"]);

        if(!$is_valid) return;

        $rcode = null;

        if(!Users::isStaff())
        {


            /** @var $rcode validate request and return renewal code of a member */

            $rcode = Member::get_renewalOf_current_user($request['url']);
        }
        else
        {

            if(!isset($request["member_code"])) return;

            /** @var $rcode if it is staff return $rcode without validating the request */

            $rcode  = (new club())->get_renewal_code($request,true);

        }


        return FS::getUnformattedData($rcode);


    }


    public function getByClubData(String $url) {

        $r_code =  Member::get_renewalOf_current_user($url);

        $club = new club();

        $club->renewal_code = $r_code;

        $renewals = $club->get_renewal_by_id();

        $result = (new FS())->getData($renewals);

        return $result;

    }


    public static function getAllApprovedChecklist() {

        $request = $_POST;

        $is_valid = constraint::strict($request,["org_url"]);

        if(!$is_valid) return;

        $renewal = Member::get_renewalOf_current_user($request["org_url"]);

        $output =  (new checklist())->getSubmittedChecklist($renewal);

        constraint::encrypt_result($output);

        return $output;

    }


}