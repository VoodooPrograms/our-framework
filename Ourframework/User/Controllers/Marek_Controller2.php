<?php


namespace Ourframework\User\Controllers;


use Ourframework\Core\Controller;
use Ourframework\Core\Request;

class Marek_Controller2 extends Controller
{

    public function index(Request $request): int
    {
        echo PHP_EOL."Marek jest fajny 2!";
        return 0;
    }
}