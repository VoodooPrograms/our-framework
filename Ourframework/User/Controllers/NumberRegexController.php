<?php


namespace Ourframework\User\Controllers;


use Ourframework\Core\Controller;
use Ourframework\Core\Request;

class NumberRegexController extends Controller
{
    public function index(Request $request): int
    {
        echo "NumberRegexController";
        return 1;
    }
}