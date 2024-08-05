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
        
        <div class="bg-custom-vert min-h-screen relative min-h-screen flex items-center justify-center">
           
            <a href="{{ route('afficherCabane') }}" class="absolute top-4 left-4 text-white underline hover:text-gray-300">← Revenir à la page principale</a>
    
            
            <div class="bg-transparent p-8 w-full max-w-lg">
                <h1 class="text-2xl font-bold mb-6 text-white text-center">Modifier un équipement</h1>
                <form method="post" action="{{ route('modifierEquipement', $equipement->id) }}" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="cabane_id" class="block text-lg font-medium mb-2 text-white">Cabane</label>
                        <select name="cabane_id" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-500" required>
                            @foreach ($cabanes as $cabane)
                                <option value="{{ $cabane->id }}" {{ $equipement->cabane_id == $cabane->id ? 'selected' : '' }}>{{ $cabane->nomCabane }}</option>
                            @endforeach  
                        </select>
                    </div>
    
                    <div>
                        <label for="nomEquipement" class="block text-lg font-medium mb-2 text-white">Nom de l'équipement</label>
                        <input name="nomEquipement" value="{{ $equipement->nomEquipement }}" placeholder="Ajoutez un équipement" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-500" required/>
                    </div>
    
                    <div>
                        <label for="categorie" class="block text-lg font-medium mb-2 text-white">Catégorie</label>
                        <input  name="categorie" value="{{ $equipement->categorie }}" placeholder="Ajoutez une catégorie" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-green-500" required/>
                    </div>
    
                    <div class="text-center">
                        <button type="submit" class="bg-custom-marron text-white px-6 py-3 rounded-md shadow-md">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    
</body>
</html>