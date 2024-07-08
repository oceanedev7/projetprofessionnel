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
 
    <h1 class="font-bold">Informations prestations</h1>

<form method="post" action="{{ route('modifierPrestation' , $prestation->id) }}"> 
    @csrf

    <select name="categorie" required>
        
      
      <option value="{{$prestation->id}}">{{$prestation->categorie}}</option>
      {{-- <option value="restauration">Restauration</option>
!     <option value="spa">Spa</option>  --}}
    </select>

      <select name="type" required>
        <option value="">{{$prestation->type}}</option>
        {{-- <option value="dejeuner">Déjeuner</option>
        <option value="diner">Dîner</option> 
        <option value="massageoriental">Massage oriental</option>
        <option value="leshiatsu">Le Shiatsu</option>
        <option value="massagesuedois">Massage suédois</option>
        <option value="massagecalifornien">Massage Californien</option>
        <option value="massagecraniofacial">Le massage cranio facial</option>
        <option value="massageprenatal">Massage prénatal</option> --}}
      </select>

      <input value="{{$prestation->duree}}" placeholder="Ajoutez une durée" name="duree" />
      <input value="{{$prestation->prix}}" placeholder="Ajoutez un prix" name="prix" required />

      <textarea name="description" placeholder="Ajoutez une description..." required>{{$prestation->description}}</textarea>
      <button>Ajouter</button>

</form>
    

</body>
</html>