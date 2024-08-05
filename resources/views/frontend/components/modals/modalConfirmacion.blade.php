<div class="modal fade" id="ModalConfirmacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modificando datos del sacramento "Confirmaci¨®n"</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($confirmacionData)
                    <form id="formEditarMatrimonio" action="{{ route('confirmacion.update', $confirmacionData->id) }}"
                        method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                        <div class="col-auto">
                            <label class="form-label"
                                style="font-weight: bold;">En la
                                parroquia
                                de</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-c"
                                name="parroquia_bautizado" value="{{$confirmacionData->bautizado_parroquia}}" >
                        </div>
                    </div>
                    
                    <div class="row mt-2 justify-content-start align-items-center">
                        <div class="col-auto">
                            <label class="form-label"
                                style="font-weight: bold;">en</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-c" id="municipio_bautismo"
                                name="municipio_bautismo" value="{{$confirmacionData->municipio_bautismo}}" >
                        </div>
                        <div class="col-auto">
                            <label class="form-label"
                                style="font-weight: bold;">el</label>
                        </div>
                        <div class="col-md-5 m-0">
                            <input type="date" class="form-control color-c" id="fecha_bautismo"
                                name="fecha_bautismo" value="{{$confirmacionData->fecha_bautismo}}" >
                        </div>
                    </div>
                    
                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                        <div class="col-auto">
                            <label for="" class="form-label fw-bold">Libro Sacramento Bautismo</label>
                        </div>
                        <div class="col-auto">
                            <label for="" class="form-label">Libro No.</label>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control color-c"
                                name="numero_libro_bautismo" value="{{$confirmacionData->no_libro_bautismo}}" >
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-c"
                                name="numero_letra_libro_bautismo" value="{{$confirmacionData->lib_letra_bautismo}}" >
                        </div>
                        <div class="col-auto">
                            <label for="" class="form-label">Folio</label>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control color-c"
                                name="folio_bautismo" value="{{$confirmacionData->folio_bautismo}}" >
                        </div>
                        <div class="col-auto">
                            <label for="" class="form-label">Partida</label>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control color-c"
                                name="partida_bautismo" value="{{$confirmacionData->partida_bautismo}}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-c"
                                name="letra_partida_bautismo" value="{{$confirmacionData->letra_partida_bautismo}}">
                        </div>
                    </div>
                    
                    <div class="row mt-2 justify-content-center align-items-center">
                        <div class="col-auto">
                            <label for="" class="form-label"
                                style="font-weight: bold;">Recibio el
                                sacramento de
                                la Confirmaci¨®n</label>
                        </div>
                    </div>
                    
                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                        <div class="col-auto">
                            <label class="form-label"
                                style="font-weight: bold;">En la
                                parroquia</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-c" 
                                value="{{$persona->Parroquia->nombre}}" >
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-c"
                                name="capilla" value="{{$confirmacionData->capilla}}" >
                        </div>
                    </div>
                    
                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                        <div class="col-auto">
                            <label for="" class="form-label"
                                style="font-weight: bold;">En</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control m-0 color-c"
                                id="municipioParroquia3" name="municipioParroquia" value="{{$persona->Parroquia->municipio}}" >
                        </div>
                        <div class="col-auto">
                            <label for="" class="form-label m-0"
                                style="font-weight: bold;">el dia de</label>
                        </div>
                        <div class="col-auto">
                            <input type="date" class="form-control m-0 color-c"
                                name="fecha_registro_confirmacion" value="{{$confirmacionData->registro}}" >
                        </div>
                    </div>
                    
                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                        <div class="col-auto">
                            <label for="" class="form-label"
                                style="font-weight: bold;">Padrino o
                                Madrina</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-c" placeholder="Ingrese el nombre completo del padrino o madrina"
                                name="padrinos" value="{{$confirmacionData->padrinos}}" >
                        </div>
                    </div>
                    
                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                        <div class="col-auto">
                            <label for="" class="form-label"
                                style="font-weight: bold;">Celebrante</label>
                        </div>
                        <div class="col">
                            <div class="col-md-11 ml-2">
                                <div class="input-group mb-3 col-md-12 dropup">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false" disabled>
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
                                    <input type="text" class="form-control color-c" id="selectedSacerdote"
                                        name="sacerdote" value="{{ $confirmacionData->celebrante }}" >
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                        @foreach ($libro as $libroItem)
                            @if ($libroItem['tipo'] == 'Confirmacion')
                            <div class="col-auto">
                                <label for="" class="form-label fw-bold">Libro Sacramento Confirmaci¨®n</label>
                            </div>
                                <div class="col-auto">
                                    <label for="" class="form-label">Libro No.</label>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control color-c"
                                        name="numero_libro_sacramento" value="{{ $libroItem['numero_libro'] }}" >
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control color-c"
                                        name="numero_letra_libro_sacramento" value="{{ $libroItem['num_letra'] }}" >
                                </div>
                                <div class="col-auto">
                                    <label for="" class="form-label">Folio</label>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control color-c"
                                        name="folio_sacramento" value="{{ $libroItem['folio'] }}" >
                                </div>
                                <div class="col-auto">
                                    <label for="" class="form-label">Partida</label>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control color-c"
                                        name="partida_sacramento" value="{{ $libroItem['partida'] }}" >
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control color-c"
                                        name="letra_partida_sacramento" value="{{ $libroItem['letra_partida'] }}" >
                                </div>
                            @endif
                        @endforeach
                    </div>
                    
                    <div class="row mt-3 d-flex align-items-center justify-content-start">
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="form-control color-c" placeholder="Notas" id="floatingTextarea" name="notas" >{{ $confirmacionData->notas }}</textarea>
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
