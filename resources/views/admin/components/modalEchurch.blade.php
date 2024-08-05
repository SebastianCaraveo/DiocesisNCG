@foreach($parroquias as $parroquia)
    <div class="modal fade" id="ModalEditParroquia{{ $parroquia->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Parroquia</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('church.update', ['parroquia' => $parroquia->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Nombre parroquia o capilla</label>
                            <input type="text" class="form-control" id="nombre_parroquia" name="nombre_parroquia" value="{{ $parroquia->nombre }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion_parroquia" name="direccion_parroquia" value="{{ $parroquia->direccion }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Municipio</label>
                            <select id="municipio_parroquia" name="municipio_parroquia" class="form-control" value="{{  $parroquia->municipio}}" required>
                                <option value="Nuevo Casas Grandes">Nuevo Casas Grandes</option>
                                <option value="Casas Grandes">Casas Grandes</option>
                                <option value="Ascención">Ascención</option>
                                <option value="Janos">Janos</option>
                                <option value="Buenaventura">Buenaventura</option>
                                <option value="Galeana">Galeana</option>
                                <option value="Ignacio Zaragoza">Ignacio Zaragoza</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ubicación</label>
                            <input type="text" class="form-control" id="ubicacion_parroquia" name="ubicacion_parroquia" value="{{ $parroquia->ubicacion }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefono</label>
                            <input type="text" class="form-control" id="telefono_parroquia" name="telefono_parroquia" value="{{ $parroquia->telefono }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Horario</label>
                            <input type="text" class="form-control" id="horario_parroquia" name="horario_parroquia" value="{{ $parroquia->horario }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Parroco</label>
                            <select name="id_parroco" class="form-control" required>
                                @foreach ($parrocos as $parroco)
                                    <option value="{{ $parroco->id }}">{{ $parroco->sacerdote->nombre }}
                                        {{ $parroco->sacerdote->ap_paterno }} {{ $parroco->sacerdote->ap_materno }}</option>
                                @endforeach
                            </select>
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
