<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des evenements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body{
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
        }
        .container {
            margin-top: 30px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 40px;
            font-weight: bold;
        }
        .card {
            margin-bottom: 20px;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 15px;
        }
        .card-text {
            color: #6c757d;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #ff5722;
            border: none;
        }
        .btn-primary:hover {
            background-color: #e64a19;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .evenement-complete {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
        .evenement-complete .card-title {
            color: #721c24;
        }
        .evenement-complete .btn-secondary {
            background-color: #f5c6cb;
            color: #721c24;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
@include('header')
<br><br>
<div class="container">
    <h1>Liste des evenements</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($evenements as $evenement)
            <div class="col">
                <div class="card @if($evenement->inscription_evs->count() >= $evenement->nb_places) evenement-complete @endif">
                    @if($evenement->image != "")
                    <img src="{{ asset('uploads/evenement/'.$evenement->image) }}" class="card-img-top" alt="{{ $evenement->nom }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $evenement->title }}</h5>
                        <p class="card-text"><b>Lieu</b> {{ $evenement->location }}</p>
                        <p class="card-text"><strong>Date</strong> {{ $evenement->date }}</p>
                        <p class="card-text">{{ $evenement->description }}</p>


                       
                @if(strtotime($evenement->date) < time())
                    <button class="btn btn-secondary w-100" disabled>Événement passé</button>
                @elseif($evenement->inscription_evs->count() >= $evenement->nb_places)
                    <button class="btn btn-secondary w-100" disabled>Événement complet</button>
                @else
                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#inscriptionModal_{{ $evenement->id }}">S'inscrire</button>
                @endif
                
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @foreach($evenements as $evenement)
    <div class="modal fade" id="inscriptionModal_{{ $evenement->id }}" tabindex="-1" aria-labelledby="inscriptionModalLabel_{{ $evenement->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inscriptionModalLabel_{{ $evenement->id }}">Inscription à {{ $evenement->nom }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('InscriptionEv.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="evenement_id" value="{{ $evenement->id }}">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<footer>@include('prj/footer')</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
