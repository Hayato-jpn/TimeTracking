@extends('layouts.admin')
@section('title', 'タイムトラッキングとは？')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>タイムトラッキングとは？</h2>
                <p>タイムトラッキングとは、「作業時間を記録」することによって「何にどのくらいの時間がかかるか」ということを把握。結果的に「作業効率の改善」につなげるという時間管理術のこと。</p>
                <br />
                <br />
                <h2>このサイトの使い方</h2>
                <ol>
                    <li><a href="{{ url('admin/task/create') }}">コチラ</a>からタスクを新規作成</li>
                    <li><a href="{{ url('admin/task/index') }}">残タスク一覧</a>から作業開始するタスクのステータスを押す</li>
                    <li>遷移先、タイムトラッキング開始ページから「開始」ボタンを押す</li>
                    <li>作業完了後、<a href="{{ url('admin/task/index') }}">残タスク一覧</a>から該当タスクステータスを押す</li>
                    <li>遷移先、タイムトラッキング停止ページから「停止」ボタンを押す</li>
                    <li><a href="{{ url('admin/time/today') }}">本日の進捗</a>からカテゴリー別の作業時間が表示されます</li>
                    <li>また、<a href="{{ url('admin/time/index') }}">コチラ</a>から過去データ含む完了タスク一覧をご確認頂けます</li>
                </ol>
            </div>
        </div>
    </div>
@endsection