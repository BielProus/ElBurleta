<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burleta</title>
    <style>
        h1 {
            margin-bottom: 20vh;
            font-size: 15vh;
            margin-top: 0px;
        }

        .container {
            padding: 3% 5% 5%;
            margin: 5% 20% 10%;
            border-radius: 20px;
            background-color: rgba(255,255,255,0.5);
            display: block;
            text-align: center;
        }

        body {
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            background-image: url("cocker.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        nav {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 1.2em;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: red;
        }

        .nav-links {
            display: flex;
        }

        .button {
            margin: 10vh 0;
            background-color: red;
            padding: 5px;
            border-radius: 15px;
            text-decoration: none;
            color: white;
        }

        .text {
            margin-bottom: 20vh;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <a href="/" class="logo">El Burleta</a>
        <div class="nav-links">
            <a href="/posts">Posts</a>
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        </div>
    </nav>

    <div class="container">
        <h1>El Burleta</h1>
        <h2 class="text">
            <!-- Verificar si el usuario está autenticado -->
            @auth
                ¡Bienvenido {{ Auth::user()->name }}!
            @else
                ¡Bienvenido al Dashboard!
            @endauth
        </h2>
        <a class="button" href="https://www.burleta.cat">Comença a riure</a>
    </div>

    <footer></footer>
</body>
</html>
