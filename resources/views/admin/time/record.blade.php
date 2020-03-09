@extends('layouts.admin')
@section('title', '作業開始')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>作業開始しました。</h2>
                <h4>開始時刻：{{ $timeOutput }}</h4>
                <p><a href="{{ url('admin/task/index') }}">タスク一覧に戻る。</a></p>
            </div>
        </div>
@endsection