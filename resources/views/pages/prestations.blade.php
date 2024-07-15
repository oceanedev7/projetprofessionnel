@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Tout Là-Haut</title>
</head>
<body>
    

    @section('navbar')
    <div class="fixed z-10 w-full"> 
        <a href="{{ route('menu') }}" class="absolute top-8 left-8 bg-custom-vert bg-opacity-90 text-white py-2.5 px-3 border-none rounded-md w-12 text-base inline-block text-center"><i class="fa-solid fa-bars"></i></a>    
        <a class="absolute top-8 right-52 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base"> <i class="fa-solid fa-user"></i> </a> 
        <a class="absolute top-8 right-36 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base"> EN </a> 
        <a href="{{ route('reserver') }}" class="absolute top-8 right-8 bg-gray-400 bg-opacity-65 tracking-widest text-white py-3 px-3 border-none rounded w-30 font-semibold text-sm"> RÉSERVER </a>  
    </div>
    @endsection



    @section('main')


    <div class="bg-custom-vert h-screen w-full flex">
       
        <img class="w-[550px] h-full object-cover" src="{{ Storage::url('images/restauration.png') }}" alt="Panier repas">
    
        <div class="flex flex-col justify-center px-8 md:px-16 text-center md:text-left">
            <h1 class="text-4xl text-white font-bold mb-4">RESTAURATION</h1>
            <hr class="border-t-4 border-custom-beige w-32 mx-auto md:mx-0 mb-6">
    
            <div class="text-justify text-white max-w-lg mx-auto md:mx-0">
                Le domaine vous propose une restauration gourmande élaborée avec des produits frais locaux et de saison. 
                Le chef allie tradition martiniquaise, produits du terroir et originalité pour ravir vos papilles.
                Tous nos plats sont faits maison pour garantir une authenticité indéniable et nos menus changent chaque saison.
                Nos gourmandises se dégustent dans le confort de vos cabanes. Et grâce à notre Room Service, vos paniers repas sont hissés le long d'une poulie.
            </div>
        </div>
    </div>
    
    

    <div style="background-color:#F9F4EE" class=" h-screen w-full"> 

        <div class="flex flex-row justify-center space-x-60 relative top-16">
        
            <div class="flex flex-col items-center max-w-xs p-4 rounded-lg text-custom-marron">
                <img class="w-full rounded-lg mb-4" src="{{ Storage::url('images/dejeuner.jpg') }}" alt="Déjeuner">
                <div class="text-lg font-bold text-center mb-2">{{ $dejeuner->type }} </div>
                <div class="flex flex-col md:flex-row md:space-x-4 mb-2">
                    <div class="text-lg mb-2 md:mb-0">
                        <span class="font-semibold">Adulte:</span>
                        <span>{{ $dejeuner->prix_adulte }} €</span>
                    </div>
                    <div class="text-lg">
                        <span class="font-semibold">Enfant:</span>
                        <span>{{ $dejeuner->prix_enfant }} €</span>
                    </div>
                </div>
                <div class="text-center">{{ $dejeuner->description }}</div>
            </div>
            
            

            <div class="flex flex-col items-center max-w-xs p-4 rounded-lg text-custom-marron">
                <img class="w-full rounded-lg mb-4" src="{{ Storage::url('images/diner.jpg') }}" alt="Déjeuner">
                <div class="text-lg font-bold text-center mb-2">{{ $diner->type }} </div>
                <div class="flex flex-col md:flex-row md:space-x-4 mb-2">
                    <div class="text-lg mb-2 md:mb-0">
                        <span class="font-semibold">Adulte:</span>
                        <span>{{ $diner->prix_adulte }} €</span>
                    </div>
                    <div class="text-lg">
                        <span class="font-semibold">Enfant:</span>
                        <span>{{ $diner->prix_enfant }} €</span>
                    </div>
                </div>
                <div class="text-center">{{ $diner->description }}</div>
            </div>
    
    </div>
    </div>


    <div class="bg-custom-vert h-screen w-full flex">
       
        <img class="w-[550px] h-full object-cover" src="{{ Storage::url('images/spa.jpg') }}" alt="Massage">
    
        <div class="flex flex-col justify-center px-8 md:px-16 text-center md:text-left">
            <h1 class="text-4xl text-white font-bold mb-4">SPA "Pleine Nature"</h1>
            <hr class="border-t-4 border-custom-beige w-32 mx-auto md:mx-0 mb-6">
    
            <div class="text-justify text-white max-w-lg mx-auto md:mx-0">
                Offrez-vous un instant au cœur de la nature pour vous détendre et vous relaxer dans un espace calme et chaleureux que vous séjournez ou non au domaine.
                Le domaine Tout là-haut vous propose son centre de bien-être Pleine Nature !
                Seul ou en couple venez profitez de soins de qualité pour un moment de qualité. Massages venant des 5 continents pour une parenthèse de bien-être et de ressourcement.
            </div>
        </div>
    </div>

    <div style="background-color:#F9F4EE" class=" h-screen w-full"> 
        
    
    </div>


    @endsection

</body>
</html>