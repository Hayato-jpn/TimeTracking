@extends('layouts.admin')
@section('title', '残タスク一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>残タスク一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\TaskController@create') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\TaskController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <h5>タイムトラッキングを「開始」「停止」する場合は、該当タスク「ステータス」をタップして下さい。</h5>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">カテゴリー</th>
                                <th width="20%">タイトル</th>
                                <th width="20%">内容</th>
                                <th width="15%">期限</th>
                                <th width="15%">ステータス</th>
                                <th width="10%">編集</th>
                                <th width="10%">削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ \Str::limit($task->category, 50) }}</td>
                                    <td>{{ \Str::limit($task->title, 50) }}</td>
                                    <td>{{ \Str::limit($task->body, 100) }}</td>
                                    <td>{{ \Str::limit($task->deadline, 50) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\TimeController@start', ['id' => $task->id]) }}">{{ \Str::limit($task->status, 50) }}</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\TaskController@edit', ['id' => $task->id]) }}">編集</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\TaskController@delete', ['id' => $task->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection