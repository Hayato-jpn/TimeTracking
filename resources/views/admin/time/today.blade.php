@extends('layouts.admin')
@section('title', '本日の進捗')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>本日の進捗</h2>
                <p>カテゴリー別作業時間です。</p>
                <br />
                <h4>勉強：{{ $study }}</h4>
                <h4>仕事：{{ $work }}</h4>
                <h4>読書：{{ $reading }}</h4>
                <h4>家事：{{ $housework }}</h4>
                <h4>筋トレ：{{ $training }}</h4>
                <br />
                <p>タスク別作業時間を確認する場合は<a href="{{ url('admin/time/index') }}">コチラ</a>をご確認下さい。</p>
            </div>
        </div>
@endsection