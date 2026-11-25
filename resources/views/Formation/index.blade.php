<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formations</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e4e4e4;
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Change align-items to flex-start */
            min-height: 100vh; /* Ensure the body takes at least the viewport height */
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-primary {
            background-color: #eb5d00;
        }

        .btn-primary:hover {
            background-color: #d9534f; /* Orange foncé au survol */
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .table-container {
            margin-top: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f9;
            color: #333;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .form-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-container form {
            display: inline-block;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .action-buttons form {
            display: inline-block;
        }
    </style>
</head>
<body>
@extends('base')

@section('main')
<div class="container">
    <h1>Liste des formations <a href="{{ route('Formation.create') }}" class="btn btn-success">Ajouter</a></h1>
    <div class="table-container">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Date de debut</th>
                    <th>Date de fin</th>
                    <th>Description</th>
                    <th>Nombre de places</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($formations as $formation)
                <tr>
                    <td>{{ $formation->id }}</td>
                    <td>{{ $formation->nom }}</td>
                    <td>{{ $formation->date_debut }}</td>
                    <td>{{ $formation->date_fin }}</td>
                    <td>{{ $formation->description }}</td>
                    <td>{{ $formation->nb_places }}</td>
                    <td>
                        @if($formation->image!="")
                        <img width="50" src="{{ asset('uploads/Formation/'.$formation->image) }}">
                        @endif
                    </td>
                    <td class="action-buttons">
                        <a href="{{ route('Formation.edit', $formation->id) }}" class="btn btn-primary" style="background-color: #ec8200;">Modifier</a>
                        <form action="{{ route('Formation.destroy', $formation->id) }}" method="post" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Supprimer</button>
                        </form>
                        <a href="{{ route('formations.inscriptions', $formation->id) }}" class="btn btn-info">Inscriptions</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Êtes-vous sûr de vouloir supprimer cette formation ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">Supprimer</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        var formToSubmit;
        
        $('.delete-form button').on('click', function(event) {
            formToSubmit = $(this).closest('form');
        });

        $('#confirmDelete').on('click', function() {
            formToSubmit.submit();
        });
    });
</script>
@endsection
</body>
</html>
