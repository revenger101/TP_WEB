@extends('Layout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Liste des Etudiants</h1>

            </div>
            <div class="pull-right d-flex justify-content-end" style="margin-bottom: 1rem">
                <a class="btn btn-success" href="{{ route('etudiant.create') }}">Create New Student</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-hover">
        <tr>
            <th>Numero</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Classe</th> 
            <th width="280px">Action</th>
        </tr>
        @foreach ($liste as $value)
        <tr>
            <td>{{ $loop->index }}</td>
            <td>{{ $value->nom }}</td>
            <td>{{ $value->prenom }}</td>
            <td>{{ $value->classe->libelle }}</td> 
            <td>
                <a class="btn btn-info" href="#">Show</a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal"
                    data-id="{{ $value->id }}"
                    data-nom="{{ $value->nom }}"
                    data-prenom="{{ $value->prenom }}"
                    data-classe="{{ $value->classe_id }}">
                    Edit
                </button>

                <!-- Delete Button -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $value->id }}">
                    Delete
                </button>
            </td>
        </tr>

        <!-- Delete Confirmation Modal for each student -->
        <div class="modal fade" id="deleteModal-{{ $value->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $value->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel-{{ $value->id }}">Delete Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this student?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="{{ route('etudiant.delete', $value->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </table>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('etudiant.update', 0) }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="mb-3">
                            <label for="edit-nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="edit-nom" name="nom">
                        </div>
                        <div class="mb-3">
                            <label for="edit-prenom" class="form-label">Prenom</label>
                            <input type="text" class="form-control" id="edit-prenom" name="prenom">
                        </div>
                        <div class="mb-3">
                            <label for="edit-classe" class="form-label">Classe</label>
                            <select class="form-control" id="edit-classe" name="classes_id">
                                @foreach ($classes as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

 
<script>
   document.addEventListener('DOMContentLoaded', function () {
    // Get the modal and form elements
    const editModal = document.getElementById('editModal');
    const editForm = document.getElementById('editForm');

    // Event listener for when the modal is about to be shown
    editModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        const button = event.relatedTarget;
        
        // Extract info from data-* attributes
        const id = button.getAttribute('data-id');
        const nom = button.getAttribute('data-nom');
        const prenom = button.getAttribute('data-prenom');
        const classeId = button.getAttribute('data-classe');

        // Update the modal's content
        editForm.action = `/etudiant/${id}`;  // Set the form action with the correct student ID

        document.getElementById('edit-id').value = id;
        document.getElementById('edit-nom').value = nom;
        document.getElementById('edit-prenom').value = prenom;
        document.getElementById('edit-classe').value = classeId;
    });
});


</script>


