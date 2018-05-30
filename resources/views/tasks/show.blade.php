@extends('layouts.app')

@section('content')


    <h1>id = {{ $tasks->id }} のtask詳細ページ</h1>

 <p>タイトル: {{ $message->title }}</p>
    <p>task: {{ $message->content }}</p>

 {!! link_to_route('tasks.edit', 'このtaskを編集', ['id' => $tasks->id]) !!}
 {!! Form::model($tasks, ['route' => ['tasks.destroy', $tasks->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除') !!}
    {!! Form::close() !!}
@endsection
