<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function store()
    {
        return view('guest.index');
    }
}
