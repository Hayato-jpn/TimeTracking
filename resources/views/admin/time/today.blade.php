@extends('layouts.admin')
@section('title', '本日の進捗')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>本日の進捗</h2>
                <p>カテゴリー別作業時間です。</p>
                <br />
                <h4>勉強：{{ $study }} 分</h4>
                <h4>仕事：{{ $work }} 分</h4>
                <h4>読書：{{ $reading }} 分</h4>
                <h4>家事：{{ $housework }} 分</h4>
                <h4>筋トレ：{{ $training }} 分</h4>
                <br />
                <p>タスク別作業時間を確認する場合は<a href="{{ url('admin/time/index') }}">コチラ</a>をご確認下さい。</p>
            </div>
        </div>
@endsection