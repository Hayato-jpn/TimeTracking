@extends('layouts.admin')
@section('title', '作業完了')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>作業完了しました。</h2>
                <h4>終了時刻：{{ $timeOutput }}</h4>
                <p><a href="{{ url('admin/task/index') }}">タスク一覧に戻る。</a></p>
            </div>
        </div>
@endsection