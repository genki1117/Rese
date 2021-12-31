@extends('default.owner_layouts')
@section('title','AdminLogin')
@section('content')
<div class="admin_login_content">
    <div class="admin_login_content_header">
                <h2>AdminLogin</h2>
            </div>
            <div class="admin_login_content_input">
                <form action="/admin/login" method="post">
                    @csrf
                    <label class="input_label"><i class="fas fa-store"></i>
                        <select name="shop_id" id="" class="input">
                            <option value="">選択してください</option>
                            @foreach($shops as $shop)
                            <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                            @endforeach
                        </select>
                    </label>
                    @error('email')
                    <div class="email_error_message">{{$message}}</div>
                    @enderror
                    <label class="input_label"><i class="fas fa-envelope"></i><input type="email" name="email" class="input" placeholder="Email" size="25"></label>
                    @error('password')
                    <div class="password_error_message">{{$message}}</div>
                    @enderror
                    <label class="input_label"><i class="fas fa-lock"></i><input type="password" name="password" class="input" placeholder="Password" size="25"></label>
                    <div class="login_btn">
                        <button>ログイン</button>
                    </div>
                </form>
    </div>
</div>
@endsection
<style>
    #h-menu{
        display:none;
    }

    #nav{
        display:none;
    }
    .logo{
        display:none;
    }
        .email_error_message,
        .password_error_message{
            color:red;
            margin-top:15px;
            margin-bottom:-15px;
        }
        .admin_login_content{
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

    .admin_login_content_header{
        background-color:#f54275;
        color:#fff;
        padding:15px;
        border-radius:5px 5px 0 0;

    }

    form{
        text-align:center;
    }

    .admin_login_content_header h2{
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
        background:#f54275;
        color:#fff;
        border:none;
        padding:5px 13px;
        border-radius:5px;
        margin-left:58%;
    }

    select.input{
        width:60%;
        margin-left:1px;
    }
</style>