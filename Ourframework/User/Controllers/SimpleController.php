<?php


namespace Ourframework\User\Controllers;


use Ourframework\Core\Controller;
use Ourframework\Core\Request;

class SimpleController extends Controller
{

    public function index(Request $request): int
    {
        echo "SimpleController";
        return $this->render("/Templates/strona.php", ["zmienna" => 23]);
    }
}
