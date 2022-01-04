<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImgUploadController extends Controller
{
    public function index()
    {
        return view('imgUpload');
    }

    public function store(Request $request)
    {
        dd($request->imgfile);
        $document = $request->document;
        
        $document->store('public');
    }
}
