@extends('base')

@section('content')
    <div class="container">
        <div class="mt-5 user-info">
            <h4>{{ $var_for_render['user']['name'] }}</h4>
            <h4>{{ $var_for_render['user']['email'] }}</h4>
        </div>

        <form action="{{ route('create_table') }}" method="POST">
            @csrf
            <input type="text" name="title">
            <button type="submit">Push</button>
        </form>

        @forelse($var_for_render['tables'] as $table)
            <a href="table/{{ $table->user->name }}/{{ $table->id }}">{{ $table->table_title }}</a>
        @empty

        @endforelse
    </div>
@endsection
