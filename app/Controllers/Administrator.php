<?php

namespace App\Controllers;

class Administrator extends BaseController
{
    public function index()
    {
        return view('user/index');
    }
    public function user_list()
    {
        return view('administrator/user_list');
    }
}