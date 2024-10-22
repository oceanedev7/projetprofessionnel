<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    
    <div class="bg-custom-vert h-screen w-full">
        <button id="retour" class="absolute top-6 left-8 bg-gray-400 bg-opacity-65 text-white py-2.5 px-4 font-bold border-none rounded w-12 tracking-wide text-base"> X </button>
        <a href="{{ route('reserver') }}" class="absolute top-6 right-8 bg-gray-400 bg-opacity-65  md:bg-custom-vert md:bg-opacity-90 tracking-widest text-white py-3 px-4 border-none rounded w-30 font-semibold text-sm uppercase"> {{ __('content.reserver') }} </a>
        
        <div class="md:flex md:h-screen">
            <div class="bg-custom-vert flex flex-col items-center justify-center md:w-1/2">
                
                <div class="flex justify-center md:relative md:bottom-8"> 
                    <img class="h-[250px] w-[250px] max-w-full object-contain" src="{{ Storage::url('images/logomenu.png') }}" alt="Logo menu">
                </div>
                
                <div class="flex flex-col space-y-4 md:space-y-6 md:text-xl text-lg text-white font-bold  md:relative md:bottom-14"> 
                    <a class="uppercase" href="{{ route('accueil') }}">{{ __('content.accueil') }}</a>
                    <a class="uppercase" href="{{ route('noscabanes') }}">{{ __('content.cabane') }}</a>
                    <a class="uppercase" href="{{ route('prestations') }}">{{ __('content.prestation') }}</a>
                    <a class="uppercase" href="{{ route('reserver') }}">{{ __('content.reserver') }}</a>
                    <a class="uppercase" href="{{ route('contact') }}">{{ __('content.acces-menu') }}</a>
                </div>
                
                <div class="flex space-x-4 md:p-0 p-6 md:relative md:bottom-6 md:mr-20">
                    <a href="{{ route('lang.switch', ['lang' => App::getLocale() === 'en' ? 'fr' : 'en']) }}" class="bg-gray-400 bg-opacity-65 text-white py-3.5 px-4 font-bold border-none rounded w-12 tracking-wide text-base flex items-center justify-center">
                        {{ App::getLocale() === 'en' ? 'FR' : 'EN' }}
                    </a>
        
                    <a href="https://www.facebook.com" class="bg-gray-400 bg-opacity-65 text-white py-3.5 px-4 font-bold border-none rounded w-12 tracking-wide text-base text-center">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
        
                    <a href="https://www.instagram.com" class="bg-gray-400 bg-opacity-65 text-white py-3.5 px-4 font-bold border-none rounded w-12 tracking-wide text-base text-center">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>
        
            <div class="md:h-screen md:w-1/2 md:flex md:justify-end">
                <img class="hidden  md:block w-[700px] md:h-screen" src="{{ Storage::url('images/cabanemenu.jpg') }}" alt="Cabane menu">
            </div>
        </div>
        
        
    </div>
    
   
    
    
</body>
</html>