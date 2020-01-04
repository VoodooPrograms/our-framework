<?php


namespace Ourframework\Core;


class ViewSupport
{
    public function __construct(){

    }

    public function print($var){//print a echo? roznica
        if(is_array($var)){
            foreach ($var as $v) echo $v;
        }
        else echo $var;

    }
}