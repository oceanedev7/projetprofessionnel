<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Tout Là-Haut</title>

</head>
<body >

    <div class="bg-custom-vert">

        <div class="flex space-x-2 hover:underline underline-white text-white absolute top-6 left-6"> 
            <i class="fa-solid fa-arrow-left mt-1 "></i>
                <a href="{{ route('dashboard') }}" class="font-bold ">Revenir au dashboard</a>
        </div>

    <div class="container mx-auto p-8">

        <h1 class="text-3xl font-bold mb-6 text-center text-white uppercase">Gérer les cabanes </h1>
        
        <form method="post" action="{{ route('ajouterCabane') }}" class="bg-white p-8 rounded-xl shadow-lg mb-8">
            @csrf
            <div class="mb-4">
                <label for="nomCabane" class="block text-lg font-medium mb-2 text-gray-700">Nom de la cabane</label>
                <input id="nomCabane" name="nomCabane" placeholder="Ajoutez un nom de cabane..." class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-custom-marron focus:border-custom-marron" required/>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-lg font-medium mb-2 text-gray-700">Description</label>
                <textarea id="description" name="description" placeholder="Ajoutez une description..." class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-custom-marron focus:border-custom-marron"></textarea>
            </div>
            <div class="mb-4">
                <label for="capacite" class="block text-lg font-medium mb-2 text-gray-700">Capacité</label>
                <select id="capacite" name="capacite" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-custom-marron focus:border-custom-marron" required>
                    <option value="">---</option>
                    <option value="2">2 pers.</option>
                    <option value="4">4 pers.</option>
                    <option value="6">6 pers.</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="prix" class="block text-lg font-medium mb-2 text-gray-700">Prix</label>
                <input id="prix" name="prix" placeholder="Ajoutez un prix..." class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-custom-marron focus:border-custom-marron" required/>
            </div>
            <div class="mb-4">
                <label for="disponibilite" class="block text-lg font-medium mb-2 text-gray-700">Disponibilité</label>
                <select id="disponibilite" name="disponibilite" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-custom-marron focus:border-custom-marron" required>
                    <option value="">---</option>
                    <option value="1">Oui</option>
                    <option value="0">Non</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-custom-marron text-white px-6 py-3 rounded-md shadow-md">Ajouter</button>
            </div>        
        </form>

        <table class="min-w-full bg-white border border-gray-300 rounded-xl shadow-lg overflow-hidden mb-8">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="py-3 px-6 text-left">Nom</th>
                    <th class="py-3 px-6 text-left">Description</th>
                    <th class="py-3 px-6 text-left">Capacité</th>
                    <th class="py-3 px-6 text-left">Prix base</th>
                    <th class="py-3 px-6 text-left">Disponibilité</th>
                    <th class="py-3 px-6 text-center">Modifier</th>
                    <th class="py-3 px-6 text-center">Supprimer</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($cabanes as $cabane)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-4 px-6">{{$cabane->nomCabane}}</td>
                    <td class="py-4 px-6">{{$cabane->description}}</td>
                    <td class="py-4 px-6">{{$cabane->capacite}}</td>
                    <td class="py-4 px-6">{{$cabane->prix}} €</td>
                    <td class="py-4 px-6">{{$cabane->disponibilite ? 'Oui' : 'Non'}}</td>
                    <td class="py-4 px-6 text-center"><a href="{{ route('editerCabane', $cabane->id) }}" class="text-blue-500 hover:text-blue-700 transition"><i class="fa-solid fa-pencil"></i></a></td>
                    <td class="py-4 px-6 text-center"><a href="{{ route('supprimerCabane', $cabane->id) }}" class="text-red-500 hover:text-red-700 transition"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    
    </div>

    </div>

</body>
</html>