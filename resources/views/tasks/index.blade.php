{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Task List</title>--}}
{{--    <style>--}}
{{--        table {--}}
{{--            border-collapse: collapse;--}}
{{--            width: 50%;--}}
{{--        }--}}
{{--        th, td {--}}
{{--            border: 1px solid #ddd;--}}
{{--            padding: 2px;--}}
{{--            text-align: left;--}}
{{--        }--}}
{{--        th {--}}
{{--            background-color: #f2f2f2;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
{{--    <h1>My Tasks</h1>--}}
{{--    <form action="{{route('tasks.index')}}" method="get">--}}
{{--        <div>--}}
{{--            <label for="filter">Filter Tasks:</label>--}}
{{--            <select id="filter" name="filter">--}}
{{--                <option>-------</option>--}}
{{--                <option value="complete">Completed</option>--}}
{{--                <option value="incomplete">Incomplete</option>--}}
{{--            </select>--}}
{{--            <button type="submit">Filter</button>--}}
{{--        </div>--}}
{{--    <table>--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Title</th>--}}
{{--            <th>Description</th>--}}
{{--            <th>status</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach ($tasks as $task)--}}
{{--            <tr>--}}
{{--                <td>{{ $task->title }}</td>--}}
{{--                <td>{{ $task->description }}</td>--}}
{{--                <td>{{ $task->status }}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}
{{--    </form>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
            color: #212529; /* Dark text color */
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        select {
            background-color: #fff; /* White background for select inputs */
            color: #212529; /* Dark text color for select inputs */
        }
        .pagination {
            display: flex;
            justify-content: left;
            padding: 20px;
        }
        .pagination a, .pagination span {
            margin: 0 5px;
            padding: 10px 15px;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .pagination a:hover {
            background-color: #007bff;
            color: #fff;
        }
        .pagination span.disabled {
            color: #ddd;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>My Tasks</h1>
    <form action="{{ route('tasks.index') }}" method="get">
        <div>
            <label for="filter">Filter Tasks:</label>
            <select id="filter" name="filter" onchange="this.form.submit()">
                <option>-------</option>
                <option value="complete" {{ request('filter') == 'complete' ? 'selected' : '' }}>Completed</option>
                <option value="incomplete" {{ request('filter') == 'incomplete' ? 'selected' : '' }}>Incomplete</option>
            </select>
            <label for="itemsPerPage">Items per page:</label>
            <select id="itemsPerPage" name="itemsPerPage" onchange="this.form.submit()">
                <option>--------</option>
                <option value="3" {{ request('itemsPerPage') == 3 ? 'selected' : '' }}>3</option>
                <option value="5" {{ request('itemsPerPage') == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ request('itemsPerPage') == 10 ? 'selected' : '' }}>10</option>
            </select>
        </div>
    </form>
    <table>
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Created_at</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->created_at }}</td>
                <td>{{ $task->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination">
        {{-- Previous Page Link --}}
        @if ($tasks->onFirstPage())
            <span class="disabled">&laquo; Previous</span>
        @else
            <a href="{{ $tasks->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
        @endif

        {{-- Next Page Link --}}
        @if ($tasks->hasMorePages())
            <a href="{{ $tasks->nextPageUrl() }}" rel="next">Next &raquo;</a>
        @else
            <span class="disabled">Next &raquo;</span>
        @endif
    </div>
</div>
</body>
</html>

