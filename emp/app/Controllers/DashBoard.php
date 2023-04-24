<?php

namespace App\Controllers;

class DashBoard extends BaseController
{
    public function index()
    {
        return view('dashboard');
    }
}
