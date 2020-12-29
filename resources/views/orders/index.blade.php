
@extends('layouts.shopbar')
<div class="uper">
    @include('flash-message')
</div>
<title>訂單列表</title>
<style>
    .uper {
        margin-top: 100px;
        margin-bottom:50px ;
        margin-left: 100px;
        margin-right: 100px;
    }
</style>

@if (count($orders) > 0)
    <div class="card uper">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 訂單列表(購買)
            </li>
        </ol>

        <div class="panel-body">
            <table class="table table-striped task-table">


                <thead>
                <th>訂單</th>
                <th>&nbsp;</th>
                </thead>


                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td class="table-text">
                            <div>賣家：{{ $order->seller_id }}</div>
                            <div>買家：{{ $order->member_id }}</div>
                            <div>書名：{{ $order->name }}</div>
                            <div>購買數量：{{ $order->quantity }}</div>
                            <div>地址：{{ $order->address }}</div>
                            <div>運送方式：{{ $order->way }}</div>
                            <div>訂單狀態：{{ $order->status }}</div>
                        </td>
                        <td>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
