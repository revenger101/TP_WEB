<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Des Etudiant</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>

<div class="flex flex-col md:flex-row justify-between items-center" >
    <div class="w-24 h-24">
        <a href=""><img src=""></a>
    </div>
    <ul class="flex flex-col md:flex-row items-center mb-3 mb:mb-0">
        @auth
        <li class="md:mr-5 py-2 md:py-0"><a href="" class="hover:text-green-400"></a>Les Missions</li>
        <li class="md:mr-5 py-2 md:py-0"><a href="" class="hover:text-green-400"></a>Mes conversations</li>
        <li class="md:mr-5 py-2 md:py-0"><a href="" class="hover:text-green-400"></a>Mon compte</li>
        <li class="md:mr-5 py-2 md:py-0"><a href="{{ route('etudiant')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="hover:text-green-400">Se Deconnecter</a></li>
        <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">
            @csrf
        </form>
        @else
            <li class="md:mr-5 py-2 md:py-0" class="hover:text-green-400">Se connecter</li>
            <li class="md:mr-5 py-2 md:py-0" class="hover:text-green-400">S'enregistrer</li>
            @endauth
    </ul>
</div>
    <div class="container">
        @yield('content')
    </div>    

</body>
</html>