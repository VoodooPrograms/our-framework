<?php


namespace Ourframework\User\Controllers;


use Ourframework\Core\Controller;
use Ourframework\Core\Request;

class BlogController extends Controller
{

    public function index(Request $request): int
    {
        echo "BlogController";
        return 1;
    }
}