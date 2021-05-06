<?php


class Session  {


    private static $session = null;


    public function __get($name)
    {

        self::start();

        $not_exists = !key_exists($name,self::$session);

        if($not_exists)

            return false;


        return self::$session[$name];

    }

    public  function __set($name, $value)
    {


        self::start();

        self::$session[$name] = $value;


    }


    private function start(){


        if(!$this->is_started()) @session_start();


        self::$session = &$_SESSION;



    }


    public static function close(){ return session_destroy(); }



    private function is_started() {

        if ( version_compare(phpversion(), '7.2.0', '>=') )

            return session_status() === PHP_SESSION_ACTIVE ;

        else

            return session_id() !== ""; //NOT EMPTY


    }

    public static function get() : session { return new self();}


    public static function set() : session { return new self(); }


    public static function unset(String $name): bool{

        $not_started = !self::is_started();

        if($not_started)

            return false;

        unset(self::$session[$name]);

        return true;

    }

    public function getAll() : Array {

        self::start();

        return self::$session;

    }

    public static function key()  {

        return (Object) Session::get()->{SESSION_KEY};

    }


}