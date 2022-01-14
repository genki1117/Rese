<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImgUploadController extends Controller
{
    // public function index()
    // {
    //     return view('imgUpload');
    // }

    /**
     * 画像更新
     */
    public function store(Request $request)
    {
        $file_name = $request->file('shop_Img')->getClientOriginalName();
        $request->file('shop_Img')->storeAs('public', $file_name);
    }
}
