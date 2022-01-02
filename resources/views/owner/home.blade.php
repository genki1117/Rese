@extends('default.owner_layouts')
@section('title','OwnerHome')
@section('content')
<div class="admin_register_content">
    <div class="admin_register_content_header">
                <h2>Admin_register</h2>
            </div>
            <div class="admin_register_content_input">
                <form action="/owner/home" method="post">
                    @csrf
                    @error('shop_id')
                    <div class="error_message">{{$message}}</div>
                    @enderror
                    @error('name')
                    <div class="error_message">{{$message}}</div>
                    @enderror
                    @error('email')
                    <div class="error_message">{{$message}}</div>
                    @enderror
                    @error('password')
                    <div class="error_message">{{$message}}</div>
                    @enderror
                    <table>
                        <tr>
                            <th>店舗名</th>
                            <td><select name="shop_id" id="" class="input">
                            <option value="">選択してください</option>
                            @foreach($shops  as $shop)
                            <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                            @endforeach
                        </select></td>
                        </tr>
                        <tr>
                            <th>登録者名</th>
                            <td><input type="text" name="name" class="input" size="40"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><input type="email" name="email" class="input" size="40"></td>
                        </tr>

                        <tr>
                            <th>Password</th>
                            <td><input type="password" name="password" class="input" size="40"></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <div class="admin_register_btn">
                                <button>登録</button>
                                </div>
                            </td>
                            <td>
                                <div class="owner_logout_btn">
                                <button formaction="/owner/logout" formmethod="post">ログアウト</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
    </div>
</div>
@endsection
<style>
        .error_message{
            color:red;
        }
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

        .admin_register_content{
            background:#918f8e;
            padding:20px 20px;
        }

        .admin_register_content_header{
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

        .admin_register_btn button,
        .owner_logout_btn button{
            font-size:15px;
            background:#fff;
            border:none;
            padding:3px 20px;
            font-weight:bold;
            margin-top:10px;
        }


</style>