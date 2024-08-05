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

       <div class="bg-custom-vert relative min-h-screen flex items-center justify-center">
       
        <a href="{{ route('afficherCabane') }}" class="absolute top-4 left-4 text-white underline hover:text-gray-300">← Revenir à la page principale</a>

        <div class="bg-transparent p-8 w-full max-w-lg">
            <h1 class="text-2xl font-bold mb-6 text-white text-center">Modifier une cabane</h1>
            <form method="post" action="{{ route('modifierCabane', $cabane->id) }}" class="space-y-6">
                @csrf
                
                <div>
                    <label for="nomCabane" class="block text-lg font-medium mb-2 text-white">Nom de la cabane</label>
                    <input id="nomCabane" name="nomCabane" value="{{ $cabane->nomCabane }}" placeholder="Ajoutez un nom de cabane..." class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-500" required/>
                </div>

                <div>
                    <label for="description" class="block text-lg font-medium mb-2 text-white">Description</label>
                    <textarea name="description" placeholder="Ajoutez une description..." class="w-full p-4 border border-gray-300 rounded-lg bg-white resize-none focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-150 ease-in-out" rows="4" required>{{ $cabane->description }}</textarea>
                </div>
                
                <div>
                    <label for="capacite" class="block text-lg font-medium mb-2 text-white">Capacité</label>
                    <select id="capacite" name="capacite" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        <option value="2" {{ $cabane->capacite == 2 ? 'selected' : '' }}>2 pers.</option>
                        <option value="4" {{ $cabane->capacite == 4 ? 'selected' : '' }}>4 pers.</option>
                        <option value="6" {{ $cabane->capacite == 6 ? 'selected' : '' }}>6 pers.</option>
                    </select>
                </div>

                <div>
                    <label for="prix" class="block text-lg font-medium mb-2 text-white">Prix</label>
                    <input id="prix" name="prix" value="{{ $cabane->prix }}" placeholder="Ajoutez un prix..." class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-500" required/>
                </div>

                <div>
                    <label for="disponibilite" class="block text-lg font-medium mb-2 text-white">Disponibilité</label>
                    <select id="disponibilite" name="disponibilite" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        <option value="1" {{ $cabane->disponibilite == 1 ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ $cabane->disponibilite == 0 ? 'selected' : '' }}>Non</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-custom-marron text-white px-6 py-3 rounded-md shadow-md">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</body>


</html>