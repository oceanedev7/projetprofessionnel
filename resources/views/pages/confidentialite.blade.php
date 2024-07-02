@extends('layouts.cgv')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tout Là-Haut</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
@section ('titre')
<div class="flex flex-col ">
<h1 class=" ml-12 mt-60 text-6xl text-white font-bold"> POLITIQUE DE <br/> CONFIDENTIALITÉS</h1>
<hr class="border-t-4 border-custom-beige w-32 relative top-6 left-14">
</div>
@endsection



    @section('main')

    <div style="background-color:#F9F4EE" class="w-full">
        <div class="ml-32 mr-32 text-justify p-10">
            <h3 class="text-custom-vert font-bold text-xl">1- Collecte des données personnelles</h3>
            <br/>
            <p>
      Tout Là-Haut collecte des données personnelles des clients lors de la réservation d'un séjour dans nos 
      cabanes en bois. Ces données peuvent inclure le nom, l'adresse, l'adresse e-mail, le numéro de téléphone, 
      ainsi que les informations relatives au paiement.
      </p>
      <br/>

      <h3 class="text-custom-vert font-bold text-xl">2- Utilisation des données personnelles</h3>
      <br/>
      <p>
      Les données personnelles collectées sont utilisées dans le but de traiter les réservations, 
      de fournir les services demandés par les clients, de gérer les paiements et de communiquer 
      avec les clients concernant leur séjour.
      </p>
      <br/>

      <h3 class="text-custom-vert font-bold text-xl">3- Conservation des données personnelles</h3>
      <br/>
      <p>
      Tout Là-Haut conserve les données personnelles des clients aussi longtemps que nécessaire pour atteindre les 
      finalités pour lesquelles elles ont été collectées, notamment pour se conformer à nos obligations légales, 
      résoudre les litiges et faire respecter nos accords.
      </p>
      <br/>

      <h3 class="text-custom-vert font-bold text-xl">4- Protection des données personnelles</h3>
      <br/>
      <p>
      Tout Là-Haut met en place des mesures de sécurité appropriées pour protéger 
      les données personnelles contre tout accès non autorisé, toute utilisation abusive ou toute divulgation.
      </p>
      <br/>

      <h3 class="text-custom-vert font-bold text-xl">5- Partage des données personnelles</h3>
      <br/>
      <p>
      Tout Là-Haut ne partage pas les données personnelles des clients avec des tiers, sauf dans les cas suivants :
      Lorsque cela est nécessaire pour fournir les services demandés par les clients 
      (par exemple, communication avec les prestataires de services tiers pour la gestion des réservations).
      Lorsque cela est requis par la loi ou par une autorité gouvernementale compétente.
      </p>
      <br/>

      <h3 class="text-custom-vert font-bold text-xl">6- Droits des clients</h3>
      <br/>
      <p>
      Les clients ont le droit d'accéder à leurs données personnelles, de les rectifier, 
      de les supprimer ou de limiter leur traitement. Ils peuvent également s'opposer au traitement 
      de leurs données personnelles pour des motifs légitimes. Pour exercer ces droits, les clients 
      peuvent contacter Tout Là-Haut à l'adresse contact@toutlahaut.org.
      </p>
      <br/>

      <h3 class="text-custom-vert font-bold text-xl">7- Modifications de la politique de confidentialité</h3>
      <br/>
      <p>
      Tout Là-Haut se réserve le droit de modifier cette politique de confidentialité à tout moment. 
      Les clients seront informés de toute modification substantielle de cette politique.
      </p>
      <br/>

      <h3 class="text-custom-vert font-bold text-xl">8- Contact</h3>
      <br/>
      <p>
      Pour toute question concernant cette politique de confidentialité, 
      veuillez contacter Tout Là-Haut à l'adresse contact@toutlahaut.org.
      </p>
      <br/>
    </div>
    </div>
    @endsection


</body>
</html>