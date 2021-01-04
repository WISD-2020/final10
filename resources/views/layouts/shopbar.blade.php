
<link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"><!--css樣式-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/shops">二手書購物網站</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <div class="search-container">
                <form action="{{route('books.search')}}">
                    <input type="text" placeholder="搜尋.." name="searchs">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <style>
                    * {box-sizing: border-box;}

                    body {
                        margin: 0;
                        font-family: Arial, Helvetica, sans-serif;
                    }

                    .topnav {
                        overflow: hidden;
                        background-color: #e9e9e9;
                    }

                    .topnav a {
                        float: left;
                        display: block;
                        color: black;
                        text-align: center;
                        padding: 14px 16px;
                        text-decoration: none;
                        font-size: 17px;
                    }

                    .topnav a:hover {
                        background-color: #ddd;
                        color: black;
                    }

                    .topnav a.active {
                        background-color: #2196F3;
                        color: white;
                    }

                    .topnav .search-container {
                        float: right;
                    }

                    .topnav input[type=text] {
                        padding: 6px;
                        margin-top: 8px;
                        font-size: 17px;
                        border: none;
                    }

                    .topnav .search-container button {
                        float: right;
                        padding: 6px 10px;
                        margin-top: 8px;
                        margin-right: 16px;
                        background: #ddd;
                        font-size: 17px;
                        border: none;
                        cursor: pointer;
                    }

                    .topnav .search-container button:hover {
                        background: #ccc;
                    }

                    @media screen and (max-width: 600px) {
                        .topnav .search-container {
                            float: none;
                        }
                        .topnav a, .topnav input[type=text], .topnav .search-container button {
                            float: none;
                            display: block;
                            text-align: left;
                            width: 100%;
                            margin: 0;
                            padding: 14px;
                        }
                        .topnav input[type=text] {
                            border: 1px solid #ccc;
                        }
                    }
                </style>
            </div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">首頁
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost:8000/shops">賣場頁面</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost:8000/carts">購物車</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost:8000/orders">訂單</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">登出</a>
                </li>
            </ul>
        </div>
    </div>
</nav><!--以上是navbar-->
