<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Class</title>
</head>
<body>
    <form action="{{route('class-create')}}" method="POST">
        @csrf
        <label>Enter Class</label>
        <input type="text" name='name' required>
        <button>Save</button>
    </form>
</body>
</html>