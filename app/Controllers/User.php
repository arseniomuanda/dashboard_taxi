<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        //
    }

    public function profile($id = null)
    {
        return view('template/header') . view('template/sider') . view('user/profile') . view('template/footer');
    }
}
