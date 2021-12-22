@extends('default.guest_layouts')
@section('title','Registration')
@section('content')
<div class="login_content">
    <div class="login_content_header">
                <h2>Registration</h2>
            </div>
            <div class="login_content_input">
                <form action="/register" method="post">
                    @csrf
                    @error('name')
                    <span>{{$message}}</span>
                    @enderror
                    <label class="input_label"><i class="fas fa-user"></i><input type="text" name="name" class="input" placeholder="Username" size="25"></label>
                    <label class="input_label"><i class="fas fa-envelope"></i><input type="email" name="email" class="input" placeholder="Email" size="25"></label>
                    <label class="input_label"><i class="fas fa-lock"></i><input type="password" name="password" class="input" placeholder="Password" size="25"></label>
                    <div class="login_btn">
                        <button>登録</button>
                    </div>
                </form>
    </div>
</div>
@endsection
<style>
        .login_content{
        display:inline-block;
        position:absolute;
        top:50%;
        left:50%;
        transform:translate(-50%,-50%);
        -webkit-transform:translate(-50%,-50%);
        -ms-transform:translate(-50%,-50%);
        background-color:#fff;
        border-radius:5px;
        width:350px;
        height:auto;
        box-shadow:4px 4px 5px 1px gray;
    }

    .login_content_header{
        background-color:#305dff;
        color:#fff;
        padding:15px;
        border-radius:5px 5px 0 0;

    }

    form{
        text-align:center;
    }

    .login_content_header h2{
        font-size:15px;
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
    }

    .login_btn{
        width:100%;
        margin:20px 0 20px 0;
    }

    .login_btn button{
        background:#305dff;
        color:#fff;
        border:none;
        padding:5px 13px;
        border-radius:5px;
        margin-left:58%;
    }
</style>