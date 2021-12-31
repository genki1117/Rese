@extends('default.owner_layouts')
@section('title','OwnerHome')
@section('content')
{{ session('flash_message')}}
<div class="admin_home_content">
    <div class="admin_home_content_header">
        <h2>Admin_Home</h2>
    </div>
    <div class="admin_home_content_input">
        <form action="/admin/:shop_id={id}/home/" method="post">
            @csrf
            @error('name')
            <span>{{$message}}</span>
            @enderror
            <table class="admin_table">
                <input type="hidden" name="id" value="{{ $shop->id }}">
                <tr>
                    <th>店舗名</th>
                    <td><input type="text" name="name" class="input" size="40" value="{{ $shop->name }}"></td>
                </tr>
                <tr>
                    <th>コメント</th>
                    <td><textarea name="comment" id="" cols="40" rows="10" value="">{{ $shop->comment }}</textarea></td>
                </tr>
                <!-- <tr>
                    <th>Email</th>
                    <td><input type="email" name="email" class="input" size="40"></td>
                </tr>

                <tr>
                    <th>Password</th>
                    <td><input type="password" name="password" class="input" size="40"></td>
                </tr>
                <tr> -->
                    <th></th>
                    <td>
                        <div class="login_btn">
                        <button>編集</button>
                        </div>
                    </td>
                </tr>
            </table>
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

        *{
            vertical-align:middle;
        }

        .admin_home_content{
            background:#f54275;
            padding:20px 20px;
            color:#fff;
        }

        .admin_home_content_header{
            padding-bottom:30px;
        }

        label.input_label{
            font-size:20px;
        }

        input.input{
            height:28px;
            border:none;
            padding:0 5px;
        }

        textarea{
            border:none;
        }

        .admin_table{
            color:#fff;
        }

        th{
            padding:10px 90px;
            font-size:20px;
        }

        td{
            padding-left:30px;
        }

        select.input{
            border:none;
            height:28px;
        }

        .login_btn button{
            font-size:15px;
            background:#fff;
            border:none;
            padding:3px 20px;
            font-weight:bold;
            margin-top:10px;
        }


</style>