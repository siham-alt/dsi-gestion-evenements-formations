<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabinet</title>
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
            background: #042331;
            transition: all .5s ease;
            color: white;
        }
        .sidebar header {
            font-size: 22px;
            line-height: 70px;
            text-align: center;
            background: #063146;
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
            background-color: #063146;
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
            padding: 20px;
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
    </style>
</head>
<body>
    <div class="sidebar">
        <header>ACCEUIL</header>
        <ul>
            
            <li><a href="{{ route('Evenements.index') }}"><i class="fas fa-link"></i>Evenements</a></li>
            <li><a href=""><i class="fas fa-stream"></i>Formations</a></li>
            <li><a href="{{route('acceuil')}}"><i class="far fa-envelope"></i>Deconnexion</a></li>
        </ul>
    </div>
    <section>