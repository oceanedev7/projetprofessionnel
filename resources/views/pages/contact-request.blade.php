<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff; 
            border: 2px solid #dddddd; 
            border-radius: 5px; 
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
            padding: 20px;
        }
       
        .info {
            margin-bottom: 15px;
            font-size: 16px; 
        }
        p {
            line-height: 1.5; 
        }
    </style>

</head>
<body>

    <div class="container">
        <h2>Nouvelle demande de contact</h2>
        <div class="info">
            <label><strong>Prénom :</strong></label>
            <span>{{ $data['prenom'] }}</span>
        </div>
        <div class="info">
            <label><strong>Nom :</strong></label>
            <span>{{ $data['nom'] }}</span>
        </div>
        <div class="info">
            <label><strong>Numéro de téléphone :</strong></label>
            <span>{{ $data['numeroTelephone'] }}</span>
        </div>
        <div class="info">
            <label><strong>Email :</strong></label>
            <span>{{ $data['email'] }}</span> 
            <span><strong> (Cliquez ici pour répondre à la demande)</strong></span>
        </div>
        
        <p class="info">
            <label><strong>Message :</strong></label>
            <span>{{ $data['message'] }}</span>
        </p>
    </div>
    
    
</body>
</html>