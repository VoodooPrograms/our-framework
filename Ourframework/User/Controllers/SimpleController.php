<?php


namespace Ourframework\User\Controllers;


use Ourframework\Core\Controller;
use Ourframework\Core\Request;

class SimpleController extends Controller
{

    public function index(Request $request): int
    {
        echo "SimpleController";
        $a1='a2';
        return $this->render('User/Templates/test3.php', ['apple'=>'apple2','a1'=>'$a1',
            "tablica"=> ["Aleks1" => "Ola1", "Aleks2" => "Ola2"]]);
    }
}