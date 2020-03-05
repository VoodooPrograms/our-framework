<?php


namespace Ourframework\User\Controllers;


use Ourframework\Core\Controller;
use Ourframework\Core\Request;

class Marek_Controller extends Controller
{

    public function index(Request $request): int
    {
        echo PHP_EOL."Marek jest fajny";
        return 0;
    }
}