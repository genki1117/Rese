@extends('default.user_layouts')
@section('title','MyPage')
@section('content')
<div class="mypage">
    @if(Auth::check())
    <div class="mypage_name">{{$user->name}}さん</div>
    @endif
    <div class="mypage_content flex-item">
        <div class="reserve_status">
            <h3>予約状況</h3>
            @foreach($reservations as $reservation)
            <div class="reserve_status_cd">
                <i class="far fa-clock cd_icon"></i>
                <form action="/delete" method="post" name="form1">
                    @csrf
                    <input type="hidden" name="id" value="{{ $reservation->id }}">
                    <button type="submit" class="delete_icon"><i class="far fa-times-circle"></i></button>
                </form>
                <div>予約</div>
                <table class="status_table">
                    <form action="/mypage" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$reservation->id}}">
                    <tr>
                        <th>shop</th><td>{{ $reservation->shop->name }}</td>
                    </tr>
                    <tr>
                        <div class="error_message">
                            @error('date')
                            {{ $message }}
                            @enderror
                        </div>
                        <th>date</th>
                        <td>{{$reservation->started_at->format('Y/m/d')}}</td>
                        <td>⇨</td>
                        <td><input type="date" name="date" class="date_change_input"></td>
                    </tr>
                    <tr>
                        <th>time</th><td>{{$reservation->started_at->format('H:i')}}</td>
                        <td>⇨</td>
                        <td><select type="time" name="time" class="time_change_input" id="" >
                        <option value="">選択してください</option>
                        @foreach(config('time') as $key => $score)
                        <option value="{{ $score }}">{{ $score }}</option>
                        @endforeach
                    </select></td>
                    </tr>
                    <tr>
                        <th>number</th><td>{{$reservation->number_of_people}}人</td>
                        <td>⇨</td>
                        <td><select type="num" name="number_of_people" class="number_change_select" id="">
                        <option value="">選択してください</option>
                        @foreach(config('people_of_number') as $key =>$result)
                        <option value="{{ $key }}">{{ $result }}</option>
                        @endforeach
                    </select></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td></td>
                        <td><button class="change_btn">変更</button></td>
                    </tr>
                    </form>
                </table>
            </div>
            @endforeach
        </div>

        <div class="like_shops_status">
            <h3>お気に入り店舗</h3>
            <div class="like_shop_cd_status">
                @foreach($likes as $like)
                <div class="like_shop_cd">
                    <img src="{{$like->shop->img_path}}" alt="仙人">
                    <div class="like_shop_cd_header">{{$like->shop->name}}</div>
                    <div class="like_shop_cd_tag">
                        <span>#{{$like->shop->area->name}}</span>
                        <span>#{{$like->shop->genre->name}}</span>
                    </div>
                    <div class="like_shop_cd_btn flex-item">
                        <form action="/detail/{{$like->shop->id}}" method=get>
                        @csrf
                            <button class="detail_btn">詳しく見る</button>
                        </form>

                        <form action="/like/delete" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $like->id }}">
                            <button class="mypage_like_btn"><i class="far fa-heart"></i></button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>

    .mypage{
        width:100%;
    }

    h3{
        margin:20px 0;
    }
    .mypage_name{
        text-align:right;
        width: 56%;
        margin-bottom: 30px;
        font-weight:bold;
        font-size:20px;
    }
    .mypage_content{
        width:100%;
        display:flex;
        justify-content:space-between;
    }

    .reserve_status{
        margin-right:30px;
        padding:0 30px;
    }

    .reserve_status_cd{
        background:#305dff;
        color:#fff;
        position:relative;
        box-shadow:4px 4px 5px 1px gray;
        margin-bottom:17px;
    }

    .cd_icon{
        font-size:23px;
        position:absolute;
        top:25px;
        left:32px;
    }

    .delete_icon{
        font-size:24px;
        top:25px;
        right:25px;
        color:#fff;
    }

    .reserve_status_cd div{
        font-size:15px;
        position:absolute;
        top:25px;
        left:100px;
    }

    .status_table{
        color:#fff;
        padding:65px 15px 30px 15px;
    }

    .status_table th{
        padding: 5px 10px;
        text-align:left;
        font-weight:normal;
    }

    .status_table td{
        padding-left:15px;
    }

    .like_shops_status{
        margin-right:30px;
        padding:0 30px;
    }

    .like_shop_cd_status{
        display:flex;
        justify-content:space-between;
        flex-wrap:wrap;
    }

    .like_shop_cd{
        width: 280px;
        margin-right:20px;
        margin-bottom:30px;
        background:#fff;
        box-shadow:4px 4px 5px 1px gray;
    }

    .like_shop_cd img{
        width: 100%;
        height: 50%;
    }

    .like_shop_cd_header{
        font-size:18px;
        margin: 20px 18px 5px 18px;
        font-weight:bold;
    }

    .like_shop_cd_tag{
        font-size:12px;
        margin: 0px 18px;
    }

    .detail_btn{
        background:#305DFF;
        border:none;
        margin: 20px 0px 10px 18px;
        color:#fff;
        padding: 5px 15px;
        border-radius:5px;
        cursor:pointer;
    }

    .like_btn{
        margin: 20px 18px 10px 18px;
        font-size:30px;
        cursor:pointer;
    }

    .delete_btn button{
        cursor:pointer;
    }

    .like_shop_cd_btn{
        position:relative;
    }

    .reserve_status_cd button , .mypage_like_btn{
        background-color: transparent;
        border: none;
        cursor: pointer;
        outline: none;
        padding: 0;
        appearance: none;
        position:absolute;
    }

    .mypage_like_btn{
        top:20px;
        right:25px;
    }

    .mypage_like_btn i{
        font-size:35px;
        color:red;
    }

    #search_content{
        display:none;
    }

    input.date_change_input{
        width: 100%;
        height: 20px;
        font-size:5px;
        border:none;
    }

    select.number_change_select.time_change_input{
        width: 100%;
        height: 24px;
        font-size:1px;
        border:none;
    }

    button.change_btn{
        background:#fff;
        padding:1px 15px;
        border-radius:5px;
        margin-left:25%;
    }

@media screen and (max-width: 768px){
    .mypage_content{
        display:block;
    }

    .reserve_status{
        width:100%;
    }
    .like_shop_cd_status{
        
    }

    .like_shops_status{
        width:100%;
    }

    .like_shop_cd{
        width:260px;
    }

    button.change_btn{
        margin-left:18%;
    }

    .mypage_name{
        width:100%;
    }
}
</style>
@endsection
