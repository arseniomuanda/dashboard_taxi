<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Vehicle extends BaseController
{
    public function index()
    {
        return view('template/header') . view('template/sider') . view('vehicles/main') . view('template/footer');
    }

    public function news()
    {
        return view('template/header') . view('template/sider') . view('vehicles/news') . view('template/footer');
    }

    public function profile($id = null)
    {
        return view('template/header') . view('template/sider') . view('vehicles/profile') . view('template/footer');
    }
}
