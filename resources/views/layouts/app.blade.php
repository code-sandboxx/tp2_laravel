<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    

</head>
<body class="background w-100">

    <nav class="navbar primary-bg-color-green navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-nav flex-grow-1">
                    <a href="/" class="nav-link fw-bold pl-3">Accueil</a>
                    <a href="{{route('etudiant.index')}}" class="nav-link fw-bold pl-3">Étudiants</a>
            </div>
        </div> 
    </nav>   

    <div class="row d-flex mt-5 pt-5 justify-content-center">
        <div class="mt-5">
            <h1 class="display-10 text-center"> 
                @yield('title')
            </h1>
        </div>
       @yield('content') 
    </div>
        
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>