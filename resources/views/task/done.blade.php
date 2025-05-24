<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo Sudah Selesai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
            max-width: 600px;
            margin: 0 auto;
        }

        li {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 10px;
            border-left: 5px solid #4CAF50;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        a {
            display: block;
            width: fit-content;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #555;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        a:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <h1>TodoList: Finished Tasks</h1>
    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task->task }} <br> <small>User: {{ $task->user->name ?? 'Tidak diketahui' }}</small></li>
        @endforeach
    </ul>
    <a href="/tasks">← Kembali ke semua tugas</a>
</body>
</html>
