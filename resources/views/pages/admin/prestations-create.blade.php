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
<body>


    <div class="bg-custom-vert"> 

        <div class="flex space-x-2 hover:underline text-white absolute top-6 left-6"> 
            <i class="fa-solid fa-arrow-left mt-1"></i>
                <a href="{{ route('dashboard') }}" class="font-bold">Revenir au dashboard</a>
        </div>

    <div class="container mx-auto p-8">

        <h1 class="text-3xl font-bold mb-6 text-center text-white uppercase">Gérer les prestations</h1>
     
       <form action="{{ route('ajouterCategorie') }}" method="POST" class="bg-white p-8 rounded-xl shadow-lg mb-8">
        @csrf
        <div>
            <label class="block text-lg font-medium mb-2 ">Ajouter une catégorie :</label>
            <input placeholder="Ajoutez une catégorie"  class="w-full p-3 border border-custom-marron rounded-md focus:ring-2 focus:ring-custom-marron focus:border-custom-marron" name="new_categorie" required>
        </div>
        
        <div class="flex justify-end">
            <button type="submit" class="bg-custom-marron text-white px-6 py-3 rounded-md shadow-md mt-4">Ajouter</button>
        </div> 
    </form>
        
        <form method="post" action="{{ route('ajouterPrestation') }}" class="bg-white p-8 rounded-xl shadow-lg mb-8">
            @csrf
            
            <div class="mb-4">
                <label for="categorie_id" class="block text-lg font-medium mb-2 ">Catégorie</label>
                <select id="categorie_id" name="categorie_id" class="w-full p-3 border border-custom-marron rounded-md focus:ring-2 focus:ring-custom-marron focus:border-custom-marron" required>
                    <option value="">Sélectionnez une catégorie</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->type }}</option>
                    @endforeach
                </select>
           
            </div>
            <div class="mb-4">
                <label  class="block text-lg font-medium mb-2 ">Nom de la prestation</label>
                <input id="type" name="type" placeholder="Ajoutez un nom" class="w-full p-3 border border-custom-marron rounded-md focus:ring-2 focus:ring-custom-marron focus:border-custom-marron" required/>
            </div>
            <div class="mb-4">
                <label for="duree" class="block text-lg font-medium mb-2 ">Durée</label>
                <input id="duree" name="duree" placeholder="Ajoutez une durée" class="w-full p-3 border border-custom-marron rounded-md focus:ring-2 focus:ring-custom-marron focus:border-custom-marron "/>
            </div>
            <div class="mb-4">
                <label for="prix_adulte" class="block text-lg font-medium mb-2 ">Prix Adulte</label>
                <input id="prix_adulte" name="prix_adulte" placeholder="Ajoutez un prix adulte" class="w-full p-3 border border-custom-marron rounded-md focus:ring-2 focus:ring-custom-marron focus:border-custom-marron" required/>
            </div>
            <div class="mb-4">
                <label for="prix_enfant" class="block text-lg font-medium mb-2 ">Prix Enfant</label>
                <input id="prix_enfant" name="prix_enfant" placeholder="Ajoutez un prix enfant" class="w-full p-3 border border-custom-marron rounded-md focus:ring-2 focus:ring-custom-marron focus:border-custom-marron"/>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-lg font-medium mb-2 ">Description</label>
                <textarea id="description" name="description" placeholder="Ajoutez une description..." class="w-full p-3 border border-custom-marron rounded-md focus:ring-2 focus:ring-custom-marron focus:border-custom-marron" required></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-custom-marron text-white px-6 py-3 rounded-md shadow-md">Ajouter</button>
            </div>          
        </form>

        <table class="min-w-full bg-white border border-gray-300 rounded-xl shadow-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="py-3 px-6 text-left">Catégorie</th>
                    <th class="py-3 px-6 text-left">Nom</th>
                    <th class="py-3 px-6 text-left">Durée</th>
                    <th class="py-3 px-6 text-left">Prix Adulte</th>
                    <th class="py-3 px-6 text-left">Prix Enfant</th>
                    <th class="py-3 px-6 text-left">Description</th>
                    <th class="py-3 px-6 text-center">Modifier</th>
                    <th class="py-3 px-6 text-center">Supprimer</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($prestations as $prestation)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-4 px-6">{{ $prestation->categorie->type }}</td>
                    <td class="py-4 px-6">{{ $prestation->type }}</td>
                    <td class="py-4 px-6">{{ $prestation->duree }} min</td>
                    <td class="py-4 px-6">{{ $prestation->prix_adulte }}€</td>
                    <td class="py-4 px-6">{{ $prestation->prix_enfant }}€</td>
                    <td class="py-4 px-6 break-words">{{ $prestation->description }}</td>
                    <td class="py-4 px-6 text-center"><a href="{{ route('editerPrestation', $prestation->id) }}" class="text-blue-500 hover:text-blue-700 transition"><i class="fa-solid fa-pencil"></i></a></td>
                    <td class="py-4 px-6 text-center"><a href="{{ route('supprimerPrestation', $prestation->id) }}" class="text-red-500 hover:text-red-700 transition"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    </div>
</body>
</html>