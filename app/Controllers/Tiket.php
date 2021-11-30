<?php

namespace App\Controllers;

use App\Models\MTiket;

class Tiket extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('tiket', $data);
    }
}