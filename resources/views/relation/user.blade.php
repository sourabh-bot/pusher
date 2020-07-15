<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <form action="{{route('user-create')}}" method="post">
        @csrf
        <label>Name</label>
        <input type="text" name="name" required>
        <label>Image</label>
        <input type="text" name="image" required>
        <button type="submit">Add</button>
    </form>
</body>
</html>