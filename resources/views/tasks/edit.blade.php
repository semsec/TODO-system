<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Task</title>
</head>
<body>
<h1>update Task</h1>
<form action="{{route('tasks.update' , ['task' => $task->id])}}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title:</label> <br>
        <input type="text" id="title" name="title" value="{{$task->title}}">
    </div>

    <div>
        <label for="description">Description:</label> <br>
        <textarea id="description" name="description">{{$task->description}}</textarea>
    </div>

    <div>
        <label for="status">Status:</label><br>
        <select id="status" name="status">
            <option value="complete">Complete</option>
            <option value="incomplete">Incomplete</option>
        </select>
    </div>

    <button type="submit">Update Task</button>
</form>
</body>
</html>
