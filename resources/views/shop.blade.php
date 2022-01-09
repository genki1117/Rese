@extends('default.user_layouts')
@section('title','Index')
@section('content')

<div class="shop_page_content">

    <div class="shop_intro">
        <div class="shop_intro_header">
            <span class="shop_intro_header_icon"><</span>
            <div class="shop_intro_header_title">{{$shop->name}}</div>
        </div>
        <div class="shop_intro_img">
            <img src="{{ asset($shop->img_path) }}" alt="{{$shop->name}}">
        </div>
        <div class="shop_intro_tag">
            <span class="area_tag">#{{optional($shop->area)->name}}</span>
            <span class="genre_tag">#{{optional($shop->genre)->name}}</span>
        </div>
        <div class="shop_intro_comment">{{$shop->comment}}</div>
    </div>

    <div class="resevation_form">
        <div class="resevation_cd">
            <div class="resevation_cd_header">
                <div class="resevation_cd_header_text">予約</div>
            </div>
            <form action="/detail/{shop}" method="post" id="resevation_contents">
                @csrf
                @error('date')
                <div class="date_error_message">{{$message}}</div>
                @enderror
                <div class="reservation_date">
                    <input class="date_input" type="date" name="date" id="inputForm_date" onChange="inputCheckDate(this)">
                </div>
                @error('time')
                <div class="time_error_message">{{$message}}</div>
                @enderror
                <div class="reservation_date_time">
                    <select type="time" name="time" class="time_input" id="inputForm_time" onChange="selectCheckTime(this)">
                        @foreach(config('time') as $key => $score)
                        <option value="{{ $score }}">{{ $score }}</option>
                        @endforeach
                    </select>
                </div>
                @error('number')
                <div class="number_error_message">{{$message}}</div>
                @enderror
                <div class="reservation_date_number_of_people">
                    <select type="text" name="number" class="number_of_people_input" id="inputForm_number" onChange="numberCheckPeople(this)">
                        @foreach(config('people_of_number') as $key =>$result)
                        <option value="{{ $result }}">{{ $result }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                <input type="hidden" name="area_id" value="{{$shop->area_id}}">
                <input type="hidden" name="genre_id" value="{{$shop->genre_id}}">
            <div class="resevation_confirm">
                <table class="resevation_confirm_table">
                    <tr class="resevation_confirm_tr">
                        <th>Shop</th>
                        <td>{{$shop->name}}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td id="check_date"></td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td id="check_time"></td>
                    </tr>
                    <tr>
                        <th>Number</th>
                        <td id="check_number"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="resevation_btn">
            <button>予約する</button>
        </div>
        </form>
    </div>
</div>
<div class="review_content">
    <div class="reviews_content">
        <div class="reviews_content_wrapper">
            <table class="reviews_table">
                <tr>
                    <th class="reviews_th_name">投稿者</th>
                    <th class="reviews_th_rating">評価</th>
                    <th class="reviews_th_comment">コメント</th>
                </tr>
                @foreach($reviews as $review)
                <tr>
                    <td class="reviews_td_name">{{ $review->user->name }}</td>
                    @if($review->review_number === 1)
                    <td class="reviews_td_rating">☆</td>
                    @elseif($review->review_number === 2)
                    <td class="reviews_td_rating">☆☆</td>
                    @elseif($review->review_number === 3)
                    <td class="reviews_td_rating">☆☆☆</td>
                    @elseif($review->review_number === 4)
                    <td class="reviews_td_rating">☆☆☆☆</td>
                    @elseif($review->review_number === 5)
                    <td class="reviews_td_rating">☆☆☆☆☆</td>
                    @endif
                    <td class="reviews_td_comment">{{ $review->comment }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<script>

    function inputCheckDate() {
        const inputValue = document.getElementById( "inputForm_date" ).value;
        document.getElementById( "check_date" ).innerHTML = inputValue;
    }

    function selectCheckTime(){
        const inputValue = document.getElementById( "inputForm_time" ).value;
        document.getElementById( "check_time" ).innerHTML = inputValue;
    }

    function numberCheckPeople(){
        const inputValue = document.getElementById( "inputForm_number" ).value;
        document.getElementById( "check_number" ).innerHTML = inputValue;
    }

</script>

<style>

    .reviews_table{
        border:1px solid;
        width:100%;
    }
    svg.w-5.h-5 {
    width: 30px;
    height: 30px;
    }

    .review_content{
        margin:20px 0px;
    }
    .reviews_content_wrapper{
        padding:20px 30px;
        background:#4D7FFF;
        color:#fff;
        width:100%;
    }

    th.reviews_th_name{
        width: 15%;
        text-align:center;
        padding: 0;
    }

    th.reviews_th_rating{
        width:10%;
        padding: 0;
        text-align:center;
    }

    th.reviews_th_comment,
    td.reviews_td_comment{
        padding: 0 0 0 30px;
        width:75%;
    }

    td.reviews_td_name,
    td.reviews_td_rating{
        text-align:center;
    }

    .date_error_message,
    .time_error_message,
    .number_error_message{
        color:red;
    }

    .shop_page_content{
        display:flex;
        justify-content:space-between;
    }

    .shop_intro{
        width: 45%;
    }

    .shop_intro_img{
        width: 100%;
    }

    .shop_intro_img img{
        width: 100%;
    }

    .shop_intro_header{
        display:flex;
        margin: 10px 0 20px 0;
    }

    .shop_intro_header_icon{
        font-size:20px;
        background:#fff;
        padding:1px 13px;
        border-radius:5px;
        box-shadow:4px 4px 5px 1px gray;
    }

    .shop_intro_header_title{
        font-size:25px;
        font-weight:bold;
        margin-left:10px;
    }

    .shop_intro_tag{
        margin:20px 0;
    }

    .shop_intro_comment{
        font-size:12px;
    }

    .resevation_form{
        width: 45%;
    }

    .resevation_cd{
        padding:40px 30px 30px 30px;
        background:#305dff;
        position:relative;
        margin-top:50px;
        top:-90px;
        border-radius:5px 5px 0 0;
    }

    .resevation_cd_header_text{
        font-size:25px;
        font-weight:bold;
        color:#fff;
        margin-bottom:20px;
    }

    .date_input,.time_input,.number_of_people_input{
        font-size:15px;
        border-radius:5px;
        border:none;
        padding: 5px;
        margin-bottom:15px;
    }

    .time_input,.number_of_people_input{
        width: 100%;
    }

    .resevation_confirm{
        background:#4d7fff;
        color:#fff;
        border-radius:5px;
        padding:20px 15px;
        margin-bottom:10px;
    }

    th{
        font-size:13px;
        text-align:left;
        padding-right:70px;
        padding-bottom:8px;
    }

    td{
        padding-bottom:8px;
    }

    .resevation_btn{
        text-align:center;
        width: 100%;
        background:blue;
        margin-top:-90px;
        border-radius:0 0 5px 5px;
    }

    .resevation_btn button{
        border:none;
        background:inherit;
        color:#fff;
        font-size:18px;
        padding:20px 0;
        width: 100%;
        border-radius:0 0 5px 5px;
        cursor:pointer;
    }
    @media screen and (max-width:768px){
        .shop_page_content{
            display:block;
        }

        .shop_intro{
            width:100%;
        }

        .resevation_form{
            width:100%;
        }

        .resevation_cd{
            top:0;
        }

        .resevation_btn{
            margin-top:0;
            margin-bottom:50px;
        }
    }

</style>



@endsection