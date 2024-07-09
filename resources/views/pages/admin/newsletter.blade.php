<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tout Là-Haut</title>
</head>
<body>
    <h1> Liste d'inscription à la newsletter</h1>

    <table class="border-collapse border border-slate-400">
        <thead>
            <tr>
                <th>Visiteurs</th>
                <th>Adresses e-mail</th>
                <th>Dates d'inscription </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                 {{-- <td>{{ $newsletter_id }}</td>
                <td>{{ $email }}</td>
                <td> {{ {{ $createdAt->format('d/m/Y H:i:s') }} }}</td> --}}
            </tr>
        </tbody>
    </table>
</body>
</html>