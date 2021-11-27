@extends('default.user_layouts')
@section('title','thanks')
@section('content')
<div class="thanks_content">
    <div class="thanks_content_header">
        <div>会員登録ありがとうございます</div>
    </div>
    <div class="login_content_input">
        <div class="login_btn">
            <a href="/login">ログインする</a>
        </div>
    </div>
</div>
@endsection
<style>
        .thanks_content{
        display:inline-block;
        position:absolute;
        top:35%;
        left:50%;
        transform:translate(-50%,-50%);
        -webkit-transform:translate(-50%,-50%);
        -ms-transform:translate(-50%,-50%);
        background-color:#fff;
        border-radius:5px;
        width:400px;
        height:auto;
        box-shadow:4px 4px 5px 1px gray;
        padding:80px 30px;
    }

    .thanks_content_header{
        color:black;
        padding:15px;
        border-radius:5px 5px 0 0;
        text-align:center;
    }

    .thanks_content_header div{
        font-size:22px;
    }

    /* form{
        text-align:center;
    }


    .input{
        border:1px solid;
        border-top:none;
        border-left:none;
        border-right:none;
        margin-top:25px;
        font-size:15px;
        margin-left:10px;
        color:gray;
    }

    .input_label{
        display:block;
        font-size:20px;
        color:gray;
    } */

    .login_btn{
        width:100%;
        margin:20px 0 20px 0;
        text-align:center;
    }

    .login_btn a{
        background:#305dff;
        color:#fff;
        border:none;
        padding:10px 13px;
        border-radius:5px;
    }
</style>
