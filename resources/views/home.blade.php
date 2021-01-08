@extends('base')

@section('content')
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
        <div class="card mt-4" style="width: 18rem;">
            <div class="card-header">
                <a href="table/{{ $table->user->name }}/{{ $table->id }}">{{ $table->table_title }}</a>
            </div>
            <ul class="list-group list-group-flush">
                @forelse($table->tasks as $task)
                    Здесь должна быть форма с полем куда человек добавить свою задачу
                    <li class="list-group-item text-center">{{ $task->task_text }}</li>
                @empty
                @endforelse
                <li class="list-group-item">
                    <a href="create/task/to/{{ $table->id }}" type="button" class="btn btn-outline-primary btn-sm" onclick="event.preventDefault();
                                    document.getElementById('add-task-form').submit();">Add task</a>
                    <form id="add-task-form" action="create/task/to/{{ $table->id }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    <a href="/delete/table/{{ $table->id }}" type="button" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault();
                                        document.getElementById('delete-tabel-form').submit();">Remove</a>
                    <form id="delete-tabel-form" action="/delete/table/{{ $table->id }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    @empty
    @endforelse
@endsection
