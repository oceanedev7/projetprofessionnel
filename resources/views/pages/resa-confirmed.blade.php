<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Réservation confirmée</title>
</head>
<body>
    
    <div class="w-full md:h-screen bg-custom-vert md:flex md:flex-row "> 
        <a href="{{ route('lang.switch', ['lang' => App::getLocale() === 'en' ? 'fr' : 'en']) }}" 
            class="absolute top-8 right-8 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base">
             {{ App::getLocale() === 'en' ? 'FR' : 'EN' }}
         </a>   

        <div class="flex-1">             
            <img class="h-full w-full object-cover" src="{{ Storage::url('images/reservation.jpg') }}" alt="Cabane au bord de l'eau">
        </div>
    
        <div class="flex-1 flex flex-col  items-center justify-center p-12">

        @if (session('success'))
          <div class="alert text-custom-marron py-2 px-2 mb-6 rounded alert-success font-bold bg-white">
             {{ session('success') }}
          </div>
        @endif
                
                <div class="mb-6 "> 
            <div class="text-white space-y-4"> 
                <div class="font-bold text-2xl">{{ __('content.confirmed') }} </div>
                <div class="text-justify">{{ __('content.merci') }} </div>
            </div>
        </div>

        <a class="bg-custom-beige rounded text-white font-bold py-2 px-4" href="{{ route('accueil') }}"> {{ __('content.retour') }} </a>
    
        </div>
    </div>
    
    
</body>
</html>