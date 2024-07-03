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

@section ('titre')

<h1 class=" relative top-24 left-40 text-4xl text-white font-bold"> PLAN DU SITE </h1>
<hr class="border-t-4 border-custom-beige w-24 relative top-36 right-20">

<div class="relative top-44 right-32 text-white flex flex-col space-y-4 text-base">
    <a href="{{ route('accueil') }}" >ACCUEIL</a>
    <a href="{{ route('noscabanes') }}" >LES CABANES</a>
    <a href="{{ route('prestations') }}" >PRESTATIONS ET SERVICES</a>
    <a href="{{ route('reserver') }}" >RÉSERVER</a>
    <a href="{{ route('contact') }}" >CONTACT & ACCÈS</a>
    <a href="{{ route('mentionslegales') }}" >MENTIONS LÉGALES</a>
    <a href="{{ route('cgv') }}" >CGV</a>
    <a href="{{ route('confidentialite') }}" >CONFIDENTIALITÉ</a>
    <a href="{{ route('faq') }}" >FAQ</a>
    <a href="{{ route('plandusite') }}">PLAN DU SITE</a>
</div>
@endsection

<body>

    @section('main')

    <div class=" w-full h-screen bg-fixed bg-center bg-cover" alt="Cabane en bois" style="background-image: url('{{ Storage::url('images/plandusite.jpg') }}');"></div>

    @endsection


</body>
</html>