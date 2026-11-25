@extends('base')

@section('main')
<head>
    <style>
        body {
            background-color: #e4e4e4;
            font-family: 'Roboto', sans-serif;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            background-color: #003976;
            color: #fff;
            padding: 15px;
        }

        .card-title {
            margin: 0;
            font-size: 1.5rem;
            background-color: #003976;
        }

        .card-body {
            padding: 20px;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
            padding: 0.75rem;
            border: 1px solid #ced4da;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            padding: 10px 20px;
            font-size: 1rem;
            text-transform: uppercase;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .invalid-feedback {
            color: #dc3545;
            display: block;
            margin-top: 5px;
            font-size: 0.875rem;
        }

        .form-group input[type="file"] {
            padding: 10px;
        }
    </style>
</head>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header  text-white" >
                <h1 class="card-title">Ajouter une Formation</h1>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="{{ route('Formation.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Nom</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" placeholder="Entrez le nom de la formation">
                        @error('nom')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Entrez la description de la formation">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date_debut">Date de début</label>
                        <input type="date" class="form-control @error('date_debut') is-invalid @enderror" name="date_debut" value="{{ old('date_debut') }}">
                        @error('date_debut')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date_fin">Date de fin</label>
                        <input type="date" class="form-control @error('date_fin') is-invalid @enderror" name="date_fin" value="{{ old('date_fin') }}">
                        @error('date_fin')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nb_places">Nombre de places</label>
                        <input type="number" class="form-control @error('nb_places') is-invalid @enderror" name="nb_places" value="{{ old('nb_places') }}">
                        @error('nb_places')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
@endsection
