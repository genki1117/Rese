<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>@yield('title')</title>
</head>
    <body>
        <div class="main_content">

            <div class="header_content">
                <!-- --↓ハンバーガメニュー↓-- -->
                <div class="h-menu">
                    <nav class="nav" id="nav">
                        <ul>
                            <!-- --↓メニュー中身↓-- -->
                            <li><a href="/">Home</a></li>
                            <li><a href="/register">Registration</a></li>
                            <li><a href="/login">Login</a></li>
                        </ul>
                    </nav>
                    <div class="menu" id="menu">
                        <span class="menu__line--top"></span>
                        <span class="menu__line--middle"></span>
                        <span class="menu__line--bottom"></span>
                    </div>
                </div>
                <div class="logo">
                    <h2>Rest</h2>
                </div>
            </div>
            @yield('content')
        </div>
        <script>
            // --↓ハンバーガーメニュー↓--
            const target = document.getElementById("menu");
                target.addEventListener('click', () => {
            target.classList.toggle('open');
            const nav = document.getElementById("nav");
                nav.classList.toggle('in');
            });
        </script>
    </body>
    <style>
        html,body{
            height: 100%;
            background-color:#eeeeee;
        }

        *{
            margin:0;
            padding:0;
        }

        .flex-item{
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .header_content{
        }

        .h-menu{
            width: 50%;;

        }

        .main_content{
            max-width:300px;
            padding: 30px 100px;
        }

    /* --↓ハンバーガメニュー↓-- */

        a{
            text-decoration: none;
            color: #305dff;
        }

        .logout_btn{
            border:none;
            margin: 0 auto;
            background:#fff;
            color: #305dff;
            cursor:pointer;
        }

        .nav{
            position: absolute;
            height: 100vh;
            width: 100%;
            top:-1px;
            left: -100%;
            background: #fff;
            transition: .7s;
            text-align: center;
            z-index:5;
        }

        .nav ul{
            padding-top: 200px;
        }

        .nav ul li,.logout_btn{
            display:block;
            list-style-type: none;
            margin-top: 20px;
            font-size:30px;
            font-weight:bold;
        }

        .menu {
            display: inline-block;
            width: 45px;
            height: 43px;
            cursor: pointer;
            position: relative;
            background-color:#305dff;
            border-radius:7px;
            box-shadow:4px 4px 5px 1px gray;
            z-index:10;
        }

        .menu__line--top,
        .menu__line--middle,
        .menu__line--bottom {
            display: inline-block;
            width: 100%;
            height: 1px;
            left:11px;
            background-color: lightgray;
            position: absolute;
            transition: 0.5s;
        }

        .menu__line--top {
            top: 11px;
            width:30%;
        }


        .menu__line--middle {
            top: 21px;
            width:50%
        }

        .menu__line--bottom {
            bottom: 11px;
            width:20%;
        }

        .menu.open span:nth-of-type(1) {
            top: 21px;
            left:9px;
            width:60%;
            transform: rotate(45deg);
        }

        .menu.open span:nth-of-type(2) {
            opacity: 0;
        }

        .menu.open span:nth-of-type(3) {
            top: 21px;
            left:9px;
            width:60%;
            transform: rotate(-45deg);
        }

        .in{
            transform: translateX(100%);
        }

        .logo{
            position:absolute;
            top:30px;
            left:15%;
        }

        .logo h2{
            display:inline-block;
            font-size:30px;
            color:#305dff;
            font-weight:900;
        }
    </style>
</html>