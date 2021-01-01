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


@if (count($carts) > 0)
    <div class="card uper">
        <ol class="breadcrumb">
            <li class="active">
                <l class="fa fa-edit">購物車列表</l>
            </li>
        </ol>
        <input type ="button" onclick="history.back()" value="回到上一頁">

    <div class="card-body">
    <table class="table task-table table-striped table table-hover table-bordered" >
        <thead>
        <tr  align="center">
            <th scope="col">書名</th>
            <th scope="col">數量</th>
            <th scope="col">價格</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($carts as $cart)
        <tr  align="center">
            <td width="390">
                {{\App\Models\Book::where('id', $cart->book_id)->value('name')}}
            </td>
            <td width="390">
                {{$cart->quantity }}
            </td>
            <td width="390">
                {{\App\Models\Book::where('id', $cart->book_id)->value('price')}}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    </div>

@endif

<!-- Page Content -->
</body>

