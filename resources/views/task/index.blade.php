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
        }

       .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #4CAF50;
            color: white;
        }

        .header-container h1, .header-container h4 {
            margin: 0;
        }
        .button-container {
            width: 80%;
            margin: 20px auto;
            text-align: right;
        }

        .add-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .add-button:hover {
            background-color: #45a049;
        }

        table {
            width: 80%;
            margin: 10px auto 30px auto;
            border-collapse: collapse;
            background-color: #fff;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header-container">
        <h1>Task List</h1>
        <h4>Welcome, {{ Auth::user()->name }}</h4>
    </div>

    <div class="button-container">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">
                Logout
            </button>
        </form>     

        <a href="/create-tasks" class="add-button">+ Create New Task</a>
        <a href="/tasks/done" class="add-button">Finished Tasks</a>
        <a href="/tasks/undone" class="add-button">Unfinished Tasks</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Task</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $tasks as $task )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $task->user->name }}</td>
                    <td>{{ $task->task }}</td>
                    <td>{{ $task->is_completed ? 'Finished' : 'Unfinished' }}</td>
                    <td>
                        <a href="/tasks/{{ $task->id }}">Detail</a> |
                        <a href="/tasks/{{ $task->id }}/edit">Edit</a> |
                        <a href="/tasks/{{ $task->id }}/delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                timer: 4000,
                showConfirmButton: false
            });
        </script>
    @endif

</body>
</html>
