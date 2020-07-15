<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Add</title>
</head>
<body>
    <form action="{{route('add-car')}}" method="post">
        @csrf
        <label>Car model</label>
        <input type="text" name="model" required>
        <label>Owner name</label>
        <input type="text" name="owner" required>
        <label>Mechanic</label>
            <select name="mechanic_id" required>
                @if($mechanics)
                    @foreach($mechanics as $mechanic)
                        <option value="{{$mechanic->id}}">{{$mechanic->name}}</option>
                    @endforeach
                @endif
            </select>
            <button>Add</button>
    </form>
</body>
</html>