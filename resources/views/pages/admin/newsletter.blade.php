<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Tout Là-Haut</title>
</head>
<body>
  
        <a href="{{route('dashboard')}}" class="hover:underline flex space-x-2 absolute top-6 left-12"> 
            <i class="fa-solid fa-arrow-left mt-1.5"></i>
            <div class="font-bold"> Revenir au dashboard </div>
        </a> 
        
        <div class="p-12">

    <h1 class="text-2xl font-black mb-4 text-center uppercase text-custom-vert">Liste d'inscription à la newsletter</h1>

    <table class=" min-w-full bg-white border-collapse shadow-lg rounded-lg overflow-hidden mx-auto px-2">
        <thead class="bg-custom-vert text-white uppercase text-sm leading-normal">
            <tr>
                <th class="py-3 px-6 text-left">Visiteurs</th>
                <th class="py-3 px-6 text-left">Adresses e-mail</th>
                <th class="py-3 px-6 text-left">Dates d'inscription</th>
                <th class="py-3 px-6 text-center">Supprimer</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($newsletters as $newsletter)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left whitespace-nowrap">
                    <div class="flex items-center">
                        <span class="font-medium">{{ $newsletter->id }}</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-left">
                    <span>{{ $newsletter->email }}</span>
                </td>
                <td class="py-3 px-6 text-left">
                    <span>{{ $newsletter->created_at->format('d/m/y') }}</span>
                </td>
                <td class="py-3 px-6 text-center">
                    <a href="{{ route('supprimerEmail', $newsletter->id) }}" class="text-red-600 hover:text-red-800">
                        <i class="fa-solid fa-trash text-lg"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>