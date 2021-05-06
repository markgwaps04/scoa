<?php

include_once MODELS_PATH."club.php";

include_once MODELS_PATH."Member.php";

include_once MODELS_PATH."post.php";


abstract class reminders_type {

    const ByURL = 1;

    const ByUser = 2;

    const Admin = 3;

    const INVALID = 4;

}



class remindByAdmin extends reminders_type {


    public function __construct()
    {
        if(!(new Users())->isStaff)

            throw new Exception("Invalid type of users");

    }

    public function allStaff() {

        return ["feeds.type" => ["E","F","G","I","J"]];

    }


}



class remindByURL extends reminders_type  {

    private $url;

    public function __construct($params)
    {


        if(is_array($params) && isset($params['url'])) {

            $this->url = $params['url'];

            return;

        }

        $this->url = $params;


        if(!$this->url) {

            throw new Exception("No group url specified");

            return;

        }


    }


    public function ofUser() {


        /** @var $r_code get the renewal of a specified url of a current user  */

        $r_code = Member::get_renewalOf_current_user($this->url);

        return [
            "feeds.r_code" => Medoo\Medoo::raw("(case feeds.type
                when 'E' then '$r_code'
                when 'F' then '$r_code'
                else '' end)")
        ];

    }


}



class reminders {


    public $LimitResults = 50;

    public $queryUser = false;

    public $by = null;

    public $limit = 25;

    private $params;

    private $set = null;

    public function __construct(String $set,$params = [])
    {

        $this->params = $params;


        if(!class_exists($set)) {

            throw new Exception("The class is not exist");

            return;

        }

        $this->set = new $set($this->params);

        if(!($this->set instanceof reminders_type)) {

            throw new Exception("Specified class is not instance of reminders_type");

            return;

        }

    }


    public function get() {


        $function = $this->by;

        $partial = $this->set->$function();

        return $this->query($partial);


    }



    private function query($arr) {


        return post::feeds(array_merge([

            "LIMIT" => $this->limit,
            "feeds.type" => ["I","J","F","E"]

        ],$arr));



    }

}