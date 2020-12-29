@include('flash-message')
<!DOCTYPE html>
<html lang="zh-TW">


@extends('layouts.shopbar')
<br><br><br>
<div class="container">
<header>
    <title>二手書購物網站</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/shop-homepage.css')}}" rel="stylesheet">

</header>
    <body><br>
    @if(count($sears)>0)
    <div class="container">
        <div class="row">

            <div class="col-lg-12" >
                <div class="row uper" >

                        @foreach ($sears as $sear)

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                    <a href="#"><img class="card-img-top" src="images/{{$sear->path}}" width="400px" height="200px" alt=""></a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="/books/{{ $sear->id }}">{{ $sear->name }}</a>
                                        </h4>
                                        <h5>{{ $sear->price }}</h5>
                                        <p class="card-text">{{$sear->info}}</p>
                                    </div>
                                    <div class="card-footer" align="left">
                                        <form action="/books/{{ $sear->id }}" method="POST">
                                            {{ csrf_field() }}
                                            <a class="btn btn-primary btn-sm" href="/books/{{ $sear->id }}" style="margin-right:100px;">檢視商品</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- /.row -->
    </div>
    @endif
    <!-- /.container -->


<!-- Bootstrap core JavaScript -->
<script src="{{ asset('jquery/jquery.min.js')}}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>



