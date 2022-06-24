<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User_editController extends Controller
{
    public function index()
    {
        return view('user_edit');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
