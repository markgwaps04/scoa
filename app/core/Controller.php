<?php
/**
 * Created by PhpStorm.
 * User: Sunlee
 * Date: 1/14/2019
 * Time: 5:50 PM
 */


class Controller implements IController {



    public static function model($model,...$arguments)
    {

        include_once "../app/models/{$model}.php";

        $class = array_reverse(explode('/',$model))[0];


        return new $class;

    }


    public static function view(String $file, Smarty $smarty)
    {

        $smarty->display(APP_VIEW.$file.'.tpl');

    }

}