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

    <form method="post" action="{{ route('modifierPrestation', $prestation->id) }}">
      @csrf
  
      <select name="categorie" required>
          <option value="Restauration" {{ $prestation->categorie === 'Restauration' ? 'selected' : '' }}>Restauration</option>
          <option value="Spa" {{ $prestation->categorie === 'Spa' ? 'selected' : '' }}>Spa</option>
      </select>
  
      <select name="type" required>
          <option value="dejeuner" {{ $prestation->type === 'dejeuner' ? 'selected' : '' }}>Déjeuner</option>
          <option value="diner" {{ $prestation->type === 'diner' ? 'selected' : '' }}>Dîner</option>
          <option value="Massage oriental" {{ $prestation->type === 'Massage oriental' ? 'selected' : '' }}>Massage oriental</option>
          <option value="leshiatsu" {{ $prestation->type === 'leshiatsu' ? 'selected' : '' }}>Le Shiatsu</option>
          <option value="massagesuedois" {{ $prestation->type === 'massagesuedois' ? 'selected' : '' }}>Massage suédois</option>
          <option value="massagecalifornien" {{ $prestation->type === 'Massage Californien' ? 'selected' : '' }}>Massage californien</option>
          <option value="massagecraniofacial" {{ $prestation->type === 'massagecraniofacial' ? 'selected' : '' }}>Le massage cranio facial</option>
          <option value="massageprenatal" {{ $prestation->type === 'massageprenatal' ? 'selected' : '' }}>Massage prénatal</option>
      </select>
  
      <input value="{{ $prestation->duree }}" placeholder="Ajoutez une durée" name="duree" />
      <input value="{{ $prestation->prix }}" placeholder="Ajoutez un prix" name="prix" required />
  
      <textarea name="description" placeholder="Ajoutez une description..." required>{{ $prestation->description }}</textarea>
      <button>Modifier</button>
  </form>
  
</body>
</html>