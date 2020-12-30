@include('flash-message')
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

{{--@if (count($orders) > 0)--}}
    <div class="card uper">
        <ol class="breadcrumb">
            <li class="active">
                <l class="fa fa-edit">購物車列表</l>
            </li>
{{--      讀資料庫--}}

        <div class="panel-body">

        </div>
    </div>

{{--@endif--}}

<!-- Page Content -->
<div align="center">
    <input type ="button" onclick="history.back()" value="回到上一頁">
</div>


</body>

