<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Role</title>
</head>
<body>
    <form action='{{route("role-add")}}' method="post">
        @csrf
    <label>Name</label>
    <input type="text" name="name" required>
    <button>Add</button>
    </form>
</body>
</html>