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

//  Make a string uppercase
    public function upper($text)
    {
        if (is_string($text)) {
            return strtoupper($text);
        }
    }

//  Make a string lowercase
    public function lower($text)
    {
        if (is_string($text)) {
            return strtolower($text);
        }
    }

//  Returns string of structured information about one variable
    public function dump($var)
    {
        return var_dump($var);
    }

//  Includes specified template, returns include return value
    public function include_template($template)
    {
        if (is_file($template)) {
            $return_value = include $template;
            return $return_value;
        } else
            return FALSE;
    }

//  Display list of parameters passed into template by variable $parr, recursion depth = 1
    public function params($parr)
    {
        if (is_array($parr)) {
            $this->print(array_keys($parr));
        }
    }

//  Return length list of parameters passed into template by variable $parr
    public function paramsLength($parr)
    {
        if (is_array($parr)) {
            return sizeof($parr);
        }
    }

//  Display date in specified format, default format example: Monday 6th of January 2020 02:26:56 AM
    public function date($format = "l jS \of F Y h:i:s A")
    {
        echo date($format);
    }

//  Prints printable variables and arrays
    public function print($var){//print a echo? roznica
        if(is_array($var)){
            foreach ($var as $v)
                if ($this->isPrintable($v)) {
                    $this->print($v);
                    if (next($var))
                        echo ", ";
                } else
                    echo "Error: not printable";
        } else if ($this->isPrintable($var)) {
            echo $var;
        } else
            echo "Error: not printable";
    }
}