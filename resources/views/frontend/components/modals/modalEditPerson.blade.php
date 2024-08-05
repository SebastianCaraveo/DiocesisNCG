<div class="modal" tabindex="-1" role="dialog" id="editPersonaModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Persona</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('personas.update', $persona->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-12 mb-3">
                        <label for="nombre"> <strong> Nombre Completo de la Persona</strong></label>
                        <input type="text" class="form-control color-b" name="nombre" value="{{ $persona->nombre }}">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="nombre_papa"> <strong> Nombre del Padre</strong></label>
                        <input type="text" class="form-control color-b" name="nombre_papa" value="{{ $persona->nombre_papa }}">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="nombre_mama"> <strong> Nombre de la Madre</strong></label>
                        <input type="text" class="form-control color-b" name="nombre_mama" value="{{ $persona->nombre_mama }}">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="fecha_nacimiento"> <strong> Fecha de Nacimiento de la Persona</strong></label>
                        <input type="date" class="form-control color-b" name="fecha_nacimiento" value="{{ $persona->fecha_nacimiento_for_input }}" >
                    </div>
                    <div class="col-12 mb-3">
                        <label for="lugar_nacimiento"> <strong> Lugar de Nacimiento de la Persona</strong></label>
                        <input type="text" class="form-control color-b" name="lugar_nacimiento" value="{{ $persona->lugar_nacimiento }}">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="genero"> <strong> Genero:</strong></label>
                        <select class="form-select color-b" name="genero">
                            <option value="Femenino" {{ $persona->genero == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                            <option value="Masculino" {{ $persona->genero == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                        </select>
                    </div>
                    <div class="modal-footer align-items-center justify-content-center">
                        <button type="submit" class="btn btn-success col-12 btn-lg">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<td class="col-md-9">
    <span style="font-weight: normal;">{{ $persona->formatted_fecha_nacimiento }}</span>
</td>
