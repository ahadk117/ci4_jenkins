<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function checkTesting()
    {
        return view('check_test_page');
    }
}
