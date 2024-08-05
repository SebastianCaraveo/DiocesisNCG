<div class="modal fade" id="ModalComunion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modificando datos del sacramento "Eucaristía"</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($comunionData)
                    <form id="formEditarMatrimonio" action="{{ route('comunion.update', $comunionData->id) }}"
                        method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                        <div class="col-auto">
                            <label class="form-label fw-bold">En la
                                parroquia</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-e" id="selectParroquia" name="selectParroquia"
                                value="{{ $persona->Parroquia->nombre }}" >
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-e" placeholder="Insertar capilla de ser necesario"
                            name="capilla" value="{{$comunionData->capilla}}">
                        </div>
                    </div>
                    
                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                        <div class="col-auto">
                            <label for="" class="form-label m-0" style="font-weight: bold;">En</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-e" id="municipioParroquia2" name="municipioParroquia2"
                                value="{{ $persona->Parroquia->municipio }}" >
                        </div>
                        <div class="col-auto">
                            <label for="" class="form-label m-0" style="font-weight: bold;">el dia de</label>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control color-e" 
                            name="fecha_registro_comunion" value="{{ $comunionData->registro }}" >
                        </div>
                    </div>
                    
                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                        <div class="col-auto">
                            <label for="" class="form-label fw-bold">Padrino</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-e" placeholder="Ingrese el nombre completo del padrino" 
                            name="padrino_comunion" value="{{ $comunionData->padrino }}">
                        </div>
                    </div>
                    
                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                        <div class="col-auto">
                            <label for="" class="form-label fw-bold">Madrina</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-e"placeholder="Ingrese el nombre completo de la madrina"
                                name="madrina_comunion" value="{{ $comunionData->madrina }}" >
                        </div>
                    </div>
                    
                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                        <div class="col-auto">
                            <label class="form-label m-0" style="font-weight: bold;">Bautizado
                                en la
                                parroquia
                                de:</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-e" id="bautismo" name="parroquia_bautizado"
                                placeholder="Parroquia donde haya sido bautizado" value="{{ $comunionData->bautismo }}" >
                        </div>
                    </div>
                    
                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                        <div class="col-auto">
                            <label class="form-label m-0" style="font-weight: bold;">En</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-e" name="municipio_bautismo"
                                placeholder="Parroquia donde haya sido bautizado" value="{{ $comunionData->lugar_bautismo }}" >
                        </div>
                        <div class="col-auto">
                            <label for="" class="form-label m-0" style="font-weight: bold;">el dia de</label>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control color-e" id="fecha_bautismo" name="fecha_bautismo"
                                value="{{ $comunionData->fecha_bautismo }}" >
                        </div>
                    </div>

                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                        <div class="col-auto">
                            <label for="" class="form-label fw-bold">Libro Sacramento Bautismo</label>
                        </div>
                        <div class="col-auto">
                            <label for="" class="form-label">No. Libro</label>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control color-e"
                            name="numero_libro_bautismo" value="{{$comunionData->num_lib_bautismo}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-e"
                            name="numero_letra_libro_bautismo" value="{{$comunionData->num_lib_letra_bautismo}}">
                        </div>
                        <div class="col-auto">
                            <label for="" class="form-label">Folio</label>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control color-e"
                            name="folio_bautismo" value="{{$comunionData->folio_bautismo}}">
                        </div>
                        <div class="col-auto">
                            <label for="" class="form-label">Partida</label>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control color-e"
                            name="partida_bautismo" value="{{$comunionData->partida_bautismo}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-e"
                            name="letra_partida_bautismo" value="{{$comunionData->letra_partida_bautismo}}">
                        </div>
                    </div>

                    <hr>
                    
                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                        @foreach ($libro as $libroItem)
                            @if ($libroItem['tipo'] == 'Comunion')
                            <div class="col-auto">
                                <label for="" class="form-label fw-bold"> Libro Sacramento Comunión</label>
                            </div>
                                <div class="col-auto">
                                    <label for="" class="form-label">Libro
                                        No.</label>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control color-e" id="libroSacramento" name="libro_sacramento"
                                        value="{{ $libroItem['numero_libro'] }}" >
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control color-e" name="libro_letra_sacramento"
                                        value="{{ $libroItem['num_letra'] }}" >
                                </div>
                                <div class="col-auto">
                                    <label for="" class="form-label">Folio</label>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control color-e" name="folio_sacramento"
                                        value="{{ $libroItem['folio'] }}" >
                                </div>
                                <div class="col-auto">
                                    <label for="" class="form-label">Partida</label>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control color-e" name="partida_sacramento"
                                        value="{{ $libroItem['partida'] }}" >
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control color-e" id="partidaSacramento" name="letra_partida_sacramento"
                                        value="{{ $libroItem['letra_partida'] }}" >
                                </div>
                            @endif
                        @endforeach
                    </div>
                    
                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                        <div class="col-auto">
                            <label for="" class="form-label fw-bold">Celebrante</label>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3 col-md-12 dropup">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" disabled>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" id="sacerdoteDropdown">
                                    @foreach ($sacerdotes as $sacerdote)
                                        <li><a class="dropdown-item"
                                                data-sacerdote="{{ $sacerdote->nombre }} {{ $sacerdote->ap_paterno }} {{ $sacerdote->ap_materno }}">{{ $sacerdote->nombre }}
                                                {{ $sacerdote->ap_paterno }}
                                                {{ $sacerdote->ap_materno }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <input type="text" class="form-control color-e" id="sacerdote" name="sacerdote"
                                    value="{{ $comunionData->celebrante }}" >
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                        <div class="col-md-12 m-0">
                            <div class="form-floating">
                                <textarea class="form-control color-e" placeholder="Notas" id="floatingTextarea" name="notas" >{{ $comunionData->notas }}</textarea>
                                <label for="floatingTextarea">Notas</label>
                            </div>
                        </div>
                    </div>
                    @else
                        <p>Nada</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
