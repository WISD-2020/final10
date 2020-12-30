@extends('layouts.shopbar')
<div class="uper">
    @include('flash-message')
</div>
<title>商品資料</title>
<style>
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
<div class="row left">
    <div class="col-lg-6 portfolio-item">
        <div class="card h-100">
            <div class="card-body">
                <form action="/orders" method="POST" role="form" enctype="multipart/form-data" class="right" >
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
                    <button type="submit" class="btn-sm btn-primary">下單</button>

                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3 portfolio-item">
        <div class="card h-50">
            <img class="card-img-top" src="/images/{{$book->path}}" alt="">
        </div>
    </div>
</div>
