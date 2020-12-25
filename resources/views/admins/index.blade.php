
@extends('layouts.shopbar')
<div class="uper">
    @include('flash-message')
</div>
<title>使用者列表</title>
<style>
    .uper {
        margin-top: 100px;
        margin-bottom:50px ;
        margin-left: 100px;
        margin-right: 100px;
    }
</style>

@if (count($users) > 0)
    <div class="card uper">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 使用者列表
            </li>
        </ol>

        <div class="panel-body">
            <table class="table table-striped task-table">

                <!-- 表頭 -->
                <thead>
                <th>使用者</th>
                <th>&nbsp;</th>
                </thead>

                <!-- 表身 -->
                <tbody>
                <div class="col-lg-12">
                    @foreach ($users as $user)
                        <form action="/member" method="POST" role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('POST') }}
                            <tr>
                                <!-- 任務名稱 -->
                                <td class="table-text">
                                    <div>
                                        <label for="user_id">ID：</label>
                                        <input readonly="readonly" id="user_id" name="user_id" class="form-control" value="{{ $user->id }}">
                                    </div>
                                    <div>
                                        <label for="name">名稱：</label>
                                        <input readonly="readonly" id="name" name="name" class="form-control" value="{{ $user->name }}">
                                    </div>
                                    <div>
                                        <label for="sex">性別：</label>
                                        <input readonly="readonly" id="sex" name="sex" class="form-control" value="{{ $user->sex }}">
                                    </div>
                                    <div>
                                        <label for="email">email：</label>
                                        <input readonly="readonly" id="email" name="email" class="form-control" value="{{ $user->email}}">
                                    </div>
                                    <div>
                                        <label for="address">地址：</label>
                                        <input readonly="readonly" id="address" name="address" class="form-control" value="{{ $user->address }}">
                                    </div>
                                    <div>
                                        <label for="tel">電話：</label>
                                        <input readonly="readonly" id="tel" name="tel" class="form-control" value="0{{ $user->tel}}">
                                    </div>
                                </td>
                                <td>
                                    <form>
                                        <button class="btn-warning btn-sm">設為member</button>
                                    </form>
                                    <form action="/member/{{ $user->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button class="btn-dark btn-sm">移除身分</button>
                                    </form>
                                </td>
                        </form>
                        </tr>
                    @endforeach
                </div>
                </tbody>
            </table>
        </div>
    </div>
@endif


