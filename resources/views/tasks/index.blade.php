@extends('layouts.app')

@section('content')

    <h1>メッセージ一覧</h1>

    @if (count($tasks) > 0)
        <ul>
            @foreach ($tasks as $tasks)
                 <li>{!! link_to_route('tasks.show', $tasks->id, ['id' => $tasks->id]) !!} : {{ $tasks->content }}</li>
            @endforeach
            @endforeach
        </ul>
    @endif
 {!! link_to_route('tasks.create', '新規メッセージの投稿') !!}
@endsection