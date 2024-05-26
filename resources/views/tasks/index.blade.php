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
    <h1>My Tasks</h1>
    <table>
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>status</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        <label for="filter">Filter Tasks:</label>
        <select id="filter" name="filter">
            <option value="all">All Tasks</option>
            <option value="completed">Completed Tasks</option>
            <option value="incomplete">Incomplete Tasks</option>
        </select>
        <button type="submit">Apply Filter</button>
    </div>
</div>
</body>
</html>
