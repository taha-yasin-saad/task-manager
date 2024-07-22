@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Task Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $task->name }}</h5>
            <p class="card-text"><strong>Priority:</strong> {{ $task->priority }}</p>
            <p class="card-text"><strong>Created At:</strong> {{ $task->created_at }}</p>
            <p class="card-text"><strong>Updated At:</strong> {{ $task->updated_at }}</p>
        </div>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Back to Task List</a>
</div>
@endsection
