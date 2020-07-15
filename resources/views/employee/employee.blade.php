<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
</head>
<body>
    <form action='{{route("add")}}' method="post">
        @csrf
        <label>Name</label>
        <input type="text" name="name">
        <label>Role</label>
        <select name='role[]' multiple>
            @if($roles)
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            @endif
        </select>
        <button>Add</button>
    </form>
</body>
</html>