@extends('layouts.shopbar')
<div class="uper">
    @include('flash-message')
</div>
<title>商品資料</title>
<style>
    .uper {
        margin-top: 100px;
        margin-bottom:50px ;
        margin-left: 150px;
        margin-right: 150px;
    }
    .left {
        margin-top: 100px;
        margin-bottom:50px ;
        margin-left: 100px;
        margin-right: 50%;
    }
    .right {

        margin-left: 100px;
        margin-right: 50px;
    }
    .width{
        align-items: center;
    }
</style>

<div class="card uper">
    <form method="POST" role="form" enctype="multipart/form-data">
        @csrf
        @method('POST')
                    <div class="form-group width">
                        <label for="book_id">書籍編號：</label>
                        <input readonly="readonly" id="book_id" name="book_id" class="form-control" value="{{$book->id}}">
                    </div>
                    <div class="form-group width">
                        <label for="seller_id">賣家編號：</label>
                        <input readonly="readonly" id="seller_id" name="seller_id" class="form-control" value="{{$book->member_id}}">
                    </div>
                    <div class="form-group width">
                        <label for="name">書名：</label>
                        <input readonly="readonly" id="name" name="name" class="form-control" value="{{$book->name}}">
                    </div>
                    <div class="form-group width">
                        <label for="quantity">數量：</label>
                        <input id="quantity" name="quantity" class="form-control" value="{{$book->quantity}}">
                    </div>
                    <div class="form-group width">
                        <label for="money">價格：</label>
                        <input readonly="readonly" id="money" name="money" class="form-control" value="{{$book->price}}">
                    </div>
                    <div class="form-group width">
                        <label for="info">書籍介紹：</label>
                        <textarea readonly="readonly" id="info" name="info" class="form-control">{{$book->info}}</textarea>
                    </div>
                    <table><tr><td>
        <div class="col-lg-5 portfolio-item">
            <div class="card h-50">
                <img class="card-img-top" src="/images/{{$book->path}}" alt="">
            </div>
        </div></td></tr><tr><td width="100px"><br>
                    <input name="orders" type="submit" onclick="javascript: form.action='/orders';" value="下單"  class="btn btn-primary btn-sm">
                    <input name="addcart" type="submit" onclick="javascript: form.action='/carts';" value="加入購物車"  class="btn btn-danger btn-sm">
        </td></tr></table></form>
</div>


