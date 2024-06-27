<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tout Là-Haut')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

 <nav>
    @yield('navbar')
</nav>

    <main>
        @yield('main')
    </main>

    <footer style="background-color: #536D37" class="max-h-300px w-full text-white py-6 flex flex-wrap ">
            {{-- Logo footer --}}
            <img class="h-72 w-72 ml-4" src="{{ Storage::url('images/logofooter.png') }}" alt="Logo Footer">

            <hr class="border-r h-60 mx-6 my-auto">

            
            {{-- Contact --}}
            <div class=" ml-4 flex flex-col mt-16">
                <div class="font-bold text-base mb-2 ml-6">Contact & Accès</div>
                        
                    <div class="flex items-center mb-2">
                        <div class="w-8 h-8 bg-custom-beige bg-opacity-65 rounded-md text-white text-base flex items-center justify-center mr-2">
                          <i class="fa-solid fa-location-dot"></i> 
                        </div>
                        <div class="text-sm"> Route de Jolimont, 97226 Morne-Vert</div>
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
    
            {{-- Réseaux sociaux --}}
             <div class="flex flex-col ml-20 mt-16">
                <div class="font-bold text-base mb-2">Suivez-nous</div> 
             <div class="flex flex-row">   
                <div class=" w-8 h-8 bg-white bg-opacity-30 rounded-md text-white text-xl flex items-center justify-center mr-2">
                    <i class="fa-brands fa-facebook-f"></i>
                </div>
                <div class=" w-8 h-8 bg-white bg-opacity-30 rounded-md text-white text-xl flex items-center justify-center ">
                    <i class="fa-brands fa-instagram "></i>
                </div>
            </div>
        </div>

    
            {{-- Newsletter --}}
            <div class="flex-1 flex flex-col items-center text-center ml-16 mt-16">
                <div class="font-bold text-base">Newsletter</div>
                <hr style="background-color: #C4AA84" class="w-14 h-1 my-2">
                <div class="mb-2 text-sm font-normal">Ne passez pas à côté de nos meilleures offres</div>
                <input class=" bg-opacity-40 bg-white px-4 py-2  mb-4 border-none rounded-md h-8 w-72 text-center placeholder-white " placeholder="Adresse e-mail" />
                <button style="background-color: #C4AA84" class="text-white font-bold text-base px-6 py-1 rounded-md">S'inscrire</button>
            </div>
          
    
            {{-- Liens des informations obligatoires --}}
            <div class="text-sm text-white mt-8 space-x-28 mx-auto max-w-7xl flex justify-center">
                <a href="Mentionslegales" >Mentions légales</a>
                <a href="Cgv" >CGV</a>
                <a href="Confidentialite" >Confidentialité</a>
                <a href="Faq" >FAQ</a>
                <a href="Plandusite">Plan du site</a>
            </div>
        
    </footer>
    
</body>
</html>
