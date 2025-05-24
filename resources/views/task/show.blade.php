<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #333;
            padding: 20px;
            background-color: #4CAF50;
            color: white;
        }

        p {
            font-size: 18px;
            margin: 15px 0;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

       .button-group {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;   
        }

        .button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Task Detail</h1>

    <p>Name: {{ $tasks->user->name }}</p>
    <p>Task: {{ $tasks['task'] }}</p>
    <p>Status: {{ $tasks['is_completed'] }}</p>

    <div class="button-group">
        <a href="/tasks" class="button">Go Back</a>
        <a href="/tasks/{{ $tasks->id }}/edit" class="button">Edit</a>
        <a href="/tasks/{{ $tasks->id }}/delete" class="button">Delete</a>
    </div>

    
</body>
</html>
