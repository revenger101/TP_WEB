@extends('Layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ isset($etudiant) ? 'Modifier l\'Etudiant' : 'Ajout D\'un Etudiant' }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('etudiant') }}">Retour</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Il y a eu quelques problèmes avec votre saisie.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ isset($etudiant) ? route('etudiant.update', $etudiant->id) : route('etudiant.ajouter') }}" method="POST">
    @csrf
    @if(isset($etudiant))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                <input type="text" name="nom" value="{{ $etudiant->nom ?? '' }}" class="form-control" placeholder="Nom">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prenom:</strong>
                <input type="text" name="prenom" value="{{ $etudiant->prenom ?? '' }}" class="form-control" placeholder="Prenom">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Classe:</strong>
                <select name="classes_id" class="form-control">
                    @foreach ($classes as $classe)
                        <option value="{{ $classe->id }}" {{ isset($etudiant) && $etudiant->classes_id == $classe->id ? 'selected' : '' }}>
                            {{ $classe->libelle }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">{{ isset($etudiant) ? 'Mettre à jour' : 'Ajouter' }}</button>
        </div>
    </div>
</form>

@endsection
