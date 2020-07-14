<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    <form action='{{route("student-create")}}' method="POST">
        @csrf
        <label>Name</label>
        <input type='text' name="name" required>
        <label>Email</label>
        <input type='email' name="email" required>
        <label>Class</label>
        <select required name="class_id">
            <option selected>Select Class</option>
            @if($classes != null)
                @foreach($classes as $class)
                    <option value='{{$class->id}}'>{{$class->name}}</option>
                @endforeach
            @endif
        </select>
        <button>Save</button>
    </form>
</body>
</html>