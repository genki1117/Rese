@extends('default.user_layouts')
@section('title','Index')
@section('content')

<div class="review_content">
    <div class="review_content_wrapper">
        <div class="review_header">
        </div>
        <form action="/review/:shop_id/{shop}" method="post">
            {{ Form::open(['url' => '/review/:shop_id/{shop}' , 'method' => 'podt' , 'files' => 'false'])}}
            {{ Form::token()}}
            <div class="review_shop_name_label">
                <label for="">店名</label><span class="review_shop_name">{{ $shop->name }}</span>
            </div>
            <div class="rating">
                @error('review_number')
                <div class="review_number_error_message">{{$message}}</div>
                @enderror
                {{ Form::label('' , '評価')}}
                {{ Form::select('review_number' , [ '1' => '★' , '2' => '★★' , '3' => '★★★' , '4' => '★★★★' , '5' => '★★★★★'] , null , ['class' => 'review_rating' , 'placeholder' => '選択してください'])}}
            </div>
            <div class="comment">
                @error('comment')
                <div class="comment_error_message">{{$message}}</div>
                @enderror
                {{ Form::label('' , 'コメント')}}
                {{ Form::textarea('comment' , null , ['class' => 'review_comment' , 'row' => '5'])}}
            </div>
            <input type="hidden" value="{{ $shop->id }}" name="shop_id">
            <input type="hidden" value="{{ $user }}" name="user_id">
            <button>送信</button>
            {{ Form::close()}}
        </form>
    </div>
</div>


<style>
    .review_shop_name{
        color:#fff;
        font-weight:bold;
        font-size:13px;
    }
    .review_content{
        width:100%;
        margin-top:50px;
    }

    .review_content_wrapper{
        width:100%;
        background:#305DFF;
    }

    .rating,
    .review_shop_name_label{
        padding:20px 20px 0px 20px;
    }

    label{
        color:#fff;
        font-size:13px;
        font-weight:bold;
    }

    .rating label,
    .review_shop_name_label label{
        margin-right:27px
    }

    .rating .review_rating{
        border:none;
        border-radius:5px;
    }

    .comment{
        padding:10px 20px 0px 20px;
    }

    textarea.review_comment{
        width:100%;
        border:none;
        border-radius:5px;
    }

    .review_content_wrapper button{
        border:none;
        background:#0000ff;
        color:#fff;
        font-size:18px;
        padding:8px 0;
        width:100%;
        border-radius:0 0 5px 5px;
        cursor:pointer;
        margin-top:10px;
    }

    .review_number_error_message,
    .comment_error_message{
        color:red;
        font-weight:bold;
    }

</style>

@endsection