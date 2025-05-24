<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #d32f2f;
        }

        p {
            font-size: 18px;
            color: #333;
            margin: 20px 0;
        }

        form {
            display: inline-block;
            margin-top: 20px;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .button-link,
        button {
            padding: 8px 16px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button-link {
            background-color: #9e9e9e;
            color: white;
        }

        .button-link:hover {
            background-color: #757575;
        }

        button#confirmDeleteBtn {
            background-color: #d32f2f;
            color: white;
        }

        button#confirmDeleteBtn:hover {
            background-color: #b71c1c;
        }
    </style>
</head>
<body>
    <h1>Delete Task</h1>
    <p>Are you sure you want to delete task ID {{ $tasks->id }}?</p>

    <form action="/tasks/{{ $tasks->id }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="button-group">
            <a href="/tasks" class="button-link">Cancel</a>
            <button type="submit" id="confirmDeleteBtn">Yes</button>
        </div>
    </form>
</body>
</html>
