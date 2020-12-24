@extends('layouts.shopbar')
@include('flash-message')
<title>上架書籍</title>
<style>
    .uper {
        margin-top: 100px;
        margin-bottom:50px ;
        margin-left: 100px;
        margin-right: 100px;
    }
</style>
<!-- Page Heading -->
<div class="card uper">

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 上架書籍
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="/books" method="POST" role="form" enctype="multipart/form-data">

                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name">書名：</label>
                    <input id="name" name="name" class="form-control" placeholder="請輸入書名">
                </div>
                <div class="form-group">
                    <label for="category">分類：</label>
                    <input id="category" name="category" class="form-control" placeholder="請輸入分類">
                </div>
                <div class="form-group">
                    <label for="quantity">數量：</label>
                    <input id="quantity" name="quantity" class="form-control" placeholder="請輸入數量">
                </div>
                <div class="form-group">
                    <label for="price">價格：</label>
                    <input id="price" name="price" class="form-control" placeholder="請輸入價格">
                </div>
                <div class="form-group">
                    <label for="info">產品說明：</label>
                    <textarea id="info" name="info" class="form-control" rows="10" placeholder="請輸入產品說明"></textarea>
                </div>
                <div class="form-group">
                    <label for="path">選擇圖片：</label>
                    <input type="file" name="path" class="form-control">
                </div>
                <button type="submit" class="btn-sm btn-primary">新增</button>
            </form>
        </div>
    </div>
</div>
