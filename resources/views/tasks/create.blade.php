<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
</head>
<body>
<h1>Create a New Task</h1>
<form action="{{route('tasks.store')}}" method="POST">

    @csrf
    <div>
        <label for="title">Title:</label> <br>
        <input type="text" id="title" name="title" required>
    </div>

    <div>
        <label for="description">Description:</label> <br>
        <textarea id="description" name="description" required></textarea>
    </div>

    <button type="submit">Create Task</button>
</form>
</body>
</html>
