@extends('default.owner_layouts')
@section('title','MailConfirm')
@section('content')

<div class="mail_confirm_content">
    <div class="mail_confirm_content_header">
        <h2>Mail_confirm</h2>
    </div>
    <div class="mail_confirm_content_input">
        <form action="/admin/{id}/mailcontact/send" method="post">
            @csrf
            @error('name')
            <span>{{$message}}</span>
            @enderror
            <table class="mail_confirm_table">
                <input type="text" name="shop_id" value="{{ $inputs['shop_id'] }}">
                <tr>
                    <th>タイトル</th>
                    <td>{{ $inputs['title']}}</td>
                    <input type="hidden" name="title" value="{{ $inputs['title'] }}">
                </tr>
                <tr>
                    <th>本文</th>
                    <td>{{ $inputs['message'] }}</td>
                    <input type="hidden" name="message" value="{{ $inputs['message'] }}">
                </tr>
                <!-- <tr>
                    <th>画像</th>
                    <td><input type="file" name="shop_Img" class="input" size="40" value="" ></td>
                </tr> -->
                <tr>
                    <th></th>
                    <td>
                        <div class="confirm_back_btn">
                        <button name="action" type="submit" value="return">確認画面に戻る</button>
                        </div>
                    </td>

                    <td>
                        <div class="send_btn">
                        <button name="action" type="submit" value="submit">送信</button>
                        </div>
                    </td>
                    <!-- <td>
                        <div class="admin_logout_btn">
                        <button formaction="/admin/logout" formmethod="post">ログアウト</button>
                        </div>
                    </td> -->
                </tr>
            </table>
        </form>
        <!-- <form action="/admin/{id}/mailcontact" method="get">
            <button>メール作成</button>
        </form> -->
    </div>
</div>
<!-- <div class="reservation_status">
    <table class="admin_reservation_table">
        <tr>
            <th class="admin_reservation_th">予約名</th>
            <th class="admin_reservation_th">予約日時</th>
            <th class="admin_reservation_th">予約人数</th>
            <th class="admin_reservation_th"></th>
        </tr>
    </table>
</div> -->
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

        .mail_confirm_content{
            background:#f54275;
            padding:20px 20px;
            color:#fff;
        }

        .mail_confirm_content_header{
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

        .mail_confirm_table{
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

        .confirm_back_btn button,
        .send_btn button{
            font-size:15px;
            background:#fff;
            border:none;
            padding:3px 20px;
            font-weight:bold;
            margin-top:10px;
        }

        table.admin_reservation_table{
            width:100%;
            margin-top:50px;
            border-top:2px solid black;
            border-bottom:2px solid black;
        }

        .admin_reservation_th{
            font-size:13px;
            text-align:left;
            border-bottom:1px solid black;
            padding:10px 5px;
        }

        .admin_reservation_td{
            border-bottom:1px solid black;
            padding:10px 5px;
        }

        table {
            border-collapse: collapse;
        }


</style>