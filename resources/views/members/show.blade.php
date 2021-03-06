<!DOCTYPE html>
<html lang="zh-TW">

<head>

    <meta charset="utf-8">


    <title>二手書購物網站</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('fonts/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="{{asset('fonts/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/stylish-portfolio.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

<!-- Navigation -->
<a class="menu-toggle rounded" href="#">
    <i class="fas fa-bars"></i>
</a>
<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="/mhome">二手書購物網站</a>
        </li>
        <li class="sidebar-nav-item">
            <a href="/mhome">回首頁</a>
        </li>
        <li class="sidebar-nav-item">
            <a href="/shops">賣場頁面</a>
        </li>
        <li class="sidebar-nav-item">
            <a href="#"></a>
        </li>
        <li class="sidebar-nav-item">
            <a href="#"></a>
        </li>
        <li class="sidebar-nav-item">
            <a href="#"></a>
        </li>
    </ul>
</nav>

<!-- Header -->
<header class="masthead d-flex">
    <div class="container text-center"  style="text-align:center;">
        <h3 class="mb-1">會員資料</h3><hr noshade>

        <form action="{{route('members.show',[ Auth::id()])}}" method="post">
            <div class="field" align="center">
                <table width="350" height="80" style='position:relative;left:50px;'>
                    　<tr><td align="center">

                        <p align="left";valign="center">
                        <span style="font-size:22px;">
                        <label for="">會員名稱：</label>
                        {{$name}}<br>
                        <label for="">性別：</label>
                        {{$sex}}<br>
                        <label for="">email：</label>
                        {{$email}}<br>
                        <label for="">地址：</label>
                        {{$address}}<br>
                        <label for="">電話：</label>
                        {{$tel}}<br>
                    </span></p></td></tr></table>
            </div>

        </form><br><br>

        <a class="btn btn-success btn-lg" href="{{route('mhome')}}">返回</a>
    </div>
    <div class="overlay"></div>
</header>



<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('jquery/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Plugin JavaScript -->
<script src="{{ asset('jquery/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for this template -->
<script src="js/stylish-portfolio.min.js"></script>

</body>

</html>
