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


<h1 class="font-bold">Informations cabanes</h1>

<form method="post" action="{{ route('ajouterCabane') }}">
    @csrf
    
<input name="nomCabane" placeholder="Ajoutez un nom de cabane..." required/>
<textarea name="description" placeholder="Ajoutez une description..." ></textarea>

<select name="capacite" required>
    <option value="">---</option>
    <option value="2">2 pers.</option>
    <option value="4">4 pers.</option>
    <option value="6">6 pers.</option>
  </select>

<input name="prix" placeholder="Ajoutez un prix..." required/>

<label >Disponibilité</label>
<select name="disponibilite" required>
    <option value="">---</option>
    <option value="1">Oui</option>
    <option value="0">Non</option>
  </select>

<button>Ajouter </button>
</form>

 <table class="" >
    <thead class="">
      <tr>
        <th >Nom</th>
        <th>Description</th>
        <th>Capacité</th>
        <th>Prix base</th>
        <th>Disponibilité</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
    </thead>

@foreach ($cabanes as $cabane)
{{-- @dd($cabane) --}}
    <tbody>
      <tr>
        <td>{{$cabane->nomCabane}} </td>
        <td> {{$cabane->description}}</td>
        <td> {{$cabane->capacite}} </td>
        <td> {{$cabane->prix}} €</td>
        <td> {{$cabane->disponibilite}}</td>
        <td><a href="{{ route('editerCabane', $cabane->id) }}"><i class="fa-solid fa-pencil"></i></a></td>
        <td><a href="{{ route('supprimerCabane', $cabane->id) }}"><i class="fa-solid fa-trash"></i></a></td>
      </tr>
    </tbody>
    @endforeach
  </table>


  <h1 class="font-bold">Informations équipements</h1>

<form method="post" action="{{ route('ajouterEquipement') }}">
    @csrf
    <select name="cabane_id" required>
        @foreach ($cabanes as $cabane)
            <option value="{{ $cabane->id }}">{{ $cabane->nomCabane }}</option>
        @endforeach  
    </select>
    <input placeholder="Ajoutez un équipement" name="nomEquipement" required/>
    <input placeholder="Ajoutez une catégorie" name="categorie" required/>
    <button>Ajouter</button>
</form>

<table class="border-collapse border border-slate-400">
    <thead>
        <tr>
            <th>Cabane</th>
            <th>Équipements</th>
            <th>Catégorie</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equipements as $equipement)
            <tr>
                <td>{{$equipement->cabane->nomCabane}}</td>
                <td>{{ $equipement->nomEquipement }}</td>
                <td>{{ $equipement->categorie }}</td>
                <td><a href="{{ route('editerEquipement', $equipement->id ) }}"><i class="fa-solid fa-pencil"></i></a></td>
                <td><a href="{{ route('supprimerEquipement', $equipement->id) }}"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
        @endforeach
    </tbody>
</table>


<h1 class="font-bold">Informations prestations</h1>

<form method="post" action="{{ route('ajouterPrestation') }}"> 
    @csrf

    <select name="categorie_id" required>
        <option value="">Sélectionnez une catégorie</option>
        @foreach($categories as $categorie)
            <option value="{{ $categorie->id }}">{{ $categorie->type }}</option>
        @endforeach
    </select>

    <input placeholder="Ajoutez un type" name="type" required />
    <input placeholder="Ajoutez une durée" name="duree" />
    <input placeholder="Ajoutez un prix adulte" name="prix_adulte" required />    
    <input placeholder="Ajoutez un prix enfant" name="prix_enfant" />
    <textarea name="description" placeholder="Ajoutez une description..." required></textarea>
    <button type="submit">Ajouter</button>
</form>

<table class="border-collapse border border-slate-400">
    <thead>
        <tr>
            <th>Catégorie</th>
            <th>Type</th>
            <th>Durée</th>
            <th>Prix Adulte</th>
            <th>Prix Enfant</th>
            <th>Description</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        @foreach($prestations as $prestation)
            <tr>
                <td>{{ $prestation->categorie->type }}</td>
                <td>{{ $prestation->type }}</td>
                <td>{{ $prestation->duree }} min</td>
                <td>{{ $prestation->prix_adulte }}€</td>
                <td>{{ $prestation->prix_enfant }}€</td>
                <td>{{ $prestation->description }}</td>
                <td><a href="{{ route('editerPrestation', $prestation->id) }}"><i class="fa-solid fa-pencil"></i></a></td>
                <td><a href="{{ route('supprimerPrestation', $prestation->id) }}"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
        @endforeach
    </tbody>
</table>


   


</body>
</html>