 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title')</title>
</head>
<body>

 <nav>
    @yield('navbar')
</nav>

    <main>
        @yield('main')
    </main>
    
 
      <footer style="background-color: #536D37" class="md:max-h-300px w-full text-white md:py-6 md:flex md:flex-row md:flex-wrap flex flex-col">
            {{-- Logo footer --}} 
             <div class="flex justify-center">
                <img class="h-72 w-72 md:ml-4" src="{{ Storage::url('images/logofooter.png') }}" alt="Logo Footer">
              </div>

            <hr class="hidden md:block md:border-r md:h-60 md:mx-6 md:my-auto">

           
            {{-- Contact  --}}
             <div class="md:ml-4 flex flex-col md:mt-16 mx-auto md:items-start mb-10 md:mb-0">
                <div class="font-bold text-base mb-2 ml-6">{{ __('content.acces-menu') }}</div>
                        
                    <div class="flex items-center mb-2">
                        <div class="w-8 h-8 bg-custom-beige bg-opacity-65 rounded-md text-white text-base flex items-center justify-center mr-2">
                          <i class="fa-solid fa-location-dot"></i> 
                        </div>
                        <div class="text-sm">Route de Jolimont, 97226 Morne-Vert</div>
                    </div>
               

                <div class="flex items-center mb-2">
                    <div class="w-8 h-8 bg-custom-beige bg-opacity-65 rounded-md text-white text-base flex items-center justify-center mr-2">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="text-sm">0596 67 64 53</div>
                </div>
                
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-custom-beige bg-opacity-65 rounded-md text-white text-base flex items-center justify-center mr-2">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="text-sm">contact@toutlahaut.org</div>
                </div>
            </div>
    
            {{-- Réseaux sociaux  --}}
              <div class="flex flex-col md:ml-20 md:mt-16 md:items-start mx-auto items-center mb-10 md:mb-0">
                <div class="font-bold text-base mb-2">{{ __('content.suivez-nous') }}</div> 
             <div class="flex flex-row">   
                <a href="https://www.facebook.com" class=" w-8 h-8 bg-white bg-opacity-30 rounded-md text-white text-xl flex items-center justify-center mr-2">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com" class="w-8 h-8 bg-white bg-opacity-30 rounded-md text-white text-xl flex items-center justify-center ">
                    <i class="fa-brands fa-instagram "></i>
                </a>
            </div>
            </div>

    
            {{-- Newsletter--}}
             <form method="post" action="{{ route('ajouterNewsletter') }}" class="flex-1 flex flex-col items-center text-center md:ml-16 md:mt-16 mb-10 md:mb-0">               
                 @csrf
                <div class="font-bold text-base">Newsletter</div>
                <hr style="background-color: #C4AA84" class="w-14 h-1 my-2">
                <div class="mb-2 text-sm font-normal">{{ __('content.offre-1') }}</div>
                <input type="email" name="email" class="bg-opacity-40 bg-white px-4 py-2  mb-4 border-none rounded-md h-8 w-72 text-center placeholder-white focus:border-custom-marron focus:ring-custom-marron" placeholder="{{ __('content.email') }}" required />
                <button style="background-color: #C4AA84" class="text-white font-bold text-base px-6 py-1 rounded-md">{{ __('content.inscrire') }}</button>
            @if (session('success'))
            <div class="font-bold">
                 {{ session('success') }}
             </div>
            @endif
            @if(session('error'))
            <div class="font-bold">
                {{ session('error') }}
            </div>
            @endif
            </form> 
    
            {{-- Liens des informations obligatoires --}}
             <div class="text-sm text-white md:mt-8 md:space-x-28 mx-auto max-w-7xl md:flex md:flex-row flex flex-col p-2 md:p-0 items-center justify-center space-y-2 md:space-y-0">
                <a href="{{ route('mentionslegales') }}" >{{ __('content.mention') }}</a>
                <a href="{{ route('cgv') }}" >{{ __('content.cgv') }}</a>
                <a href="{{ route('confidentialite') }}" >{{ __('content.data') }}</a>
                <a href="{{ route('faq') }}" >FAQ</a>
                <a href="{{ route('plandusite') }}">{{ __('content.plan-site') }}</a>
            </div>
            
    </footer>
    
</body>
</html>  