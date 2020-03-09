@extends('layouts.admin')
@section('title', 'タイムトラッキング停止')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>タイムトラッキング停止</h2>
                <p>下記「完了」ボタンを押す事でタイムトラッキングを停止。タスクステータスを「完了」に変更します。</p>
                <br />
                <h3>選択したタスク</h3>
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
                                    </tr>
                                </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ \Str::limit($task->category, 50) }}</td>
                                        <td>{{ \Str::limit($task->title, 50) }}</td>
                                        <td>{{ \Str::limit($task->body, 100) }}</td>
                                        <td>{{ \Str::limit($task->deadline, 50) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="{{ action('Admin\TimeController@end', ['id' => $task->id]) }}" role="button" class="btn btn-primary">作業完了</a>
                </div>
            </div>
        </div>
@endsection