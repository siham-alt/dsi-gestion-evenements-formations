@extends('base')
<head>
    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Roboto', sans-serif;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #ddd;
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
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .alert {
            border-radius: 5px;
        }
    </style>
</head>
@section('main')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card mt-5">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title">Modifier la Formation</h1>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" action="{{ route('Formation.update', $formations->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Nom</label>
                        <input type="text" class=" @error('nom') is-invalid @enderror form-control" name="nom" value="{{ old('nom', $formations->nom) }}" placeholder="Entrez le nom de la formation">
                        @error('nom')
                        <p class ="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class=" @error('description') is-invalid @enderror form-control" name="description" rows="3" placeholder="Entrez la description de la formation">{{ old('description', $formations->description) }}</textarea>
                        @error('description')
                        <p class ="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date_debut">Date de début</label>
                        <input type="date" class= " @error('date_debut') is-invalid @enderror form-control" name="date_debut" value="{{ old('date_debut', $formations->date_debut) }}">
                        @error('date_debut')
                        <p class ="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date_fin">Date de fin</label>
                        <input type="date" class=" @error('date_fin') is-invalid @enderror form-control" name="date_fin" value="{{ old('date_fin', $formations->date_fin) }}">
                        @error('date_fin')
                        <p class ="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nb_places">Nombre de places</label>
                        <input type="number" class=" @error('nb_places') is-invalid @enderror form-control" name="nb_places" value="{{ old('nb_places', $formations->nb_places) }}">
                        @error('nb_places')
                        <p class ="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image">
                        @if($formations->image)
                        <img class ="w-50 my-3" src="{{ asset('uploads/Formation/'.$formations->image) }}" alt="Image de la formation">
                        @endif
                    </div>
                    <div class="text-center">
                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
