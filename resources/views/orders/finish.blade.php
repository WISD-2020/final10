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

@if (count($finish) > 0)
    <div class="card uper">
        <ol class="breadcrumb">
            <li class="active">
                <a class="fa fa-edit" href="/orders">訂單列表(購買)</a>
                <a class="fa fa-edit" href="/sells">訂單列表(賣家)</a>
                <l class="fa fa-edit" >已完成</l>
            </li>
        </ol>

        <div class="panel-body">
            <table class="table table-striped task-table">


                <thead>
                <th>訂單</th>
                <th>&nbsp;</th>
                </thead>


                <tbody>
                @foreach ($finish as $finish)
                    <tr>
                        <td class="table-text">
                            <div>賣家：{{ $finish->seller_id }}</div>
                            <div>買家：{{ $finish->member_id }}</div>
                            <div>書名：{{ $finish->name }}</div>
                            <div>數量：{{ $finish->quantity }}</div>
                            <div>地址：{{ $finish->address }}</div>
                            <div>運送方式：{{ $finish->way }}</div>
                            <div>訂單狀態：{{ $finish->status }}</div>
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
