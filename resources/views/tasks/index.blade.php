@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Task List</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>

        <div class="mt-3">
            <label for="projectFilter">Filter by Project:</label>
            <select id="projectFilter" class="form-control" onchange="filterTasks()">
                <option value="">All Projects</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <ul id="taskList" class="list-group mt-3">
            @foreach ($tasks as $task)
                <li class="list-group-item" data-id="{{ $task->id }}" data-project-id="{{ $task->project_id }}">
                    {{ $task->name }}
                    <a href="{{ route('tasks.edit', $task->id) }}"
                        class="btn btn-sm btn-secondary float-right ml-2">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="float-right ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        function filterTasks() {
            var projectId = document.getElementById('projectFilter').value;
            var tasks = document.querySelectorAll('#taskList li');

            tasks.forEach(function(task) {
                if (projectId === '' || task.getAttribute('data-project-id') === projectId) {
                    task.style.display = '';
                } else {
                    task.style.display = 'none';
                }
            });
        }


        // document.addEventListener('DOMContentLoaded', function() {
        //     new Sortable(document.getElementById('taskList'), {
        //         animation: 150,
        //         onEnd: function(evt) {
        //             var order = [];
        //             document.querySelectorAll('#taskList li').forEach(function(task, index) {
        //                 order.push(task.getAttribute('data-id'));
        //             });

        //             fetch('{{ route('tasks.reorder') }}', {
        //                 method: 'POST',
        //                 headers: {
        //                     'Content-Type': 'application/json',
        //                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //                 },
        //                 body: JSON.stringify({
        //                     tasks: order
        //                 })
        //             });
        //         }
        //     });
        // });
    </script>
@endsection
