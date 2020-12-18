@extends('layouts.shopbar')
@include('flash-message')
<title>更改書籍資料</title>
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
                    <i class="fa fa-edit"></i> 更改書籍資料
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <!--錯誤提示-->@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
        @endif
        <!--錯誤提示--><div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  <strong>警告！</strong> 請修正表單錯誤：
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('books.update', $book->id ) }}" method="POST" role="form" enctype="multipart/form-data"><!--enctype="multipart/form-data"一定要加,處理圖片就要加這個-->

                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">書名：</label>
                    <input id="name" name="name" class="form-control" placeholder="{{$book->name}}">
                </div>
                <div class="form-group">
                    <label for="category">分類：</label>
                    <input id="category" name="category" class="form-control" placeholder="{{$book->category}}">
                </div>
                <div class="form-group">
                    <label for="quantity">數量：</label>
                    <input id="quantity" name="quantity" class="form-control" placeholder="{{$book->quantity}}">
                </div>
                <div class="form-group">
                    <label for="price">價格：</label>
                    <input id="price" name="price" class="form-control" placeholder="{{$book->price}}">
                </div>
                <div class="form-group">
                    <label for="info">產品說明：</label>
                    <textarea id="info" name="info" class="form-control" rows="10" placeholder="{{$book->info}}"></textarea>
                </div>
                <div class="form-group">
                    <label for="path">選擇圖片：</label>
                    <input id="path" name="path" type="file">

                </div>

                <button type="submit" class="btn-sm btn-primary">更新</button>
            </form>
        </div>
    </div>
</div>
