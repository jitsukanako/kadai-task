@extends('layouts.app')

@section('content')

    <h1>task新規作成ページ</h1>

  
    {!! Form::model($tasks, ['route' => 'tasks.store']) !!}
  
   {!! Form::label('title', 'status:') !!}
        {!! Form::text('title') !!}

    {!! Form::label('content', 'task:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('投稿') !!}

    {!! Form::close() !!}

@endsection