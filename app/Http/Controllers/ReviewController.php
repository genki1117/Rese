<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewRequest;


class ReviewController extends Controller
{
    public function bind(Shop $shop)
    {
        $user = Auth::id();
        return view('review' , compact('shop' , 'user'));
    }
    public function create(ReviewRequest $request)
    {
        $form = $request->all();
        $data = [
            'comment' => $request->input('comment'),
            'review_number' => $request->review_number,
            'shop_id' => $request->shop_id,
            'user_id' => $request->user_id
        ];
        Review::create($data);
        return redirect("/");
    }
}
