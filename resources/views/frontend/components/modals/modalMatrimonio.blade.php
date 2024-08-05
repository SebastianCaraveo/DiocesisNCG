<div class="modal fade" id="ModalMatrimonio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modificando datos del sacramento "Matrimonio"</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($matrimonioData)
                    <form id="formEditarMatrimonio" action="{{ route('matrimonio.update', $matrimonioData->id) }}"
                        method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                        <div class="col-auto">
                            <label class="form-label m-0" style="font-weight: bold;">
                                Parroquia de:</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-m" value="{{$persona->Parroquia->nombre}}" >
                        </div>
                        <div class="col">
                            <input type="text" class="form-control color-m" 
                            name="capilla" placeholder="Ingrese la Capilla de ser necesario" 
                            value="{{$matrimonioData->capilla}}" >
                        </div>
                    </div>
                    
                    <div class="row mt-2 justify-content-start align-items-center">
                        <div class="col-md-1 m-0">
                            <label class="form-label m-0"
                                style="font-weight: bold; padding-left: 15px;">Lugar</label>
                        </div>
                        <div class="col-md-11 m-0">
                            <input type="text" class="form-control color-m" id="municipioParroquia4"
                                name="municipioParroquia" value="{{$persona->Parroquia->municipio}}" >
                        </div>
                    </div>
                    
                    <div class="row mt-2 justify-content-start align-items-center">
                        <div class="col-md-1 m-0">
                            <label class="form-label m-0"
                                style="font-weight: bold; padding-left: 15px;">el</label>
                        </div>
                        <div class="col-md-11 m-0">
                            <input type="date" class="form-control color-m" id="registro" name="fecha_registro"
                                value="{{$matrimonioData->registro}}" >
                        </div>
                    </div>
                    
                    <div class="row my-3 d-flex align-items-center justify-content-center">
                        <div class="col-auto">
                            <label for="" class="form-label m-0"
                                style="font-weight: bold;">Contrajeron
                                matrimonio eclesiástico</label>
                        </div>
                    </div>
                    
                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                        <div class="col-md-1 m-0">
                            <label for="" class="form-label m-0"
                                style="font-weight: bold; padding-left: 15px;">el Sr.</label>
                        </div>
                        <div class="col-md-11 m-0">
                            <input type="text" class="form-control color-m" id="sr" name="senor"
                                value="{{$matrimonioData->senor}}" >
                        </div>
                    </div>
                    
                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                        <div class="col-md-1 m-0">
                            <label for="" class="form-label m-0"
                                style="font-weight: bold; padding-left: 15px;">la Srita.</label>
                        </div>
                        <div class="col-md-11 m-0">
                            <input type="text" class="form-control color-m" name="senorita"
                                value="{{$matrimonioData->senorita}}" >
                        </div>
                    </div>
                    
                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                        <div class="col-md-3 mt-0">
                            <label for="" class="form-label m-0"
                                style="font-weight: bold; padding-left: 15px;">Habiendo sido
                                tesitgo el Sr.</label>
                        </div>
                        <div class="col-md-9 mt-0">
                            <input type="text" class="form-control color-m" id="testigoSr" name="testigo_senor"
                                value="{{$matrimonioData->testigo_senor}}" >
                        </div>
                    </div>
                    
                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                        <div class="col-md-3 mt-0">
                            <label for="" class="form-label m-0"
                                style="font-weight: bold; padding-left: 15px;">y la Srita.</label>
                        </div>
                        <div class="col-md-9 mt-0">
                            <input type="text" class="form-control color-m" id="testigo_senorita"
                                name="testigo_senorita" value="{{$matrimonioData->testigo_senorita}}" >
                        </div>
                    </div>
                    
                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                        <div class="col-md-1 mt-0">
                            <label for="" class="form-label "
                                style="font-weight: bold; padding-left: 15px;">Celebrante</label>
                        </div>
                        <div class="col-md-11 ml-2">
                            <div class="input-group mb-3 col-md-12 dropup">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" id="sacerdoteDropdown2">
                                    @foreach ($sacerdotes as $sacerdote)
                                        <li><a class="dropdown-item"
                                                data-sacerdote2="{{ $sacerdote->nombre }} {{ $sacerdote->ap_paterno }} {{ $sacerdote->ap_materno }}">{{ $sacerdote->nombre }}
                                                {{ $sacerdote->ap_paterno }}
                                                {{ $sacerdote->ap_materno }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <input type="text" class="form-control color-m" id="selectedSacerdote2"
                                    name="celebrante" value="{{$matrimonioData->celebrante}}" >
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                        @foreach ($libro as $libroItem)
                            @if ($libroItem['tipo'] == 'Matrimonio')
                                <div class="col-auto">
                                    <label for="" class="form-label"
                                        style="font-weight: bold;">Libro No.</label>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control color-m"
                                        name="libroSacramento" value="{{ $libroItem['numero_libro'] }}" >
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control color-m"
                                        name="letra_libro_sacramento" value="{{ $libroItem['num_letra'] }}" >
                                </div>
                                <div class="col-auto">
                                    <label for="" class="form-label"
                                        style="font-weight: bold;">Folio</label>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control color-m" id="folioSacramento"
                                        name="folioSacramento" value="{{ $libroItem['folio'] }}" >
                                </div>
                                <div class="col-auto">
                                    <label for="" class="form-label"
                                        style="font-weight: bold;">Partida</label>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control color-m" id="partidaSacramento"
                                        name="partidaSacramento" value="{{ $libroItem['partida'] }}" >
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control color-m" id="partidaSacramento"
                                        name="partida_letra_sacramento" value="{{ $libroItem['letra_partida'] }}" >
                                </div>
                            @endif
                        @endforeach
                    </div>
                    
                    <div class="row mt-3 d-flex align-items-center justify-content-start">
                        <div class="col-md-12 m-0">
                            <div class="form-floating">
                                <textarea class="form-control color-m" placeholder="Notas" id="floatingTextarea" name="notas" >{{$matrimonioData->notas}}</textarea>
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
