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
        // $shop_img = $request->shop_Img;
        // Storage::disk('public')->put('shop_img', $shop_img);
        // return '投稿完了';
        // dd($request->file('shop_Img'));

        $file_name = $request->file('shop_Img')->getClientOriginalName();
        $request->file('shop_Img')->storeAs('public', $file_name);
    }
}
