@extends('base')
@section('main')
<head>
    <style>
        body {
            background-color:#e4e4e4;
            font-family: 'Roboto', sans-serif;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 1rem;
            background-color: #003976; 
        }

        .card-title {
            margin: 0;
            font-size: 1.5rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
            padding: 0.75rem;
            border: 1px solid #ddd;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .alert {
            border-radius: 5px;
        }
    </style>
</head>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header  text-white" >
                    <h1 class="card-title">Ajouter un événement</h1>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('Evenements.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                placeholder="Entrez le titre de l'événement" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Entrez la description de l'événement" value="{{ old('description') }}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date" value="{{ old('date') }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="location">Lieu</label>
                            <input type="text" class="form-control" name="location" value="{{ old('location') }}"
                                placeholder="Entrez le lieu de l'événement" required>
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
                            <button type="submit" class="btn btn-primary" style ="background-color:#28a745;" >Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
