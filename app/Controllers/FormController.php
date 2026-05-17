<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class FormController extends BaseController
{
    public function index()
    {
        return view('secure_form');
    }

    public function submit()
    {
        $raw_input = $this->request->getPost('user_input');

        $user_input = esc($raw_input);

        return view('result', ['user_input' => $user_input]);
    }
}