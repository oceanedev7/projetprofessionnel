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
        <a href="{{ route('afficherCabane') }}" class="absolute top-4 left-4 text-white underline">← Revenir à la liste des prestations</a>
        
        <div class="bg-transparent p-8 w-full max-w-lg">
            <h1 class="text-2xl font-bold mb-6 text-white text-center">Modifier une prestation</h1>
            <form method="post" action="{{ route('modifierPrestation', $prestation->id) }}" class="space-y-6">
                @csrf
                
                <div>
                    <label for="categorie_id" class="block text-lg font-medium mb-2 text-white">Catégorie</label>
                    <select id="categorie_id" name="categorie_id" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:ring-2 focus:ring-custom-marron focus:border-custom-marron" required>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}" {{ $prestation->categorie_id == $categorie->id ? 'selected' : '' }}>
                                {{ $categorie->type }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="type" class="block text-lg font-medium mb-2 text-white">Type</label>
                    <input id="type" name="type" value="{{ $prestation->type }}" placeholder="Ajoutez un type" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:ring-2 focus:ring-custom-marron focus:border-custom-marron" required/>
                </div>

                <div>
                    <label for="duree" class="block text-lg font-medium mb-2 text-white">Durée</label>
                    <input id="duree" name="duree" value="{{ $prestation->duree }}" placeholder="Ajoutez une durée" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:ring-2 focus:ring-custom-marron focus:border-custom-marron" required/>
                </div>

                <div>
                    <label for="prix_adulte" class="block text-lg font-medium mb-2 text-white">Prix Adulte</label>
                    <input id="prix_adulte" name="prix_adulte" value="{{ $prestation->prix_adulte }}" placeholder="Ajoutez un prix adulte" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:ring-2 focus:ring-custom-marron focus:border-custom-marron" required/>
                </div>

                <div>
                    <label for="prix_enfant" class="block text-lg font-medium mb-2 text-white">Prix Enfant</label>
                    <input id="prix_enfant" name="prix_enfant" value="{{ $prestation->prix_enfant }}" placeholder="Ajoutez un prix enfant" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:ring-2 focus:ring-custom-marron focus:border-custom-marron"/>
                </div>

                <div>
                    <label for="description" class="block text-lg font-medium mb-2 text-white">Description</label>
                    <textarea id="description" name="description" placeholder="Ajoutez une description..." class="w-full p-4 border border-gray-300 rounded-lg bg-white resize-none ffocus:ring-2 focus:ring-custom-marron focus:border-custom-marron transition duration-150 ease-in-out" rows="4" required>{{ $prestation->description }}</textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-custom-marron text-white px-6 py-3 rounded-md shadow-md">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</body>


</html>