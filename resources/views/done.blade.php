@extends('default.user_layouts')
@section('title','Done')
@section('content')

<div class="done_content">
    <div class="done_text">
        ご予約ありがとうございます
    </div>
    <div class="back_btn">
        <form action="/" method="get">
            @csrf
            <button>戻る</button>
        </form>
    </div>
</div>
@endsection
<style>
        .done_content{
        text-align:center;
        position:absolute;
        top:50%;
        left:50%;
        transform:translate(-50%,-50%);
        -webkit-transform:translate(-50%,-50%);
        -ms-transform:translate(-50%,-50%);
        background-color:#fff;
        border-radius:5px;
        height:auto;
        box-shadow:4px 4px 5px 1px gray;
    }

    .done_text{
        font-size:20px;
        padding: 100px 70px 40px 70px;
        font-weight:200;
    }

    button{
        font-size:18px;
        padding:5px 11px;
        border:none;
        background:#305dff;
        color:#fff;
        border-radius:5px;
        margin-bottom:100px;
    }
</style>