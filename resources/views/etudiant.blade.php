@extends('Layout')
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Liste des Etudiants</h1>
            </div>
            <div class="pull-right d-flex justify-content-end" style="margin-bottom: 1rem">
                <a class="btn btn-success" href="#">Create New Student</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-hover">
        <tr>
            <th>Numero</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th width="280px">Action</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Bouzaien</td>
            <td>Malek</td>
            <td>
                <a class="btn btn-info" href="#">Show</a>
                <a class="btn btn-primary" href="#">Edit</a>
                <a class="btn btn-danger" href="#">Delete</a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Idoudi</td>
            <td>Hechmi</td>
            <td>
                <a class="btn btn-info" href="#">Show</a>
                <a class="btn btn-primary" href="#">Edit</a>
                <a class="btn btn-danger" href="#">Delete</a>
            </td>
        </tr>
@endsection