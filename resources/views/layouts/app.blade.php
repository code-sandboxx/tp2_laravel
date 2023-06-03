<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    

</head>
<body class="background vh-100">

    <nav class="navbar primary-bg-color-green navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-nav flex-grow-1">
                    <a href="/" class="nav-link fw-bold pl-3">Accueil</a>
                    <a href="" class="nav-link fw-bold pl-3">Étudiants</a>
            </div>
        </div> 
    </nav>   

    @yield('content')
</body>
<footer class="footer b-0 py-3 primary-bg-color-green mt-auto fixed-bottom">

</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>