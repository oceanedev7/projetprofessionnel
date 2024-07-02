
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tout Là-Haut</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    
    <div class="bg-custom-vert h-screen w-full"> 

        <div class="flex flex-col justify-center items-center">
            <span class="font-bold text-white text-[40px] mt-8"> DÉCOUVREZ NOS CABANES </span>
            <hr class="border-t-4 border-custom-beige w-32 relative top-2 ">
        </div>
    
           <div class="justify-items-center grid grid-cols-2 gap-y-6 relative top-12 ">
                <a href="{{ route('cabane1') }}">
                <img class="h-[200px] w-[200px]" src="{{ Storage::url('images/nid.png') }}" alt="Cabane Nid douillet">
                </a>
                <a href="">
                <img class="h-[200px] w-[200px]" src="{{ Storage::url('images/osmose.png') }}" alt="Cabane Osmose ">
                </a>
                <a href="">
                <img class="h-[200px] w-[200px]" src="{{ Storage::url('images/escapade.png') }}" alt="Cabane Escapade">
                </a>
                 <a href="
                 ">
                <img class="h-[200px] w-[200px]" src="{{ Storage::url('images/eden.png') }}" alt="Cabane Eden">
                </a>
             </div> 
    
          
    </div>








</body>
</html>