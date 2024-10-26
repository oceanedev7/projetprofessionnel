<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Réservation</title>
</head>
<body>
    
    <div class="w-full h-screen bg-custom-vert flex"> 

        <div class="flex-1">             
            <img class="h-full w-full object-cover" src="{{ Storage::url('images/reservation.jpg') }}" alt="Cabane menu">
        </div>
    
        <div class="flex-1 flex flex-col  items-center justify-center p-12">

        @if (session('success'))
          <div class="alert text-custom-marron py-2 px-2 mb-6 rounded alert-success font-bold bg-white">
             {{ session('success') }}
          </div>
        @endif
                
                <div class="mb-6 "> 
            <div class="text-white space-y-4"> 
                <div class="font-bold text-2xl">Votre réservation est confirmée !</div>
                <div class="font-semibold text-xl" >Réservation N°</div>
                <div class="text-justify">Merci d'avoir choisi TOUT LÀ-HAUT pour votre séjour. 
                Nous nous réjouissons de vous accueillir au sein de notre domaine et serons à votre disposition tout au long du séjour.</div>
            </div>
        </div>

        <a class="bg-custom-beige rounded text-white font-bold py-2 px-4" href="{{ route('accueil') }}"> Retour à la page d'accueil </a>
    
        </div>
    </div>
    
    
</body>
</html>