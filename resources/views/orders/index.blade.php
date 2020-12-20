
@extends('layouts.OrdersMaster')
@include('flash-message')
@section('content')

    <!-- 訂單紀錄(購買) -->
    @if (count($orders) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                訂單紀錄(購買)
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- 表頭 -->
                    <thead>
                    <th>訂單</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- 表身 -->
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <!-- 任務名稱 -->
                            <td class="table-text">
                                <div>賣家：{{ $order->seller_id }}</div>
                                <div>買家：{{ $order->member_id }}</div>
                                <div>書名：{{ $order->name }}</div>

                            </td>

                            <!-- 刪除按鈕 -->
                            <td>
                                <form action="/orders/{{ $order->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button>刪除訂單</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
