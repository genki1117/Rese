<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerIndexController extends Controller
{
    public function index()
    {
        return view('owner.index');
    }
}
