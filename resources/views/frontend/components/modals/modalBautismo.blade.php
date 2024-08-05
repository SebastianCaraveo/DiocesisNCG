<div class="modal fade" id="ModalBautismo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modificando datos del sacramento "Bautismo"</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($bautismoData)
                    <form id="formEditarMatrimonio" action="{{ route('bautismo.update', $bautismoData->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <input value="{{ $persona->id }}" name="id_persona" type="hidden" readonly>
                        </div>

                        <div class="row mt-2 d-flex align-items-center justify-content-start">
                            <div class="col-auto">
                                <label class="form-label" style="font-weight: bold;">En la
                                    parroquia
                                    de</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control color-b" id="selectParroquia"
                                    name="select_parroquia" value="{{ $persona->Parroquia->nombre }}">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control color-b" placeholder="Insertar Capilla de ser necesario" 
                                value="{{$bautismoData->capilla}}" name="capilla">
                            </div>
                        </div>

                        <div class="row mt-2 d-flex align-items-center justify-content-start">
                            <div class="col-auto">
                                <label for="" class="form-label m-0"
                                    style="font-weight: bold;">En</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control color-b" id="municipioParroquia"
                                    name="municipio_parroquia" value="{{ $persona->Parroquia->municipio }}">
                            </div>
                            <div class="col-auto">
                                <label for="" class="form-label m-0"
                                    style="font-weight: bold;">el dia de</label>
                            </div>
                            <div class="col">
                                <input type="date" class="form-control color-b" id="registroBautismo"
                                    name="fecha_registro_bautismo" value="{{ $bautismoData->registro }}">
                            </div>
                        </div>

                        <div class="row mt-2 justify-content-start align-items-center d-flex">
                            <div class="col-auto">
                                <label for="" class="form-label"
                                    style="font-weight: bold;">Padrinos</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control color-b" id="padrinosBautismo"
                                    name="padrinos_bautismo" value="{{ $bautismoData->padrinos }}">
                            </div>
                        </div>

                        <div class="row mt-2 justify-content-start align-items-center d-flex">
                            <div class="col-auto">
                                <label for="" class="form-label "
                                    style="font-weight: bold;">Celebrante</label>
                            </div>
                            <div class="col">
                                <div class="col">
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
                                        <input type="text" class="form-control color-b" id="selectedSacerdote"
                                            name="sacerdote" value="{{ $bautismoData->celebrante }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2 d-flex align-items-center justify-content-between g-2">
                            @foreach ($libro as $libroItem)
                                @if ($libroItem['tipo'] == 'Bautismo')
                                    <div class="col-md-3">
                                        <label for="" class="form-label" style="font-weight: bold;">Libro Sacramento Bautismo</label>
                                    </div>
                                    <div class="col-auto">
                                        <label for="" class="form-label" style="">Libro
                                            No.</label>
                                    </div>
                                    <div class="col">
                                        <input class="form-control color-b" type="number" 
                                            name="numero_libro_sacramento" value="{{ $libroItem['numero_libro'] }}">
                                    </div>
                                    <div class="col">
                                        <input class="form-control color-b" type="text"
                                            name="libro_letra_sacramento" value="{{ $libroItem['num_letra'] }}">
                                    </div>
                                    <div class="col-auto">
                                        <label for="" class="form-label"
                                            style="">Folio</label>
                                    </div>
                                    <div class="col">
                                        <input class="form-control color-b" type="number"
                                            name="folio_sacramento" value="{{ $libroItem['folio'] }}">
                                    </div>
                                    <div class="col-auto">
                                        <label for="" class="form-label"
                                            style="">Partida</label>
                                    </div>
                                    <div class="col">
                                        <input class="form-control color-b" type="number"
                                            name="partida_sacramento" value="{{ $libroItem['partida'] }}">
                                    </div>
                                    <div class="col">
                                        <input class="form-control color-b" type="text"
                                            name="letra_partida_sacramento" value="{{ $libroItem['letra_partida'] }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        
                        <div class="row mt-2 d-flex align-items-center justify-content-between g-2">
                            <div class="col-md-3">
                                <label for="" class="form-label" style="font-weight: bold;">Registro Civil de la Persona</label>
                            </div>
                            <div class="col-auto">
                                <label for="" class="form-label">Libro
                                    No.</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control color-b" 
                                    name="numero_libro_registro_civil" value="{{$bautismoData->num_libro_rc}}">
                            </div>
                            <div class="col-auto">
                                <label for="" class="form-label">Foja</label>
                            </div>
                            <div class="col">
                                <input type="number"  class="form-control color-b" 
                                    name="folio_registro_civil" value="{{$bautismoData->folio_rc}}">
                            </div>
                            <div class="col-auto">
                                <label for="" class="form-label">Acta</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control color-b" 
                                    name="acta_registro_civil" value="{{$bautismoData->partida_rc}}">
                            </div>
                        </div>
                        
                        <div class="row my-3 d-flex">
                            <div class="col-md-3"></div>
                            <div class="col-md-2 mb-0">
                                <label for="" class="form-label"
                                    style="">Delegaci¨®n/Entidad</label>
                            </div>
                            <div class="col-md-5 mb-0">
                                <input type="text" class="form-control color-b" 
                                    name="delegacion" value="{{$bautismoData->delegacion_rc}}">
                            </div>
                        </div>

                        <div class="row mt-3 d-flex align-items-center justify-content-start">
                            <div class="col-md-12 m-0">
                                <div class="form-floating">
                                    <textarea class="form-control color-b" placeholder="Notas" id="floatingTextarea" name="notas">{{ $bautismoData->notas }}</textarea>
                                    <label for="floatingTextarea">Notas</label>
                                </div>
                            </div>
                        </div>

                        <div class="row my-3 d-flex align-items-center justify-content-center">
                            <div class="col-md-4 m-0">
                                <div class="form-floating">
                                    <textarea class="form-control color-b" placeholder="Partida No." id="floatingTextarea" name="recibio_eucaristia">{{ $bautismoData->no_partida }}</textarea>
                                    <label for="floatingTextarea">Recibio la Eucaristia en</label>
                                </div>
                            </div>
                            <div class="col-md-4 m-0">
                                <div class="form-floating">
                                    <textarea class="form-control color-b" placeholder="Se confirmo en" id="floatingTextarea" name="recibio_confirmacion">{{ $bautismoData->lugar_confirmacion }}</textarea>
                                    <label for="floatingTextarea">Se confirmo en</label>
                                </div>
                            </div>
                            <div class="col-md-4 m-0">
                                <div class="form-floating">
                                    <textarea class="form-control color-b" placeholder="Contrajo Matrimonio en" id="floatingTextarea" name="contrajo_matrimonio">{{ $bautismoData->contrajo_matrimonio }}</textarea>
                                    <label for="floatingTextarea">Contrajo Matrimonio en</label>
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
