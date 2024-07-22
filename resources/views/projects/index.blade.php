@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Project List</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Add Project</a>

        <ul class="list-group">
            @foreach ($projects as $project)
                <li class="list-group-item">
                    {{ $project->name }}
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-secondary float-right ml-2">Edit</a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="float-right ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
