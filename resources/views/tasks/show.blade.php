<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 2px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>task: {{$task->id}}</h1>
    <table>
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>status</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->status }}</td>
            </tr>
        </tbody>
    </table>
</div>
</body>
</html>
