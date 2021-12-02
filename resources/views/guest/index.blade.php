@extends('default.guest_layouts')
@section('title','Index')
@section('content')
<!-- 検索 -->

    <div class="search_content">
        <form action="" method="post">
            @csrf
            <!-- 検索エリア -->
            <select name="" id="" class="area_pull search_item">
                <option value="">test1</option>
            </select>

            <!-- 検索ジャンル -->
            <select name="" id="" class="genre_pull search_item">
                <option value="">test</option>
            </select>

            <!-- 検索名前 -->
            <span class="search_icon"><i class="fas fa-search"></i></span><input type="text" name="" class="search_text_box" value="search...">
        </form>
    </div>
    


<div class="index_content flex-item">
    @foreach($shops as $shop)
    <div class="like_shop_cd">
        <img src="{{$shop->img_path}}" alt="{{$shop->name}}">
        <div class="like_shop_cd_header">{{$shop->name}}</div>
        <div class="like_shop_cd_tag">
            <span>#{{optional($shop->area)->name}}</span>
            <span>#{{optional($shop->genre)->name}}</span>
        </div>
        <div class="like_shop_cd_btn flex-item">
            <form action="/detail/:shop_id/{{$shop->id}}" method="get">
                @csrf
                <button class="detail_btn">詳しく見る</button>
            </form>
            <div>
                @if($likes !== null)
                <!-- いいね解除 -->
                    <a href="{{ route('unlike',$shop)}}" class="btn-success">
                        <div class="like_btn"><i class="far fa-heart btn-secondary"></i></div>
                    </a>
                @else
                <!-- いいね -->
                <a href="{{route('like',$shop)}}" class="btn-secondary">
                    <div class="like_btn"><i class="far fa-heart btn-successfully"></i></div>
                </a>
                @endif
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