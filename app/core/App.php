<?php
/**
 * Created by PhpStorm.
 * User: Sunlee
 * Date: 1/14/2019
 * Time: 5:49 PM
 */


/**
 * see init()
 * Class App
 */
class App {


    protected $controller = 'Home';

    protected $method = 'index';

    protected $params = [];

    public function __construct()
    {

        /**
         * The first value of $url variable is a controller
         * the others is a method and param
         */

        $url = $this->parseUrl();


        /**
         * If a file exist on controllers folder replace a value
         * of App->controller of first value of $url variable
         */


        if(file_exists('../app/controllers/'. $url[0]. '.php')){

            $this->controller = $url[0];

            /**
             * remove the first value so we can call easily the methods and param
             */

            unset($url[0]);

        }




        /**
         * include the $this->controller value
         * @note the default value of this $this->controller is "home"
         */


        include_once('../app/controllers/'. $this->controller . '.php');

        /**
         * Declare whats the value of $this->controller
         */

        $this->controller = new $this->controller;


        /**
         * if method not specify return nothing;
         */



        try
        {

            $is_method_exist = @method_exists($this->controller,@$url[1]);

            $visibility = new ReflectionMethod($this->controller,@$url[1]);


            if($is_method_exist && $visibility->isPublic())
            {

                $this->method = $url[1];
                unset($url[1]);

            }else {


                header(HTTP_RESPOND::FORBIDDEN);

                exit();

            }


        }catch(Exception $err){}


        $this->params = $url ? array_values($url) : [];

        @call_user_func_array([$this->controller, $this->method],$this->params);

    }

    public function parseUrl()
    {
        /**
         * Trim remaining slash and sanitize url
         */

        $url = filter_var(rtrim(@$_GET['url'],'/'),FILTER_SANITIZE_URL);

        return explode('/',$url);

    }

}