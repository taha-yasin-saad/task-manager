@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Task List</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Add Task</a>

        <div class="form-group">
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
                <li class="list-group-item justify-content-between align-items-center" data-id="{{ $task->id }}"
                    data-project-id="{{ $task->project_id }}" style="display: flex">
                    <span class="handle" style="cursor: grab;">&#9776; <span
                            class="badge badge-secondary">#{{ $task->priority }}</span></span>
                    <span>{{ $task->name }} </span>
                    <div>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
    <script>
        function filterTasks() {
            var projectId = document.getElementById('projectFilter').value;
            var tasks = document.querySelectorAll('#taskList li');

            tasks.forEach(function(task) {
                if (projectId === '' || task.getAttribute('data-project-id') === projectId) {
                    task.style.display = 'flex';
                } else {
                    task.style.display = 'none';
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            new Sortable(document.getElementById('taskList'), {
                animation: 150,
                handle: '.handle',
                onEnd: function(evt) {
                    var order = [];
                    document.querySelectorAll('#taskList li').forEach(function(task, index) {
                        order.push({
                            id: task.getAttribute('data-id'),
                            priority: index + 1 // Priority based on order
                        });
                    });

                    fetch(`{{ route('tasks.reorder') }}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                tasks: order
                            })
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log('Tasks reordered successfully');
                                updatePriorities();
                            }
                        });
                }
            });
        });

        function updatePriorities() {
            document.querySelectorAll('#taskList li').forEach(function(task, index) {
                var priorityBadge = task.querySelector('.badge');
                priorityBadge.textContent = '#' + (index + 1);
            });
        }
    </script>
@endsection
