@extends('layouts.admin')
@section('title', 'タイムトラッキング')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>タイムトラッキング</h2>
                <p>タイムトラッキングとは、「作業時間を記録」することによって「何にどのくらいの時間がかかるか」ということを把握し、結果的に「作業効率の改善」につなげるという時間管理術のこと。</p>
                <br />
                <h3>選択したタスク</h3>
                <p>タイムトラッキング開始する際は、下記の「作業開始」ボタンを押して下さい。</p>
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
                    <a href="{{ action('Admin\TimeController@record', ['id' => $task->id]) }}" role="button" class="btn btn-primary">作業開始</a>
                </div>
            </div>
        </div>
@endsection