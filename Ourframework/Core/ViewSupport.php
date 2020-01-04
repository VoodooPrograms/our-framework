<?php


namespace Ourframework\Core;


class ViewSupport
{
    public function __construct(){

    }

// Checking variable is printable as string
    private function isPrintable($var)
    {
        //if array, check is object printable
        if (is_array($var)) {
            foreach ($var as $v) {
                if (!$this->isPrintable($v))
                    return false;
            }
            return true;
        }
        //check is it object printable
        if (is_object($var)) {
            if (method_exists($var, '__toString'))
                return true;
            return false;
        }
        if (is_numeric($var)) {
            return true;
        }
        if (is_string($var)) {
            return true;
        }
        //if no match, return false
        return false;
    }

    public function print($var){//print a echo? roznica
        if(is_array($var)){
            foreach ($var as $v)
                if ($this->isPrintable($v)) {
                    echo $v;
                } else
                    echo "Error: not printable";
        } else if ($this->isPrintable($var)) {
            echo $var;
        } else
            echo "Error: not printable";
    }
}