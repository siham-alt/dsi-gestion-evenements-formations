<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site web</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f9;
            overflow-x: hidden;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px; /* Ajustement des paddings horizontaux */
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        header.scrolled {
            background-color: #083667;
            color: white;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #1F64AE;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-left: 20px; /* Ajustement de la marge à gauche */ 
            margin-right: 10px; 
        }

        .logo span {
            color: #f94f00;
        }

        .menu {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 550px; /* Ajustement de la marge à droite */
        }

        .menu li {
            margin-left: 25px;
        }

        .menu a {
            color: #1F64AE;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .menu a:hover {
            color: #f94f00;
        }
    </style>
</head>
<body>
    <header id="mainHeader">
        <div class="logo"><span>For</span>Event</div>
        <ul class="menu">
            <li><a href="{{ route('acceuil') }}">Accueil</a></li>
            <li><a href="{{ route('evenements.show')}}">Événements</a></li>
            <li><a href="{{ route('formations.show')}}">Formations</a></li>
            <li><a href="{{route('contact')}}">Contact</a></li>
        </ul>
    </header>

    <script>
        window.addEventListener('scroll', function () {
            var header = document.querySelector('header');
            header.classList.toggle('scrolled', window.scrollY > 50);
        });
    </script>
</body>
</html>
