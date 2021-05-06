<?php

include_once MODELS_PATH."club.php";

include_once MODELS_PATH."post.php";



class scoa_organization_request {


    public static function create_org() {

        if(!$_POST) return;

        $request = $_POST;

        $params = ["name","details","users","numbers"];

        $validate = constraint::strict($request,$params,false);

        if(!$validate) return INVALID_REQUEST;

        $club = new create_club();

        $club->name = $request['name'];

        $club->details = $request['details'];

        $club->members = explode(",",$request["users"]);

        /** save */

        return $club->save() ? $club->renewalId : INVALID;


    }


}
