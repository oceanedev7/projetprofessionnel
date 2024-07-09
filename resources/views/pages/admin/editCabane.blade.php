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
    {{-- @dd($cabane->id) --}}
    <div >

    <h1 > Modifier une cabane </h1>
    <form  method="post" action="{{ route('modifierCabane', $cabane->id) }}">
        @csrf
        
    <input name="nomCabane" value="{{$cabane->nomCabane}}" placeholder="Ajoutez un nom de cabane..."/>

    <input     name="description" value="{{$cabane->description}}" placeholder="Ajoutez une description..." class="border"  type="textarea"/>
    
    <select name="capacite" required>
        <option value="2" {{$cabane->capacite === 2 ? 'selected' : ''}}>2 pers.</option>
        <option value="4" {{$cabane->capacite  === 4 ? 'selected' : ''}}>4 pers.</option>
        <option value="6" {{$cabane->capacite === 6 ? 'selected' : ''}}>6 pers.</option>
    </select>

    <input name="prix" value="{{$cabane->prix}}" placeholder="Ajoutez un prix..."/>
    
    <select name="disponibilite">
        <option value="1" {{$cabane->disponibilite  === 1 ? "selected" : ""}}>Oui</option>
        <option value="0" {{$cabane->disponibilite  === 0 ? "selected" : ""}}>Non</option>

      </select>
    <button>Modifier</button>
    </form>
    </div>


</body>
</html>