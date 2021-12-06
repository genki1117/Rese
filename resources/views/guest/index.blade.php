@extends('default.user_layouts')
@section('title','Index')
@section('content')
<!-- 検索 -->

    <div class="search_content">
        <form action="/" method="post">
            @csrf
            <!-- 検索エリア -->
            <select type="text" name="area_word" id="" class="area_pull search_item">
                @foreach(config('area') as $key => $value)
                <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            <!-- 検索ジャンル -->
            <select type="text" name="genre_word" id="" class="genre_pull search_item">
                @foreach(config('genre') as $key => $value)
                <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            <!-- 検索名前 -->
            <span class="search_icon"><i class="fas fa-search"></i></span><input type="text" name="name_word" class="search_text_box" >
        </form>
    </div>
    


<div class="index_content flex-item">
    @foreach($shops as $shop)
    <div class="like_shop_cd">
        <div class="like_shop_cd_content">
            <img src="{{$shop->img_path}}" alt="{{$shop->name}}">
            <div class="like_shop_cd_header">{{$shop->name}}</div>
            <div class="like_shop_cd_tag">
                <span>#{{ $shop->area->name }}</span>
                <span>#{{ $shop->genre->name }}</span>

            </div>
            <div class="like_shop_cd_btn flex-item">
                <form action="/detail/:shop_id/{{$shop->id}}" method="get">
                    @csrf
                    <button class="detail_btn">詳しく見る</button>
                </form>

                <span>
                    @if($likes->whereIn('shop_id' , $shop->id)->isEmpty())
                    <!-- いいね -->
                    <a href="{{route('like',$shop)}}" class="btn-successfully">
                        <i class="far fa-heart like_btn"></i>
                    </a>
                    @else
                    <!-- いいね解除 -->
                    <a href="{{ route('unlike',$shop)}}" class="btn-secondary">
                        <i class="far fa-heart like_btn"></i>
                    </a>
                    @endif
                </span>

            </div>
        </div>
    </div>
    @endforeach
</div>

<style>


    .btn-secondary{
        color:red;
    }

    .btn-successfully{
        color:black;
    }
    .search_content{
        display: inline-block;
        width: 47%;
        background:#fff;
        padding:5px;
        box-shadow:4px 4px 5px 1px gray;
        position:relative;
        left:52%;
        top:-45px;
        border-radius:5px;
    }

    .search_item{
        width: 15%;
        border-top:none;
        border-left:none;
        border-right:2px solid lightgray;
        border-bottom:none;
        color:gray;
        font-size:15px;
        padding:10px 40px 10px 0px;
    }

    .search_text_box{
        width: 65%;
        height:100%;
        font-size:20px;
        color:gray;
        border:none;
    }

    .search_icon{
        font-size:15px;
        margin-right:2px;
        color:gray;
    }

    .index_content{
        width: 100%;
        margin-top:-30px;
    }

    .flex-item{
        display:flex;
        flex-wrap:wrap;
        justify-content:space-between;
        align-items:center;
    }

    .like_shops_status{
        width: 55%;
    }

    .like_shop_cd_status{
    }

    .like_shop_cd{
        width:300px;
        background:#fff;
        box-shadow:4px 4px 5px 1px gray;
        margin-top:50px;
        margin-bottom:-20px;
        border-radius:5px;
    }

    .like_shop_cd img{
        width: 100%;
        height: 50%;
        border-radius:5px 5px 0 0;
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
        margin: 10px 0px 10px 18px;
        color:#fff;
        padding: 5px 15px;
        border-radius:5px;
        cursor:pointer;
    }

    .like_btn{
        margin: 10px 18px 10px 18px;
        font-size:30px;
        cursor:pointer;
    }
</style>
@endsection