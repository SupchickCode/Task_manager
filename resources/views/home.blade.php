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
                    <li class="list-group-item">
                        @if ($task->done == 0)

                            <form action="add/task/to/{{ $task->id }}" method="POST">
                                @csrf
                                <input value="{{ $task->task_text }}" name="task_text" class="form-control text-center" type="text"
                                    style="box-shadow: none;">
                            </form>

                            <div class="delete-icon">
                                <a type="button" href="remove/task/{{ $task->id }}" onclick="event.preventDefault();
                                                        document.getElementById('remove-task-form-{{ $task->id }}').submit();">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path fill-rule="evenodd"
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </a>

                                <form id="remove-task-form-{{ $task->id }}" action="remove/task/{{ $task->id }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>

                            <div lass="done-icon">
                                <a type="button" href="done/task/{{ $task->id }}" onclick="event.preventDefault();
                                            document.getElementById('done-task-form-{{ $task->id }}').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-bookmark-check" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                                        <path fill-rule="evenodd"
                                            d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    </svg>
                                </a>

                                <form id="done-task-form-{{ $task->id }}" action="done/task/{{ $task->id }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @else
                            <input style="text-decoration:line-through" value="{{ $task->task_text }}" name="task_text"
                                class="form-control text-center" type="text" style="box-shadow: none;" disabled="disabled">

                            <div class="delete-icon">
                                <a type="button" href="remove/task/{{ $task->id }}"
                                    onclick="event.preventDefault();
                                                                document.getElementById('remove-task-form-{{ $task->id }}').submit();">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path fill-rule="evenodd"
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </a>

                                <form id="remove-task-form-{{ $task->id }}" action="remove/task/{{ $task->id }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endif
                    </li>
                @empty
                @endforelse
                <li class="list-group-item">
                    <a href="create/task/to/{{ $table->id }}" type="button" class="btn btn-outline-primary btn-sm"
                        onclick="event.preventDefault();
                                                                            document.getElementById('create-task-form-{{ $table->id }}').submit();">Add
                        column</a>
                    <form id="create-task-form-{{ $table->id }}" action="create/task/to/{{ $table->id }}" method="POST"
                        class="d-none">
                        @csrf
                    </form>

                    <a href="/delete/table/{{ $table->id }}" type="button" class="btn btn-outline-danger btn-sm"
                        onclick="event.preventDefault();
                                                                                document.getElementById('delete-tabel-form-{{ $table->id }}').submit();">Remove</a>
                    <form id="delete-tabel-form-{{ $table->id }}" action="/delete/table/{{ $table->id }}" method="POST"
                        class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    @empty
    @endforelse
@endsection
