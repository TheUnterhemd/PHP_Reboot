<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://classless.de/classless.css">
    <title>Document</title>
</head>
<body>
    <h1>Testing stuff Motherfuckers</h1>
    <form action="/register" method="POST">
        @csrf
        <input type="text" placeholder="name" name="name">
        <input type="text" placeholder="email" name="email">
        <input type="password" placeholder="password" name="password">
        <button>Register</button>
    </form>
</body>
</html>