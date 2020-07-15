<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
</head>
<body>
    <form action="{{route('post-create')}}" method="post">
        @csrf
        <label>Post name</label>
        <input type="text" name="name" required>
        <label>Image</label>
        <input type="text" name="image" required>
        <button type="submit">Add</button>
    </form>
</body>
</html>