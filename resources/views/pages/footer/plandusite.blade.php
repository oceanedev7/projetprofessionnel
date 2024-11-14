@extends('layouts.cgv')

@section('title', __('content.plan-site'))


@section ('titre')

<h1 class="relative md:top-24 md:left-40 text-4xl text-white font-bold uppercase mt-24 md:mt-0 text-center"> {{ __('content.plan-site') }} </h1>
<hr class="hidden md:block border-t-4 border-custom-beige w-24 relative top-36 right-20">

<div class="relative md:top-44 md:right-32 text-white flex flex-col space-y-4 text-base uppercase p-8 md:p-0 md:text-left text-center">
    <a href="{{ route('accueil') }}" >{{ __('content.accueil') }}</a>
    <a href="{{ route('noscabanes') }}" >{{ __('content.cabane') }}</a>
    <a href="{{ route('prestations') }}" >{{ __('content.prestation') }}</a>
    <a href="{{ route('reserver') }}" >{{ __('content.reserver') }}</a>
    <a href="{{ route('contact') }}" >{{ __('content.contactez-nous') }}</a>
    <a href="{{ route('mentionslegales') }}">{{ __('content.mention') }}</a>
    <a href="{{ route('cgv') }}" >{{ __('content.cgv') }}</a>
    <a href="{{ route('confidentialite') }}">{{ __('content.data') }}</a>
    <a href="{{ route('faq') }}" >FAQ</a>
    <a href="{{ route('plandusite') }}">{{ __('content.plan-site') }}</a>
</div>
@endsection

    @section('main')

    <div class=" w-full h-screen bg-fixed bg-center bg-cover" alt="Cabane en bois" style="background-image: url('{{ Storage::url('images/plandusite.jpg') }}');"></div>

    @endsection

