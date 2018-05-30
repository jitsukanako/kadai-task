@extends('layouts.app')

@section('content')
  <h1>id: {{ $tasks->id }} のtask編集ページ</h1>

  
   
    {!! Form::model($tasks, ['route' => ['tasks.update', $tasks->id], 'method' => 'put']) !!}

  {!! Form::label('status', 'タイトル:') !!}
        {!! Form::text('status') !!}

        {!! Form::label('content', 'task:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('更新') !!}

    {!! Form::close() !!}


@endsection