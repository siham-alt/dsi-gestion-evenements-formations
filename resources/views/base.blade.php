<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500');
        * {
            padding: 0;
            margin: 0;
            list-style: none;
            text-decoration: none;
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #003062;
            transition: all .5s ease;
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            overflow-y: auto;
            z-index: 1000;
            padding-top: 20px;
        }
        .sidebar header {
            font-size: 22px;
            line-height: 70px;
            text-align: center;
            background: #00264e;
            user-select: none;
        }
        .sidebar ul {
            padding-left: 0;
        }
        .sidebar ul li {
            border-bottom: 1px solid rgba(255,255,255,.1);
            border-top: 1px solid black;
            transition: .4s;
        }
        .sidebar ul li:hover {
            background-color: #00264e;
        }
        .sidebar ul li a {
            display: block;
            height: 65px;
            line-height: 65px;
            font-size: 20px;
            color: white;
            padding-left: 20px;
        }
        .sidebar ul li a i {
            margin-right: 16px;
        }
        section {
            flex: 1;
            padding: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            max-width: 80%; /* Ajustez selon vos besoins */
        }
        .card {
            width: calc(100% - 20px);
            margin: 0 auto;
        }
        .btn-su {
            background-color: #ff4f00;
            border-color: #ff0000;
            color: white;
        }
        .sidebar img {
            width: 40px; /* Définissez la largeur souhaitée */
            height: 40px; /* Définissez la hauteur souhaitée */
            border-radius: 50%; /* Pour une forme arrondie si nécessaire */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <header>
        <div class="fixed w-full flex items-center justify-between h-14 text-white z-10">
            <div class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-64 h-14 bg-blue-800 dark:bg-gray-800 border-none">
                <img class="rounded-full" src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" alt="Avatar" />
                <span class="hidden md:block">ADMIN</span>
            </div>
        </div></header>
        <ul>
            <li><a href="{{ route('Evenements.index') }}"><i class="fas fa-link"></i>Evenements</a></li>
            <li><a href="{{ route('Formation.index') }}"><i class="fas fa-stream"></i>Formations</a></li>
            <li><a href="{{ route('contact.messages') }}"><i class="fas fa-stream"></i>Contact</a></li>
            <li><a href="{{ route('acceuil') }}"><i class="far fa-envelope"></i>Deconnexion</a></li>
        </ul>
    </div>
    <section>
        <div class="welcome-message">
            Bienvenue, administrateur!
        </div>
        @yield('main')
    </section>
</body>
</html>
