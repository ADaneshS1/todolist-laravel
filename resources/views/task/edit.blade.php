<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit Task</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }

        form {
            background-color: white;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        label, select, input, button {
            display: block;
            margin-bottom: 10px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
            padding: 10px;
            border-radius: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        .button-group {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
}

.button-link {
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    padding: 8px 16px;
    border-radius: 5px;
    text-align: center;
    font-size: 14px;
    white-space: nowrap;
}

.button-link:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>

<h2 style="text-align:center;">Edit Task</h2>

<form action="/tasks/{{ $task->id }}" method="POST">
    @csrf
    @method('PUT')

    <label for="user_id">User</label>
    <select name="user_id" id="user_id" required>
        @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ old('user_id', $task->user_id) == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
    @error('user_id')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <label for="task">Task</label>
    <input type="text" name="task" id="task" value="{{ old('task', $task->task) }}">
    @error('task')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <label for="is_completed">Task Status?</label>
    <select name="is_completed" id="is_completed" required>
        <option value="0" {{ old('is_completed', $task->is_completed) == 0 ? 'selected' : '' }}>Unfinished</option>
        <option value="1" {{ old('is_completed', $task->is_completed) == 1 ? 'selected' : '' }}>Finished</option>
    </select>
    @error('is_completed')
        <p class="error-message">{{ $message }}</p>
    @enderror

    <button type="submit">Update Task</button>
</form>

<!-- Kumpulan Tombol di bawah form -->
<div class="button-group">
    <a href="/tasks" class="button-link">Go Back</a>
    <a href="/tasks/{{ $task->id }}/edit" class="button-link">Edit</a>
    <a href="/tasks/{{ $task->id }}/delete" class="button-link">Delete</a>
</div>

</body>
</html>
