@extends('layouts.cgv')

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

@section ('titre')

<h1 class=" ml-36 mt-60 text-6xl text-white font-bold">  CONTACT <br/> & ACCÈS </h1>
<hr class="border-t-4 border-custom-beige w-24 mt-96 relative right-64">
@endsection
    

@section('main')

<div style="background-color:#F9F4EE" class="w-full h-screen">
    <div class="flex flex-col justify-center items-center">
        <span class="font-bold text-custom-marron text-[40px] mt-12"> CONTACTEZ-NOUS </span>
        <hr class="border-t-4 border-custom-beige w-24 mt-2 ">
    </div>



        <div class="flex flex-col items-center p-6 min-h-screen">
            <div class="w-full max-w-3xl mt-6">
                <div class="grid grid-cols-2 gap-y-6 gap-x-4 mb-6">
                    <input class="rounded border-custom-marron border-solid border-2 py-2 px-4 w-full" placeholder="Prénom" />
                    <input class="rounded border-custom-marron border-solid border-2 py-2 px-4 w-full" placeholder="Nom" />
                    <input class="rounded border-custom-marron border-solid border-2 py-2 px-4 w-full" placeholder="Numéro de téléphone" />
                    <input class="rounded border-custom-marron border-solid border-2 py-2 px-4 w-full" placeholder="Adresse e-mail" />
                </div>
                <div class="flex flex-col items-center">
                    <textarea class="resize-none rounded border-custom-marron border-solid border-2 w-full max-w-3xl p-2" rows="8" placeholder="Message"></textarea>
                    <button class="bg-custom-marron text-white font-medium text-base px-6 py-2 rounded-md mt-4">ENVOYER</button>
                </div>
            </div>
        </div>
</div>




<div style="background-color:#F9F4EE" class="w-full h-screen flex">

    <div style="background-color:#945508" class="h-screen w-2/4"></div>

    <div class="flex flex-col justify-center p-8">
        
        <div class="flex flex-col justify-center items-center">
            <span class="font-bold text-custom-marron text-[40px] ml-28 mb-20 text-center leading-tight">ADRESSE ET <br/> COORDONNÉES</span>
            <hr class="border-t-4 border-custom-beige w-24 relative left-16 bottom-16">
        </div>

        <div class="text-xl ml-24 space-y-10"> 
            <div>
                <span class="text-custom-marron font-bold">Adresse :</span> <br/>
                Route de Jolimont, 97226 Morne-Vert
            </div>
            <div>
                <span class="text-custom-marron font-bold">Numéro de téléphone :</span> <br/>
                0596 67 64 53
            </div>
            <div>
                <span class="text-custom-marron font-bold">Adresse e-mail :</span> <br/>
                contact@toutlahaut.org
            </div>
        </div>
    </div>
    
</div>


@endsection

</body>
</html>