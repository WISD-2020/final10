<div class="uper">
@include('flash-message')
</div>
<!DOCTYPE html>
<html lang="en">

<title>購物車</title>
    <style>
        .uper {
            margin-top: 100px;
            margin-bottom:50px ;
            margin-left: 100px;
            margin-right: 100px;
        }
    </style>

<body>
@extends('layouts.shopbar')



    <div class="card uper">
        <ol class="breadcrumb">
            <li class="active">
                <l class="fa fa-edit">購物車列表</l>
            </li>
        </ol>
@if (count($carts) > 0)
    <div class="card-body">
    <table class="table task-table table table-hover table-bordered" >
        <thead>
        <tr  align="center">
            <th scope="col">書名</th>
            <th scope="col">數量</th>
            <th scope="col">價格</th>
            <th scope="col">賣家</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($carts as $cart)
            <form action="/carts" method="POST" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('POST') }}
{{--            <form method="POST" role="form" enctype="multipart/form-data">--}}
            <tr  align="center">

                    <td width="390">
                        <a href="/books/{{ \App\Models\Book::find($cart->book_id)->id}}"><input readonly="readonly" id="name" name="name" class="form-control" value="{{\App\Models\Book::where('id', $cart->book_id)->value('name')}}"></a>
                    </td>
                    <td width="390">
                        <input readonly="readonly" id="quantity" name="quantity" class="form-control" value="{{$cart->quantity }}">
                    </td>
                    <td width="390">
                        <input readonly="readonly" id="price" name="price" class="form-control" value="{{(\App\Models\Book::where('id', $cart->book_id)->value('price'))*($cart->quantity)}}">
                    </td>
                    <td width="200">
                        <a href="/shops/{{ \App\Models\Book::find($cart->book_id)->member_id}}">{{ \App\Models\Book::find($cart->book_id)->member->user->name}}</a>
                    </td>
                    <td>
                        {{--賣家編號--}}
                        <input type="hidden"  id="seller_id" name="seller_id" class="form-control" value="{{\App\Models\Book::where('id', $cart->book_id)->value('member_id')}}">

                        {{--買家編號--}}
                        <input type="hidden"  id="member_id" name="member_id" class="form-control" value="{{$cart->member_id}}">
                        {{--書籍編號--}}
                        <input type="hidden"  id="book_id" name="book_id" class="form-control" value="{{$cart->book_id}}">

                        <form action="/carts" method="POST" >
                            <p><input name="ord" type="submit" onclick="javascript: form.action='/orders';" value="下訂單"  class="btn btn-outline-primary btn-sm" >
                            </p></form>
                        <form action="/carts/{{$cart->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input name="delete" type="submit" onclick="javascript: form.action='/carts/{{$cart->id}}';" value="移除商品"  class="btn btn-outline-danger btn-sm" >
                        </form>

                    </td>
            </tr>
            </form>
        @endforeach
        </tbody>
    </table>
    </div>
    </div>
@else
    <div class="card-body">
    購物車尚無商品
    </div>
@endif

<!-- Page Content -->
</body>

