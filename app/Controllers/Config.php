<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Config extends BaseController
{
    public function index()
    {
        return view('template/header') . view('template/sider') . view('config/main') . view('config/options') . view('template/footer');
    }

    public function profile($id = null)
    {
        return view('template/header') . view('template/sider') . view('vehicles/profile') . view('template/footer');
    }
}
