
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
                <l class="fa fa-edit">訂單列表(購買)</l>
                <a class="fa fa-edit" href="/sells">訂單列表(賣家)</a>
                <a class="fa fa-edit" href="/orders/finish">已完成</a>
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
                    <form action="{{ route('orders.update',$order->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <tr>
                            <td class="table-text">
                                <div>賣家：{{ $order->seller_id }}</div>
                                <div>買家：{{ $order->member_id }}</div>
                                <div>書名：{{ $order->name }}</div>
                                <div>數量：{{ $order->quantity }}</div>
                                <div>地址：{{ $order->address }}</div>
                                <div>運送方式：{{ $order->way }}</div>
                                <div>訂單狀態：{{ $order->status }}</div>
                            </td>
                            <td>
                                <button class="btn-warning btn-sm">確認取貨</button>
                            </td>
                        </tr>

                    </form>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
/
