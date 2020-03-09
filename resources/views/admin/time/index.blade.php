@extends('layouts.admin')
@section('title', '完了タスク一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>完了タスク一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ url('admin/task/index') }}" role="button" class="btn btn-primary">残タスク一覧へ</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\TimeController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">日付</label>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="date" value="{{ old('date', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">カテゴリー</th>
                                <th width="20%">タイトル</th>
                                <th width="20%">内容</th>
                                <th width="10%">日付</th>
                                <th width="10%">開始時間</th>
                                <th width="10%">終了時間</th>
                                <th width="10%">編集</th></th>
                                <th width="10%">削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ \Str::limit($task->category, 50) }}</td>
                                    <td>{{ \Str::limit($task->title, 50) }}</td>
                                    <td>{{ \Str::limit($task->body, 100) }}</td>
                                    <td>{{ \Str::limit($task->date, 50) }}</td>
                                    <td>{{ \Str::limit($task->time, 50) }}</td>
                                    <td>{{ \Str::limit($task->end, 50) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\TimeController@edit', ['id' => $task->id]) }}">編集</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\TimeController@delete', ['id' => $task->id]) }}">削除</a>
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