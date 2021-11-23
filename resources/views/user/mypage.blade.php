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
            <div class="reserve_status_cd">
                <i class="far fa-clock cd_icon"></i>
                <div>予約</div>
                <a href=""><i class="far fa-times-circle delete_icon"></i></a>
                <table class="status_table">
                    <tr>
                        <th>shop</th><td>仙人</td>
                    </tr>
                    <tr>
                        <th>date</th><td>2021-01-01</td>
                    </tr>
                    <tr>
                        <th>time</th><td>17:00</td>
                    </tr>
                    <tr>
                        <th>number</th><td>1人</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="like_shops_status">
            <h3>お気に入り店舗</h3>
            <div class="like_shop_cd_status flex-item">

                <div class="like_shop_cd">
                    <img src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="仙人">
                    <div class="like_shop_cd_header">仙人</div>
                    <div class="like_shop_cd_tag">
                        <span>#東京都</span>
                        <span>#焼肉</span>
                    </div>
                    <div class="like_shop_cd_btn flex-item">
                        <button class="detail_btn">詳しく見る</button>
                        <div class="like_btn"><i class="fas fa-heart"></i></div>
                    </div>
                </div>
                <div class="like_shop_cd">
                    <img src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="仙人">
                    <div class="like_shop_cd_header">仙人</div>
                    <div class="like_shop_cd_tag">
                        <span>#東京都</span>
                        <span>#焼肉</span>
                    </div>
                    <div class="like_shop_cd_btn flex-item">
                        <button class="detail_btn">詳しく見る</button>
                        <div class="like_btn"><i class="fas fa-heart"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>

    .mypage{
        /* margin: 0 11%; */
    }
    .flex-item{
        display:flex;
        justify-content:space-between;
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

    }

    .reserve_status{
        width: 45%;
    }

    .reserve_status_cd{
        width: 75%;
        height: 60%;
        background:#305dff;
        color:#fff;
        position:relative;
        /* margin-right:40px; */
        box-shadow:4px 4px 5px 1px gray;
    }

    .cd_icon{
        font-size:23px;
        position:absolute;
        top:25px;
        left:32px;
    }

    .reserve_status_cd div{
        font-size:15px;
        position:absolute;
        top:25px;
        left:100px;
    }

    .delete_icon{
        position:absolute;
        font-size:20px;
        top:25px;
        right:25px;
        color:#fff;
    }

    .status_table{
        color:#fff;
        padding:65px 15px 20px 15px;
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
        width: 55%;
    }

    .like_shop_cd_status{
    }

    .like_shop_cd{
        /* width: 300px; */
        /* height: 70%; */
        margin-right:30px;
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
        margin: 20px 18px 10px 18px;
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
</style>
