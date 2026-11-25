<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formations DSI</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 50px 20px;
            gap: 30px; /* Espacement plus large entre les cartes */
        }

        .cardd {
            border-radius: 15px;
            overflow: hidden;
            width: calc(25% - 40px);
            background-color: #fff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            text-align: center;
            position: relative;
            border: 2px solid transparent;
        }

        .cardd:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.2);
            border-color: #c46c00; /* Bordure colorée au survol */
        }

        .cardd img {
            width: 100%;
            height: auto;
            object-fit: cover;
            transition: transform 0.4s ease, filter 0.4s ease;
        }

        .cardd:hover img {
            transform: scale(1.08); /* Zoom plus prononcé au survol */
            filter: brightness(1.1); /* Augmente la luminosité au survol */
        }

        .cardd .card-title {
            padding: 20px 15px;
            color: #455468;
            font-size: 22px;
            font-weight: 600;
            text-decoration: none;
            display: block;
            transition: color 0.3s ease;
        }

        .cardd .card-title:hover {
            color: #e67300; /* Couleur accentuée au survol */
        }

        .cardd:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 40%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent);
            z-index: 1;
        }

        .cardd .card-title {
            z-index: 2;
            position: relative;
        }

        /* Effet subtil d'apparition des cartes */
        .cardd {
            opacity: 0;
            transform: translateY(50px);
            animation: fadeIn 0.8s ease forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="cardd">
            <a href="#" title="Cybersécurité">
                <img src="/img/card1.jpg" alt="Cybersécurité">
                <span class="card-title">La Cybersécurité</span>
            </a>
        </div>
        <div class="cardd">
            <a href="#" title="Big Data">
                <img src="/img/big-data1.jpg" alt="Big Data">
                <span class="card-title">Big Data</span>
            </a>
        </div>
        <div class="cardd">
            <a href="#" title="Business Intelligence">
                <img src="/img/business_intelligence.jpg" alt="Business Intelligence">
                <span class="card-title">Business Intelligence</span>
            </a>
        </div>
        <!-- Ajouter d'autres cartes ici si nécessaire -->
    </div>
</body>
</html>
