<div class="row d-flex align-items-center justify-content-start">

    <div>
        <input value="{{$persona->id}}" name="idPerson" type="hidden" readonly>
    </div>

    <div class="col-auto">
        <label for="nombrePersona" class="form-label"
            style="font-weight: bold;">Nombre:</label>
    </div>

    <div class="col">
        <input type="text" class="form-control color-c" id="nombrePersona"
            name="nombrePersona" value="{{ $persona->nombre }}" readonly>
    </div>
</div>

<div class="row no-gutters mt-2 d-flex align-items-center">
    <div class="col-md-1 m-0 justify-content-end">
        <label for="generoPersona" class="form-label m-0"
            style="font-weight: bold; padding-left: 15px;">Hij</label>
    </div>
    <div class="col-md-1 m-0">
        <input type="text" class="form-control color-c" id="generoPersona"
            name="generoPersona"
            value="{{ $persona->genero == 'Masculino' ? 'O' : 'A' }}" readonly>
    </div>
    <div class="col-md-1 m-0 justify-content-start">
        <label class="form-label m-0"
            style="font-weight: bold; padding-left: 15px;">Sr.</label>
    </div>
    <div class="col-md-4 m-0">
        <input type="text" class="form-control color-c" id="padrePersona"
            name="padrePersona" value="{{ $persona->nombre_papa }}" readonly>
    </div>
    <div class="col-md-1 m-0 justify-content-start">
        <label class="form-label m-0"
            style="font-weight: bold; padding-left: 15px;">Sra.</label>
    </div>
    <div class="col-md-4 m-0">
        <input type="text" class="form-control color-c" id="madrePersona"
            name="madrePersona" value="{{ $persona->nombre_mama }}" readonly>
    </div>
</div>

<div class="row mt-2 d-flex align-items-center justify-content-start">
    <div class="col-md-2 m-0 justify-content-end">
        <label for="generoPersona" class="form-label m-0"
            style="font-weight: bold; padding-left: 15px;">Bautizad</label>
    </div>
    <div class="col-md-1 m-0">
        <input type="text" class="form-control color-c" id="generoPersona"
            name="generoPersona"
            value="{{ $persona->genero == 'Masculino' ? 'O' : 'A' }}" readonly>
    </div>
    <div class="col-md-3 m-0">
        <label class="form-label m-0"
            style="font-weight: bold; padding-left: 15px;">En la
            parroquia
            de</label>
    </div>
    <div class="col-md-6 m-0">
        <input type="text" class="form-control color-c" id="bautismo_parroquia"
            name="bautismo_parroquia" value="{{$confirmacionData->bautizado_parroquia}}" readonly>
    </div>
</div>

<div class="row mt-2 justify-content-start align-items-center">
    <div class="col-md-1 m-0">
        <label class="form-label m-0"
            style="font-weight: bold; padding-left: 15px;">en</label>
    </div>
    <div class="col-md-5 m-0">
        <input type="text" class="form-control color-c" id="municipio_bautismo"
            name="municipio_bautismo" value="{{$confirmacionData->municipio_bautismo}}" readonly>
    </div>
    <div class="col-md-1 m-0">
        <label class="form-label m-0"
            style="font-weight: bold; padding-left: 15px;">el</label>
    </div>
    <div class="col-md-5 m-0">
        <input type="date" class="form-control color-c" id="fecha_bautismo"
            name="fecha_bautismo" value="{{$confirmacionData->fecha_bautismo}}" readonly>
    </div>
</div>

<div class="row mt-2 d-flex align-items-center justify-content-start">
    <div class="col-auto">
        <label for="" class="form-label"
        style="font-weight: bold;">Libro Sacramento de Bautismo</label>
    </div>
    <div class="col-auto">
        <label for="" class="form-label">Libro No.</label>
    </div>
    <div class="col">
        <input type="number" class="form-control color-c" 
            value="{{$confirmacionData->no_libro_bautismo}}" readonly>
    </div>
    <div class="col">
        <input type="text" class="form-control color-c" 
            value="{{$confirmacionData->lib_letra_bautismo}}" readonly>
    </div>
    <div class="col-auto">
        <label for="" class="form-label">Folio</label>
    </div>
    <div class="col">
        <input type="number" class="form-control color-c" 
            value="{{$confirmacionData->folio_bautismo}}" readonly>
    </div>
    <div class="col-auto">
        <label for="" class="form-label">Partida</label>
    </div>
    <div class="col">
        <input type="number" class="form-control color-c" 
            value="{{$confirmacionData->partida_bautismo}}">
    </div>
    <div class="col">
        <input type="text" class="form-control color-c" 
            value="{{$confirmacionData->letra_partida_bautismo}}">
    </div>
</div>

<div class="row mt-2 justify-content-start align-items-center">
    <div class="col-md-12">
        <label for="" class="form-label"
            style="font-weight: bold; padding-left: 15px;">Recibio el sacramento de la Confirmación</label>
    </div>
</div>

<div class="row mt-2 d-flex align-items-center justify-content-start">
    <div class="col-md-2 m-0">
        <label class="form-label m-0"
            style="font-weight: bold; padding-left: 15px;">En la parroquia</label>
    </div>
    <div class="col-md-10 m-0">
        <input type="text" class="form-control color-c" value="{{$persona->Parroquia->nombre}} {{$confirmacionData->capilla}}" readonly>
    </div>
</div>

<div class="row mt-2 d-flex align-items-center justify-content-start">
    <div class="col-md-1 m-0">
        <label for="" class="form-label m-0"
            style="font-weight: bold; padding-left: 15px;">En</label>
    </div>
    <div class="col-md-6 m-0">
        <input type="text" class="form-control m-0 color-c"
            id="municipioParroquia3" name="municipioParroquia" value="{{$persona->Parroquia->municipio}}" readonly>
    </div>
    <div class="col-md-2 m-0">
        <label for="" class="form-label m-0"
            style="font-weight: bold; padding-left: 15px;">el dia de</label>
    </div>
    <div class="col-md-3 m-0">
        <input type="date" class="form-control m-0 color-c"
            id="registroConfirmacion" name="registroConfirmacion" value="{{$confirmacionData->registro}}" readonly>
    </div>
</div>

<div class="row mt-2 justify-content-start align-items-center d-flex">
    <div class="col-md-3 mt-0">
        <label for="" class="form-label m-0"
            style="font-weight: bold; padding-left: 15px;">Padrino o
            Madrina</label>
    </div>
    <div class="col-md-9 mt-0">
        <input type="text" class="form-control color-c" id="padrinos"
            name="padrinos"
            placeholder="Ingrese el nombre completo del padrino o madrina" value="{{$confirmacionData->padrinos}}" readonly>
    </div>
</div>

<div class="row mt-2 justify-content-start align-items-center d-flex">
    <div class="col-md-1 mt-0">
        <label for="" class="form-label "
            style="font-weight: bold; padding-left: 15px;">Celebrante</label>
    </div>
    <div class="col-md-11 ml-2">
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
                    name="selectSacerdote" value="{{ $confirmacionData->celebrante }}" readonly>
            </div>
        </div>
    </div>
</div>

<div class="row mt-2 d-flex align-items-center justify-content-around">
    <div class="col-auto">
        <label for="" class="form-label"
            style="font-weight: bold;">Libro Sacramento Confirmación</label>
    </div>
    @foreach ($libro as $libroItem)
        @if ($libroItem['tipo'] == 'Confirmacion')
            <div class="col-auto">
                <label for="" class="form-label">Libro No.</label>
            </div>
            <div class="col">
                <input type="number" class="form-control color-c" 
                    value="{{ $libroItem['numero_libro'] }}" readonly>
            </div>
            <div class="col">
                <input type="text" class="form-control color-c" 
                    value="{{ $libroItem['num_letra'] }}" readonly>
            </div>
            <div class="col-auto">
                <label for="" class="form-label">Folio</label>
            </div>
            <div class="col">
                <input type="number" class="form-control color-c" 
                    value="{{ $libroItem['folio'] }}" readonly>
            </div>
            <div class="col-auto">
                <label for="" class="form-label">Partida</label>
            </div>
            <div class="col">
                <input type="number" class="form-control color-c" 
                    value="{{ $libroItem['partida'] }}" readonly>
            </div>
            <div class="col">
                <input type="text" class="form-control color-c" 
                    value="{{ $libroItem['letra_partida'] }}" readonly>
            </div>
        @endif
    @endforeach
</div>

<div class="row mt-3 d-flex align-items-center justify-content-start">
    <div class="col-md-12 m-0">
        <div class="form-floating">
            <textarea class="form-control color-c" placeholder="Notas" id="floatingTextarea" name="notas" readonly>{{ $confirmacionData->notas }}</textarea>
            <label for="floatingTextarea">Notas</label>
        </div>
    </div>
</div>