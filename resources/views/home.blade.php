@extends('layouts.app')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>


@section('title', 'Accueil')

@section('navbar')
<div class="absolute top-4 left-4 z-10"> 
    <button class="bg-custom-vert bg-opacity-90 text-white py-2.5 px-3 border-none rounded-md w-12 text-base"> <i class="fa-solid fa-bars"></i> </button>
    <button class="bg-gray-400 bg-opacity-65  text-white py-3 px-4 font-bold border-none rounded w-12 tracking-wide text-sm"> EN </button> 
    <button class="bg-custom-vert bg-opacity-90 tracking-widest text-white py-3 px-4 border-none rounded w-30 font-semibold text-sm"> RÉSERVER </button>  
</div>
@endsection

@section('main')


<div class="w-full h-screen bg-black"> 
    <video autoplay muted loop class="w-full h-screen object-cover opacity-50">
        <source src="{{ Storage::url('videos/videoaccueil.mp4') }}" type="video/mp4">
    </video>

                    <div class=" absolute top-10 left-1/2 transform -translate-x-1/2 "> 
                        <img class="w-64 h-64" src="{{ Storage::url('images/logoaccueil.png') }}" alt="Logo Footer"> 
                    </div>

                        <div class="absolute left-64  top-72 text-white font-bold text-center text-2xl"> 
                            Vivez une expérience authentique et ressourçante, <br/> où chaque moment devient une aventure au cœur de la nature 
                        <div class="mx-28 mt-2 text-white font-light text-center text-base tracking-widest"> HÉBERGEMENT INSOLITE POUR UN SÉJOUR EN MARTINIQUE </div>
    
 
                    </div> 
                    
                                 
</div>




{{-- <div className="presentDomaine">

    <span className="titreDomaine"> LE DOMAINE </span>

     <div className="ligneHorizontale"></div>

     <div className="textDomaineContainer"> 
         <p className="textDomaine">  
        Tout là-haut vous propose son domaine éco-responsable situé sur la commune du Morne-Vert.
        Tout là-haut vous accueille  dans un cadre chaleureux au cœur de la nature verdoyante 
        du Nord de la Martinique. Prenez de la hauteur et depuis votre cabane observez les richesses de l’île aux milles merveilles.
        Un domaine regroupant 4 cabanes plus authentiques les unes que les autres nichées au cœur des arbres dans un cadre de nature tropicale.
         </p> 
     </div>
            
<span className="engagement"> Nos engagements </span>
                     <div className="textEngagementContainer">
                     <p className="textEngagement">  
                           Notre domaine s'engage fermement dans une démarche éco-responsable, notamment en ce qui concerne la gestion des déchets, de l'énergie et de l'eau. 
                          Nous favorisons le tri sélectif et le recyclage, réduisant ainsi notre empreinte écologique. 
                          Nous privilégions les sources renouvelables et avons mis en place des dispositifs d'économie d'énergie pour minimiser notre impact environnemental. 
                         De plus, nous avons adopté des pratiques de gestion de l'eau visant à limiter notre consommation et à préserver cette ressource précieuse. 
                      </p> 
                      </div>
</div> --}}
@endsection

  
     
</body>
</html>