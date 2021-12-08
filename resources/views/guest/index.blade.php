@extends('default.user_layouts')
@section('title','Index')
@section('content')

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

    .index_content{
        text-align:center;
        max-width:1300px;
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