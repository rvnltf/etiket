<?php

namespace App\Controllers;

class NotFound extends BaseController
{
    public function index()
    {
        return view('404');
    }
}