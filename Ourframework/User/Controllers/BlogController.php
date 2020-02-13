<?php


namespace Ourframework\User\Controllers;


use Ourframework\Core\Controller;
use Ourframework\Core\Request;

class BlogController extends Controller
{

    public function index(Request $request): int
    {
        echo "BlogController";

        $a1='a2';
        return $this->render('User/Templates/test4.php', ['apple_key' => "apple_value", 'a1_key' => '$a1_value',
            "tablica" => ["Aleks1_key" => "Ola1_value", "Aleks2_key" => "Ola2_value"]]);
    }
}