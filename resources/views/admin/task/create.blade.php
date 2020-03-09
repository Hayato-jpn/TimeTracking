@extends('layouts.admin')
@section('title', 'タスク新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>タスク新規作成</h2>
                <form action="{{ action('Admin\TaskController@record') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                    <input type="hidden" name="status" value="未着手">
                    <div class="form-group row">
                        <label class="col-md-2">カテゴリー</label>
                        <div class="col-md-10">
                            <select class="form-control" name="category">
                                <option value="">カテゴリーを選択して下さい</option>
                                <option value="勉強">勉強</option>
                                <option value="仕事">仕事</option>
                                <option value="読書">読書</option>
                                <option value="家事">家事</option>
                                <option value="筋トレ">筋トレ</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="10">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">期限</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="deadline" value="{{ old('deadline', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="作成">
                </form>
            </div>
        </div>
    </div>
@endsection