<?php

namespace App\Controllers;

class Administrator extends BaseController
{
    public function index()
    {
        return view('user/index');
    }
}