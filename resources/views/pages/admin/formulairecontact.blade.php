<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Tout Là-Haut</title>
</head>
<body>
    

    <h1> Liste des messages via le formuaire de contact</h1>

    <table class="border-collapse border border-slate-400">
        <thead>
            <tr>
                <th>Visiteurs</th>
                <th>Prénoms</th>
                <th>Noms</th>
                <th>Numéros de téléphone</th>
                <th>Adresses email</th>
                <th>Messages</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody> 
            @foreach ($formulaires as $formulaire)
            <tr>
                <td>{{  $formulaire->visiteur->id }}</td>
                <td>{{ $formulaire->prenom}}</td>
                <td> {{ $formulaire->nom}} </td>  
                <td> {{ $formulaire->numeroTelephone}} </td> 
                <td> {{ $formulaire->email}} </td>
                <td> {{ $formulaire->message}} </td> 
                <td><a href="{{ route('supprimerFormulaire', $formulaire->id) }}"><i class="fa-solid fa-trash"></i></a></td>
            </tr> 
            @endforeach
        </tbody>
    </table>









</body>
</html>