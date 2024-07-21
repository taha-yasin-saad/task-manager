<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>
</head>
<body>
    <h1>Task Details</h1>
    <p><strong>Name:</strong> {{ $task->name }}</p>
    <p><strong>Priority:</strong> {{ $task->priority }}</p>
    <p><strong>Created At:</strong> {{ $task->created_at }}</p>
    <p><strong>Updated At:</strong> {{ $task->updated_at }}</p>

    <a href="{{ route('tasks.index') }}">Back to Task List</a>
</body>
</html>
