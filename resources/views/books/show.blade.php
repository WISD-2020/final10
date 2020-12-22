@extends('layouts.shopbar')
<div class="uper">
    @include('flash-message')
</div>
<title>商品資料</title>
<style>
    .uper {
        margin-top: 100px;
        margin-bottom:50px ;
        margin-left: 100px;
        margin-right: 100px;
    }
</style>
<div class="card uper">
    <form action="/orders" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="book_id">書籍編號：</label>
            <input readonly="readonly" id="book_id" name="book_id" class="form-control" value="{{$book->id}}">
        </div>
        <div class="form-group">
            <label for="seller_id">賣家編號：</label>
            <input readonly="readonly" id="seller_id" name="seller_id" class="form-control" value="{{$book->member_id}}">
        </div>
        <div class="form-group">
            <label for="name">書名：</label>
            <input readonly="readonly" id="name" name="name" class="form-control" value="{{$book->name}}">
        </div>
        <div class="form-group">
            <label for="quantity">數量：</label>
            <input readonly="readonly" id="quantity" name="quantity" class="form-control" value="{{$book->quantity}}">
        </div>
        <div class="form-group">
            <label for="money">價格：</label>
            <input readonly="readonly" id="money" name="money" class="form-control" value="{{$book->price}}">
        </div>
        <div class="form-group">
            <label for="info">書籍介紹：</label>
            <textarea readonly="readonly" id="info" name="info" class="form-control">{{$book->info}}</textarea>
        </div>
        <button type="submit" class="btn-sm btn-primary">下單</button>
    </form>
</div>
