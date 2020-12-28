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
    <div class="container text-center my-auto">
        <h1 class="mb-1">二手書購物網站</h1><br>
        <h4><b>歡迎回來,{{ Auth::user()->name }}</b></h4>
        <h3 class="mb-5">
        </h3>

        <form class="example" action="{{route('books.search')}}" style="margin:auto;max-width:300px">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <input type="text" placeholder="查詢商品" name="searchs">
            <button type="submit"><i class="fa fa-search"></i></button>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <style>
                body {
                    font-family: Arial;
                }

                * {
                    box-sizing: border-box;
                }

                form.example input[type=text] {
                    padding: 10px;
                    font-size: 17px;
                    border: 1px solid grey;
                    float: left;
                    width: 80%;
                    background: #f1f1f1;
                }

                form.example button {
                    float: left;
                    width: 20%;
                    padding: 10px;
                    background: #2196F3;
                    color: white;
                    font-size: 17px;
                    border: 1px solid grey;
                    border-left: none;
                    cursor: pointer;
                }

                form.example button:hover {
                    background: #0b7dda;
                }

                form.example::after {
                    content: "";
                    clear: both;
                    display: table;
                }
            </style>
        </form><br><br>
        <a class="btn btn-dark btn-lg" href="{{ route('members.show',[ Auth::id()]) }}">查看會員資料</a>
        <a class="btn btn-danger btn-lg" style="margin-left:50px;" href="{{route('logout')}}">登出</a>
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
