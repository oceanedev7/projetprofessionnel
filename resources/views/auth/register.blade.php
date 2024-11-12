  <a href="login" class="absolute top-6 left-6 text-white hover:underline"> 
    <i class="fa-solid fa-arrow-left"></i> 
    Retour à la page de connexion 
</a>

<a href="{{ route('lang.switch', ['lang' => App::getLocale() === 'en' ? 'fr' : 'en']) }}" 
    class="absolute top-8 right-8 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base">
     {{ App::getLocale() === 'en' ? 'FR' : 'EN' }}
 </a> 

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
    
        <!-- Prénom -->
        <div>
            <x-input-label for="prenom" :value="__('content.prenom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>
    
        <!-- Nom -->
        <div class="mt-4">
            <x-input-label for="nom" :value="__('content.nom')" />
            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>
    
        <!-- Téléphone -->
        <div class="mt-4">
            <x-input-label for="telephone" :value="__('content.telephone')" />
            <x-text-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" required />
            <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
        </div>
    
        <!-- Adresse Postale -->
        <div class="mt-4">
            <x-input-label for="adresse_postale" :value="__('content.adresse-postale')" />
            <x-text-input id="adresse_postale" class="block mt-1 w-full" type="text" name="adresse_postale" :value="old('adresse_postale')" required />
            <x-input-error :messages="$errors->get('adresse_postale')" class="mt-2" />
        </div>
    
        <!-- Code Postal -->
        <div class="mt-4">
            <x-input-label for="code_postal" :value="__('content.code')" />
            <x-text-input id="code_postal" class="block mt-1 w-full" type="text" name="code_postal" :value="old('code_postal')" required />
            <x-input-error :messages="$errors->get('code_postal')" class="mt-2" />
        </div>
    
        <!-- Ville -->
        <div class="mt-4">
            <x-input-label for="ville" :value="__('content.ville')" />
            <x-text-input id="ville" class="block mt-1 w-full" type="text" name="ville" :value="old('ville')" required />
            <x-input-error :messages="$errors->get('ville')" class="mt-2" />
        </div>
    
        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('content.email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
    
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('content.mdp')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
    
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('content.mdp_confirm')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
    
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('content.register') }}
            </a>
    
            <x-primary-button class="ms-4">
                {{ __('content.inscription') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
