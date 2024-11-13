<x-app-layout>
    <x-slot name="header">
        <div class="flex  items-center justify-between"> 
        <h2 class="font-bold text-xl text-custom-vert dark:text-gray-200 leading-tight">
            {{ __('content.profil') }}
        </h2>
        <div class="flex space-x-2 hover:underline"> 
            <i class="fa-solid fa-arrow-right-long mt-1"></i>
            @if (Auth::user() && Auth::user()->role === 'admin')
                <a href="{{ route('dashboard') }}" class="font-bold">Revenir au dashboard</a>
            @else
                <a href="{{ route('accueil') }}" class="font-bold">Revenir à la page d'accueil</a>
            @endif
        </div>
        
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
