<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImgUploadController extends Controller
{
    public function index()
    {
        return view('imgUpload');
    }

    public function store(Request $request)
    {
        $shop_img = $request->shopimg;
        Storage::disk('local')->put('shop_img', $shop_img);
        return '投稿完了';
    }
}
