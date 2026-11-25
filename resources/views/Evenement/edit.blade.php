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
        <h1>Modifier un événement</h1>
        </div>

         @if ($errors->any())
         <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
         </div>
         @endif

        <form method="POST" action="{{ route('Evenements.update', $evenements->id) }}" enctype="multipart/form-data" >
           
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $evenements->title) }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" value="{{ old('description', $evenements->description) }}">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" name="date" value="{{ old('date', $evenements->date) }}">
            </div>
            <div class="form-group">
                <label for="location">Lieu</label>
                <input type="text" class="form-control" name="location" value="{{ old('location', $evenements->location) }}">
            </div>
            <div class="form-group">
                        <label for="nb_places">Nombre de places</label>
                        <input type="number" class=" @error('nb_places') is-invalid @enderror form-control" name="nb_places" value="{{ old('nb_places', $evenements->nb_places) }}">
                    </div>
            <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image">
                        @if($evenements->image)
                        <img class ="w-50 my-3" src="{{ asset('uploads/Evenement/'.$evenements->image) }}" alt="Image de la formation">
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
