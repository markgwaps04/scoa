<?php
/**
 * Created by PhpStorm.
 * User: Sunlee
 * Date: 1/26/2019
 * Time: 5:45 PM
 */

class test extends \Medoo\Medoo
{

    public static function __callStatic($name, $arguments)
    {
       echo $name;
    }

}


test::insert();