<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Create Task</title>
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
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        label, select, input, button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        input, select {
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
    </style>
</head>
<body>
    <h1>Create Task</h1>

    <form action="/tasks" method="POST">
        @csrf
        
        <label for="user_id">User</label>
        <select name="user_id" id="user_id" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        @error('user_id')
            <p class="error-message">{{ $message }}</p>
        @enderror

        <label for="task">Task</label>
        <input type="text" id="task" name="task" value="{{ old('task') }}">
        @error('task')
            <p class="error-message">{{ $message }}</p>
        @enderror

        <label for="is_completed">Task Status?</label>
        <select name="is_completed" id="is_completed" required>
            <option value="0" {{ old('is_completed') === "0" ? 'selected' : '' }}>Belum Selesai</option>
            <option value="1" {{ old('is_completed') === "1" ? 'selected' : '' }}>Sudah Selesai</option>
        </select>
        @error('is_completed')
            <p class="error-message">{{ $message }}</p>
        @enderror

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
