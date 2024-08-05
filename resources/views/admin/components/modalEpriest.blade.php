@foreach($sacerdotes as $sacerdote)
    <div class="modal fade" id="ModalEditSacerdote{{ $sacerdote->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('priest.update', ['sacerdote' => $sacerdote->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <input type="text" class="form-control" id="nombre_sacerdote" name="nombre_sacerdote" value="{{ $sacerdote->nombre }}" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="ap_paterno_sacerdote" name="ap_paterno_sacerdote" value="{{ $sacerdote->ap_paterno }}" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="ap_materno_sacerdote" name="ap_materno_sacerdote" value="{{ $sacerdote->ap_materno }}" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="licenciatura_sacerdote" name="licenciatura_sacerdote" value="{{ $sacerdote->licenciatura }}" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
