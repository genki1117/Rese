@extends('default.owner_layouts')
@section('title','OwnerHome')
@section('content')
{{ session('flash_message')}}
<div class="admin_home_content">
    <div class="admin_home_content_header">
        <h2>Admin_Home</h2>
    </div>
    <div class="admin_home_content_input">
        <form action="/admin/{id}/home/" method="post">
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
                <tr>
                    <th></th>
                    <td>
                        <div class="edit_btn">
                        <button>編集</button>
                        </div>
                    </td>
                    <td>
                        <div class="admin_logout_btn">
                        <button formaction="/admin/logout" formmethod="post">ログアウト</button>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<div class="reservation_status">
    <table class="admin_reservation_table">
        <tr>
            <th class="admin_reservation_th">予約名</th>
            <th class="admin_reservation_th">予約日時</th>
            <th class="admin_reservation_th">予約人数</th>
            <th class="admin_reservation_th"></th>
        </tr>
        @foreach($reservations as $reservation)
        <tr>
            <td class="admin_reservation_td">{{ $reservation->user->name }}</td>
            <td class="admin_reservation_td">{{ $reservation->started_at }}</td>
            <td class="admin_reservation_td">{{ $reservation->number_of_people }}</td>
            <td class="admin_reservation_td">
                <button>削除</button>
            </td>
        </tr>
        @endforeach
    </table>
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

        .edit_btn button,
        .admin_logout_btn button{
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