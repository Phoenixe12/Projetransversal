<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse de mail</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        main {
            padding: 20px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .highlight {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h1>Biobanque</h1>
    </header>
    <main>
        <!-- Contenu de votre email ici -->
        <p>Bonjour Mme/Mme <span class="highlight">{{ $details['name'] }}</span>,</p>
        <p>Votre compte biobanque a été créé avec succès. Voici vos informations de connexion :</p>
        <ul>
            <li><span class="highlight">Email :</span> {{ $details['email'] }}</li>
            <li><span class="highlight">Mot de passe :</span> {{ $details['password'] }}</li>
            <li><span class="highlight">Lien vers la page de connexion :</span> <a
                    href="https://biobanque.falltechnology.com/login">Cliquez ici</a></li>
        </ul>
        <p>Si vous n'attendiez pas ce message, veuillez ne pas y répondre et ignorer ce message, car y répondre pourrait
            entraîner des conséquences juridiques.</p>
    </main>
    <footer>
        <p>&copy; 2024 Great-Times. Tous droits réservés.</p>
    </footer>
</body>
</html>
