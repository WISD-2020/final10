@include('flash-message')<!--flash-message訊息置入-->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>賣場頁面</title>
    <style>
        .uper {
            margin-top: 100px;
            margin-bottom:50px ;
            margin-left: 100px;
            margin-right: 100px;
        }
    </style>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/shop-homepage.css')}}" rel="stylesheet">

</head>

<body>

@extends('layouts.shopbar')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">
            <h1 class="my-4">{{ Auth::user()->name }}的賣場</h1>

            <br><a href="/books/create" style="margin-right:200px;">上架</a>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <div class="row uper" >
                @foreach ($books as $book)

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top" src="images/{{$book->path}}" width="400px" height="200px" alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="/books/{{ $book->id }}">{{ $book->name }}</a>
                                </h4>
                                <h5>{{ $book->price }}</h5>
                                <p class="card-text">{{$book->info}}</p>
                            </div>
                            <div class="card-footer">
                                <form action="/books/{{ $book->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a class="btn btn-primary btn-sm" href="/books/{{$book->id}}/edit" style="margin-right:100px;">編輯</a>
                                    <button class="btn btn-danger btn-sm">刪除</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->



<!-- Bootstrap core JavaScript -->
<script src="{{ asset('jquery/jquery.min.js')}}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
