<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    
    <div class="bg-custom-vert h-screen w-full" >

        <div class="flex flex-row-reverse"> 
            <img class="w-[700px] h-screen" src="{{ Storage::url('images/cabanemenu.jpg') }}" alt="Cabane menu">
        </div>

        <div class="absolute top-0 left-28"> 
            <img class="h-[250px] w-[250px]" src="{{ Storage::url('images/logomenu.png') }}" alt="Logo menu">
        </div>

        <button class="absolute top-6 left-8 bg-gray-400 bg-opacity-65 text-white py-2.5 px-4 font-bold border-none rounded w-12 tracking-wide text-base"> X </button> 
        
        <a  href="{{ route('reserver') }}" class="absolute top-6 right-8 bg-custom-vert bg-opacity-90 tracking-widest text-white py-3 px-4 border-none rounded w-30 font-semibold text-sm"> RÉSERVER </a>
        
    
    <div class=" absolute top-56 left-28 flex flex-col space-y-8 text-lg text-white font-bold">
        <a href="{{ route('accueil') }}">ACCUEIL</a>
        <a href="{{ route('noscabanes') }}">LES CABANES</a>
        <a href="{{ route('prestations') }}">PRESTATIONS ET SERVICES</a>
        <a href="{{ route('reserver') }}">RÉSERVER</a>
        <a href="{{ route('contact') }}">CONTACT & ACCÈS</a>
    </div>


    <a class="flex items-center justify-center absolute bottom-8 left-28 bg-gray-400 bg-opacity-65  text-white py-2.5 px-4 font-bold border-none rounded w-12 tracking-wide text-base"> EN </a> 
    <a class="flex items-center justify-center absolute bottom-8 left-44 bg-gray-400 bg-opacity-65  text-white py-3.5 px-4 font-bold border-none rounded w-12 tracking-wide text-base"> <i class="fa-brands fa-facebook-f"></i> </a> 
    <a class="flex items-center justify-center absolute bottom-8 left-60 bg-gray-400 bg-opacity-65  text-white py-3.5 px-4 font-bold border-none rounded w-12 tracking-wide text-base"> <i class="fa-brands fa-instagram"></i> </a> 

 

    </div>



</body>
</html>