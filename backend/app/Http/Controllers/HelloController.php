<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        return view('todo1');
    }

    public function memo()
    {
        return view('memo2');
    }
}
