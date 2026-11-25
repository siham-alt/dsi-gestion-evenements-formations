

@extends('base')
@section('main')

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        color: #333;
    }

    .container {
        margin-top: 40px;
    }

    h1 {
        text-align: center;
        color: #343a40;
    }

    .card {
        border-radius: 12px;
    }

    .card-body {
        background-color: #fff;
        border-radius: 12px;
        padding: 20px;
    }

    .table {
        margin: 0;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .thead-light th {
        background-color: #e9ecef;
        color: #495057;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .alert {
        margin-top: 20px;
        border-radius: 12px;
    }
</style>

<div class="container">
    <h1 class="mt-4">Inscriptions à la formation : {{ $formation->nom }}</h1>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date d'Inscription</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inscriptions as $inscription)
                        <tr>
                            <td>{{ $inscription->id }}</td>
                            <td>{{ $inscription->nom }}</td>
                            <td>{{ $inscription->email }}</td>
                            <td>{{ $inscription->date_inscription }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
