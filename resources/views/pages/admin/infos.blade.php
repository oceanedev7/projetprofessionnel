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
<body class="bg-custom-vert">

    <div class="container mx-auto p-8">

        <h1 class="text-3xl font-bold mb-6 text-center text-white">Informations Cabanes</h1>
        
        <form method="post" action="{{ route('ajouterCabane') }}" class="bg-white p-8 rounded-xl shadow-lg mb-8">
            @csrf
            <div class="mb-4">
                <label for="nomCabane" class="block text-lg font-medium mb-2 text-gray-700">Nom de la cabane</label>
                <input id="nomCabane" name="nomCabane" placeholder="Ajoutez un nom de cabane..." class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required/>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-lg font-medium mb-2 text-gray-700">Description</label>
                <textarea id="description" name="description" placeholder="Ajoutez une description..." class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
            </div>
            <div class="mb-4">
                <label for="capacite" class="block text-lg font-medium mb-2 text-gray-700">Capacité</label>
                <select id="capacite" name="capacite" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    <option value="">---</option>
                    <option value="2">2 pers.</option>
                    <option value="4">4 pers.</option>
                    <option value="6">6 pers.</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="prix" class="block text-lg font-medium mb-2 text-gray-700">Prix</label>
                <input id="prix" name="prix" placeholder="Ajoutez un prix..." class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required/>
            </div>
            <div class="mb-4">
                <label for="disponibilite" class="block text-lg font-medium mb-2 text-gray-700">Disponibilité</label>
                <select id="disponibilite" name="disponibilite" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
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

        <h1 class="text-3xl font-bold mb-6 text-center text-white">Informations Équipements</h1>

        <form method="post" action="{{ route('ajouterEquipement') }}" class="bg-white p-8 rounded-xl shadow-lg mb-8">
            @csrf
            <div class="mb-4">
                <label for="cabane_id" class="block text-lg font-medium mb-2 text-gray-700">Cabane</label>
                <select id="cabane_id" name="cabane_id" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    @foreach ($cabanes as $cabane)
                        <option value="{{ $cabane->id }}">{{ $cabane->nomCabane }}</option>
                    @endforeach  
                </select>
            </div>
            <div class="mb-4">
                <label for="nomEquipement" class="block text-lg font-medium mb-2 text-gray-700">Équipement</label>
                <input id="nomEquipement" name="nomEquipement" placeholder="Ajoutez un équipement" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required/>
            </div>
            <div class="mb-4">
                <label for="categorie" class="block text-lg font-medium mb-2 text-gray-700">Catégorie</label>
                <input id="categorie" name="categorie" placeholder="Ajoutez une catégorie" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required/>
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

        <h1 class="text-3xl font-bold mb-6 text-center text-white">Informations Prestations</h1>

        <form method="post" action="{{ route('ajouterPrestation') }}" class="bg-white p-8 rounded-xl shadow-lg mb-8">
            @csrf
            <div class="mb-4">
                <label for="categorie_id" class="block text-lg font-medium mb-2 text-gray-700">Catégorie</label>
                <select id="categorie_id" name="categorie_id" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    <option value="">Sélectionnez une catégorie</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="type" class="block text-lg font-medium mb-2 text-gray-700">Type</label>
                <input id="type" name="type" placeholder="Ajoutez un type" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required/>
            </div>
            <div class="mb-4">
                <label for="duree" class="block text-lg font-medium mb-2 text-gray-700">Durée</label>
                <input id="duree" name="duree" placeholder="Ajoutez une durée" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"/>
            </div>
            <div class="mb-4">
                <label for="prix_adulte" class="block text-lg font-medium mb-2 text-gray-700">Prix Adulte</label>
                <input id="prix_adulte" name="prix_adulte" placeholder="Ajoutez un prix adulte" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required/>
            </div>
            <div class="mb-4">
                <label for="prix_enfant" class="block text-lg font-medium mb-2 text-gray-700">Prix Enfant</label>
                <input id="prix_enfant" name="prix_enfant" placeholder="Ajoutez un prix enfant" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"/>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-lg font-medium mb-2 text-gray-700">Description</label>
                <textarea id="description" name="description" placeholder="Ajoutez une description..." class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-custom-marron text-white px-6 py-3 rounded-md shadow-md">Ajouter</button>
            </div>          
        </form>

        <table class="min-w-full bg-white border border-gray-300 rounded-xl shadow-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="py-3 px-6 text-left">Catégorie</th>
                    <th class="py-3 px-6 text-left">Type</th>
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
                    <td class="py-4 px-6">{{ $prestation->description }}</td>
                    <td class="py-4 px-6 text-center"><a href="{{ route('editerPrestation', $prestation->id) }}" class="text-blue-500 hover:text-blue-700 transition"><i class="fa-solid fa-pencil"></i></a></td>
                    <td class="py-4 px-6 text-center"><a href="{{ route('supprimerPrestation', $prestation->id) }}" class="text-red-500 hover:text-red-700 transition"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>