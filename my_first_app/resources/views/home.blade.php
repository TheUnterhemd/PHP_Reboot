<!--Erste view wird eine einfache Register und Login Seite-->
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
    <!--@ auth only can be seen by logged in users -->
    @auth

    <h1>Welcome you are Logged in Dude.</h1>

    <!--Form to logout users -->
    <form action="/logout" method='POST'>
        @csrf
        <button>Log out</button>
    </form>


    <!--@ else will be seen by everyone who isn´t logged in -->    
    @else

    <h1>Testing stuff Motherfuckers</h1>
    <div>
        <form action="/register" method="POST">
            @csrf
            <input type="text" placeholder="name" name="name">
            <input type="text" placeholder="email" name="email">
            <input type="password" placeholder="password" name="password">
            <button>Register</button>
        </form>
    </div>
    
    <div>
        <form action="/login" method="POST">
        @csrf
        <input type="text" placeholder="email" name="loginEmail">
        <input type="password" placeholder="password" name="loginPassword">
        <button>Login</button>
    </form>
</div>
    

    @endauth
</body>
</html>