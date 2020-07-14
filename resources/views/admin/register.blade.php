<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <style>
        h1{
            text-align: center;
            background-color: whitesmoke;
            color: cornflowerblue;
        }

        input, label{
            display: block;
            font-size: 15pt;
            width: 98%;
            margin: 5pt;
            padding: 4pt;
            border-radius: 6pt;
        }

        button{
            font-size: 12pt;
            padding: 4pt;
            background-color: cornflowerblue;
            color: white;
        }

    </style>
</head>
<body>
    <h1>Admin Registration</h1>
    <section>
    
    <form action="{{route('save')}}" method="post">
    @csrf
        <div>
            <label for="username">Username</label>
            <input type="text" value="" name="username" required id="username">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" value="" name="email" required id="email">
        </div>
        <div>
            <label>Password</label>
            <input type="password" value="" name="password" required id="password">
        </div>
        <center><button type="submit">Register</button></center>
    </form>
    
    </section>
</body>
</html>