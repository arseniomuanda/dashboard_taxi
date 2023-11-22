<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Config extends BaseController
{
    public function index()
    {
        return view('template/header') . view('template/sider') . view('config/main') . view('config/options') . view('template/footer');
    }

    public function utilizador($id = null)
    {
        if(is_null($id)){
            return view('template/header') . view('template/sider') . view('config/user/list') . view('config/options') . view('template/footer');
        }
        return view('template/header') . view('template/sider') . view('config/main') . view('config/options') . view('template/footer');
    }
}
