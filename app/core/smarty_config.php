<?php


class My_Security_Policy extends Smarty_Security {

    // disable all PHP functions
    public $php_functions = array("count");

    // remove PHP tags
    public $php_handling = Smarty::PHP_REMOVE;

    public $trusted_uri = [""];

    // allow everthing as modifier
    public $modifiers = array();

}



abstract class smarty_config
{


    private static $smarty;


    public static function set()
    {
        self::$smarty = new Smarty();

        self::default_config();

        self::template_constant_paths();

        self::global_template_functions();

        return self::$smarty;

    }


    private static function default_config()
    {

        self::$smarty->debugging = false;

        self::$smarty->compile_check = true;

        self::$smarty->caching = false;

        self::$smarty->direct_access_security = false;


    }


    private static function template_constant_paths()
    {


        self::$smarty->assign('vendor', VENDOR_PATH, true);

        self::$smarty->assign('css', CSS_PATH, true);

        self::$smarty->assign('public', PUBLIC_PATH, true);

        self::$smarty->assign('root', ROOT, true);

        self::$smarty->assign('js', JS_PATH, true);

        self::$smarty->assign('files', FILES_ROOT . "/", true);

        self::$smarty->assign('profile', FILES_FOLDER . "/profile/", true);

        self::$smarty->assign("main",new SCOA,false);


    }


    private static function global_template_functions() {



        try {


            function objToArray($params) {

                return (Array) $params["object"];

            }

            self::$smarty->registerPlugin("function","toArray","objToArray");


        }catch(Exception $err){

            throw new Error($err->getMessage());

        }



    }


}