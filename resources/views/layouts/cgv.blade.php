<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Tout Là-Haut</title>
</head>

<body>

    <nav>
        <div class="fixed z-10 w-full"> 
            <a href="{{ route('menu') }}" class="absolute top-8 left-8 bg-custom-vert bg-opacity-90 text-white py-2.5 px-3 border-none rounded-md w-12 text-base inline-block text-center"><i class="fa-solid fa-bars"></i></a>    
            <a class="absolute top-8 right-52 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base"> <i class="fa-solid fa-user"></i> </a> 
            <a class="absolute top-8 right-36 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base"> EN </a> 
            <a class="absolute top-8 right-8 bg-gray-400 bg-opacity-65 tracking-widest text-white py-3 px-3 border-none rounded w-30 font-semibold text-sm"> RÉSERVER </a>  
        </div>
    </nav>

    <header>
        <div class="bg-custom-vert h-screen w-full" >
            <div class="flex flex-row"> 
                <img class="w-[550px] h-screen" src="{{ Storage::url('images/cgv.jpg') }}" alt="Cabane intérieur">
               @yield('titre')
         </div>

        </div> 
    </header>


    @include('layouts.app') 
</body>
</html>