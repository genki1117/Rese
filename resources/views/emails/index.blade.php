@extends('default.owner_layouts')
@section('title','MailContact')
@section('content')

<div class="mail_contact_content">
    <div class="mail_contact_content_header">
        <h2>Mail_Contact</h2>
    </div>
    <div class="mail_contacct_content_input">
        <form action="/admin/{id}/mailcontact/confirm" method="post">
            @csrf
            @error('title')
            <div>{{$message}}</div>
            @enderror
            @error('message')
            <div>{{$message}}</div>
            @enderror
            <table class="mail_contact_table">
                <input type="hidden" name="shop_id" value="{{ $admin->id }}">
                <tr>
                    <th>タイトル</th>
                    <td>
                        <input type="text" name="title" class="input" size="80" value="">
                    </td>
                </tr>
                <tr>
                    <th>本文</th>
                    <td>
                        <textarea name="message" id="" cols="80" rows="10" value=""></textarea>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <div class="confirm_btn">
                        <button>確認</button>
                        </div>
                    </td>
                    <td>
                        <div class="admin_back_btn">
                            <button formaction="/admin/{id}/home/" formmethod="get">戻る</button>
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

        .mail_contact_content{
            background:#f54275;
            padding:20px 20px;
            color:#fff;
        }

        .mail_contact_content_header{
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

        .mail_contact_table{
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

        .confirm_btn button,
        .admin_back_btn button{
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