@extends('default.owner_layouts')
@section('title','Mailcomplete')
@section('content')

<div class="mail_confirm_content">
    <div class="mail_confirm_content_header">
        <h2>Mail_complete</h2>
        <p>メール送信完了</p>
        <a href="{{ route('admin.index')}}">管理画面に戻る</a>
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