<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditController extends Controller
{
    public function index()
    {
        return view('edit');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
