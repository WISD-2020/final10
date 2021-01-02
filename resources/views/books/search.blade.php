@include('flash-message')
<!DOCTYPE html>
<html lang="zh-TW">


@extends('layouts.shopbar')
<br><br><br>

<header>
    <title>二手書購物網站</title>
    <style>
    .uper {
    margin-bottom:50px ;
    margin-left: 50px;
    margin-right: 100px;
    }
    </style>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


</header>
    <body><br>
    @if(count($sears)>0)
    <div class="container">
        <div class="row">

            <div class="col-lg-2">

                <div class="list-group">
                    <table style="border:1px solid;" cellpadding="9" border='1'>
                        <tr style="text-align:center;" bgcolor="#CCCCFF">
                            <td style="font-size:19px;">分類</td></tr>
                    @foreach ($cates as $cate)
                        <form method="GET" role="form" enctype="multipart/form-data">
                            @csrf
                            @method('GET')
                            <tr><td>

                            <input name="category" type="submit" onclick="javascript: form.action='/search';" value="{{$cate->category}}" style="font-size:15px;" class="btn btn-block btn-sm" >
                            </td></tr>

                        </form>
                    @endforeach
                    </table>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="row uper" >

                        @foreach ($sears as $sear)

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-60">
                                    <a href="#"><img class="card-img-top" src="images/{{$sear->path}}" width="400px" height="200px" alt=""></a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            {{ $sear->name }}

                                        <h6>商品資訊：{{$sear->info}}</h6>
                                        <h6><a href="/shops/{{ $sear->member_id}}">賣家：{{$sear->member->user->name}}</a></h6></h4>
                                    </div>
                                    <h4><a style="margin-left:190px;">${{ $sear->price }}</a></h4>
                                    <div class="card-footer">
                                        <form action="/books/{{ $sear->id }}" method="POST">
                                        {{ csrf_field() }}
                                        <a class="btn btn-primary btn-sm" href="/books/{{ $sear->id }}" >檢視商品</a>
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



