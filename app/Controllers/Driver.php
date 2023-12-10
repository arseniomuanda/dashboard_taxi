<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Driver extends BaseController
{
    public function index($show = null)
    {
        $data = ['show' => $show];
        return view('template/header') . view('template/sider') . view('drivers/main', $data) . view('template/footer');
    }

    public function news()
    {
        return view('template/header') . view('template/sider') . view('drivers/news') . view('template/footer');
    }

    public function profile($id = null)
    {
        $data = [
            'id' => $id
        ];
        return view('template/header') . view('template/sider') . view('drivers/profile', $data) . view('template/footer');
    }
}
