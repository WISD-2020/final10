@extends('layouts.shopbar')
<div class="uper">
    @include('flash-message')
</div>
<title>商店頁面</title>
<style>
    .uper {
        margin-top: 100px;
        margin-bottom:50px ;
        margin-left: 100px;
        margin-right: 100px;
    }
</style>
@if (count($books) > 0)
    <div class="card uper" style="align-content: center">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 商品
            </li>
        </ol>

        <div class="container">

            <div class="row">

                <div class="col-lg-2">



                </div>
                <!-- /.col-lg-3 -->

                <div class="col-lg-9">
                    <div class="row">

                        @foreach ($books as $book)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                    <img class="card-img-top" src="/images/{{$book->path}}" alt="">
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="/books/{{ $book->id }}">{{ $book->name }}</a>
                                        </h4>
                                        <h5>價格：${{ $book->price }}</h5>
                                        <p class="card-text">介紹：{{$book->info}}</p>
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
    </div>
@endif
