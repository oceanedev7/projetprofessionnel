@extends('layouts.cgv')

@section('title', __('content.plan-site'))


@section ('titre')

<h1 class=" relative top-24 left-40 text-4xl text-white font-bold"> PLAN DU SITE </h1>
<hr class="border-t-4 border-custom-beige w-24 relative top-36 right-20">

<div class="relative top-44 right-32 text-white flex flex-col space-y-4 text-base">
    <a href="{{ route('accueil') }}" >ACCUEIL</a>
    <a href="{{ route('noscabanes') }}" >LES CABANES</a>
    <a href="{{ route('prestations') }}" >PRESTATIONS ET SERVICES</a>
    <a href="{{ route('reserver') }}" >RÉSERVER</a>
    <a href="{{ route('contact') }}" >CONTACT & ACCÈS</a>
    <a href="{{ route('mentionslegales') }}">MENTIONS LÉGALES</a>
    <a href="{{ route('cgv') }}" >CGV</a>
    <a href="{{ route('confidentialite') }}">CONFIDENTIALITÉ</a>
    <a href="{{ route('faq') }}" >FAQ</a>
    <a href="{{ route('plandusite') }}">PLAN DU SITE</a>
</div>
@endsection

    @section('main')

    <div class=" w-full h-screen bg-fixed bg-center bg-cover" alt="Cabane en bois" style="background-image: url('{{ Storage::url('images/plandusite.jpg') }}');"></div>

    @endsection

