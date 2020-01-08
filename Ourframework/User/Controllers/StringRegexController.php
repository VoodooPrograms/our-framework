<?php


namespace Ourframework\User\Controllers;


use Ourframework\Core\Controller;
use Ourframework\Core\Request;

class StringRegexController extends Controller
{
    public function index(Request $request): int
    {
        echo "StringRegexController";
        return 1;
    }
}