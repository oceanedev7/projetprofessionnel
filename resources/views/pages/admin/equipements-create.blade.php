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

        <div class="flex space-x-2 hover:underline text-white absolute top-6 left-6"> 
            <i class="fa-solid fa-arrow-left mt-1"></i>
                <a href="{{ route('dashboard') }}" class="font-bold">Revenir au dashboard</a>
        </div>

    <div class="container mx-auto p-8">


        <h1 class="text-3xl font-bold mb-6 text-center text-white uppercase">Gérer les équipements </h1>

        <form method="post" action="{{ route('ajouterEquipement') }}" class="bg-white p-8 rounded-xl shadow-lg mb-8">
            @csrf
            <div class="mb-4">
                <label for="cabane_id" class="block text-lg font-medium mb-2 text-gray-700">Cabane</label>
                <select id="cabane_id" name="cabane_id" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-custom-marron focus:border-custom-marron" required>
                    <option value="" disabled selected>Sélectionnez une cabane</option> 
                    @foreach ($cabanes as $cabane)
                        <option value="{{ $cabane->id }}">{{ $cabane->nomCabane }}</option>
                    @endforeach  
                </select>
                
            </div>
            <div class="mb-4">
                <label for="nomEquipement" class="block text-lg font-medium mb-2 text-gray-700">Équipement</label>
                <input id="nomEquipement" name="nomEquipement" placeholder="Ajoutez un équipement" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-custom-marron focus:border-custom-marron" required/>
            </div>
            <div class="mb-4">
                <label for="categorie" class="block text-lg font-medium mb-2 text-gray-700">Catégorie</label>
                <input id="categorie" name="categorie" placeholder="Ajoutez une catégorie" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-custom-marron focus:border-custom-marron" required/>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-custom-marron text-white px-6 py-3 rounded-md shadow-md">Ajouter</button>
            </div>          
        </form>

        <table class="min-w-full bg-white border border-gray-300 rounded-xl shadow-lg overflow-hidden mb-8">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="py-3 px-6 text-left">Cabane</th>
                    <th class="py-3 px-6 text-left">Équipements</th>
                    <th class="py-3 px-6 text-left">Catégorie</th>
                    <th class="py-3 px-6 text-center">Modifier</th>
                    <th class="py-3 px-6 text-center">Supprimer</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($equipements as $equipement)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-4 px-6">{{ $equipement->cabane->nomCabane }}</td>
                    <td class="py-4 px-6">{{ $equipement->nomEquipement }}</td>
                    <td class="py-4 px-6">{{ $equipement->categorie }}</td>
                    <td class="py-4 px-6 text-center"><a href="{{ route('editerEquipement', $equipement->id ) }}" class="text-blue-500 hover:text-blue-700 transition"><i class="fa-solid fa-pencil"></i></a></td>
                    <td class="py-4 px-6 text-center"><a href="{{ route('supprimerEquipement', $equipement->id) }}" class="text-red-500 hover:text-red-700 transition"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
    </div>
</body>
</html>