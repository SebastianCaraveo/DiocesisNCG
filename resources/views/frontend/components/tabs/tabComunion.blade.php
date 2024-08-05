    <div>
        <input value="{{ $persona->id }}" name="idPerson" type="hidden" readonly>
    </div>

    <div class="row d-flex align-items-center justify-content-start">
        <div class="col-md-1 m-0">
            <label for="nombrePersona" class="form-label m-0" style="font-weight: bold; padding-left: 15px;">Nombre:</label>
        </div>
        <div class="col-md-11 m-0">
            <input type="text" class="form-control color-e" id="nombrePersona" name="nombrePersona"
                value="{{ $persona->nombre }}" readonly>
        </div>
    </div>{{-- Nombre --}}

    <div class="row mt-2 justify-content-start align-items-center">
        <div class="col-md-12">
            <label for="" class="form-label" style="font-weight: bold; padding-left: 15px;">Recibio la Primera
                Comunión</label>
        </div>
    </div>{{-- Recibio el Sacramento de la Comunión --}}

    <div class="row mt-2 d-flex align-items-center justify-content-start">
        <div class="col-md-2 m-0">
            <label class="form-label m-0" style="font-weight: bold; padding-left: 15px;">En la
                parroquia</label>
        </div>
        <div class="col-md-10 m-0">
            <input type="text" class="form-control color-e" id="selectParroquia" name="selectParroquia"
                value="{{ $persona->Parroquia->nombre }} {{$comunionData->capilla}}" readonly>
        </div>
    </div>

    <div class="row mt-2 d-flex align-items-center justify-content-start">
        <div class="col-md-1 m-0">
            <label for="" class="form-label m-0" style="font-weight: bold; padding-left: 15px;">En</label>
        </div>
        <div class="col-md-6 m-0">
            <input type="text" class="form-control color-e" id="municipioParroquia2" name="municipioParroquia2"
                value="{{ $persona->Parroquia->municipio }}" readonly>
        </div>
        <div class="col-md-2 m-0">
            <label for="" class="form-label m-0" style="font-weight: bold; padding-left: 15px;">el dia de</label>
        </div>
        <div class="col-md-3 m-0">
            <input type="date" class="form-control color-e" id="registroComunion" name="registroComunion"
                value="{{ $comunionData->registro }}" readonly>
        </div>
    </div>

    <div class="row mt-2 d-flex align-items-center">
        <div class="col-md-1 m-0 justify-content-end">
            <label for="generoPersona" class="form-label m-0" style="font-weight: bold; padding-left: 15px;">Hij</label>
        </div>
        <div class="col-md-1 m-0">
            <input type="text" class="form-control color-e" id="generoPersona" name="generoPersona"
                value="{{ $persona->genero == 'Masculino' ? 'O' : 'A' }}" readonly>
        </div>
        <div class="col-md-1 m-0 justify-content-start">
            <label class="form-label m-0" style="font-weight: bold; padding-left: 15px;">Sr.</label>
        </div>
        <div class="col-md-4 m-0">
            <input type="text" class="form-control color-e" id="padrePersona" name="padrePersona"
                value="{{ $persona->nombre_papa }}" readonly>
        </div>
        <div class="col-md-1 m-0 justify-content-start">
            <label class="form-label m-0" style="font-weight: bold; padding-left: 15px;">Sra.</label>
        </div>
        <div class="col-md-4 m-0">
            <input type="text" class="form-control color-e" id="madrePersona" name="madrePersona"
                value="{{ $persona->nombre_mama }}" readonly>
        </div>
    </div>

    <div class="row mt-2 justify-content-start align-items-center d-flex">
        <div class="col-md-1 mt-0">
            <label for="" class="form-label m-0" style="font-weight: bold; padding-left: 15px;">Padrino</label>
        </div>
        <div class="col-md-11 mt-0">
            <input type="text" class="form-control color-e" id="padrinoComunion" name="padrinoComunion"
                placeholder="Ingrese el nombre completo del padrino" value="{{ $comunionData->padrino }}" required>
        </div>
    </div>

    <div class="row mt-2 justify-content-start align-items-center d-flex">
        <div class="col-md-1 mt-0">
            <label for="" class="form-label m-0" style="font-weight: bold; padding-left: 15px;">Madrina</label>
        </div>
        <div class="col-md-11 mt-0">
            <input type="text" class="form-control color-e" id="madrinaComunion" name="madrinaComunion"
                placeholder="Ingrese el nombre completo de la madrina" value="{{ $comunionData->madrina }}" readonly>
        </div>
    </div>

    <div class="row mt-2 d-flex align-items-center justify-content-start">
        <div class="col-md-3 m-0">
            <label class="form-label m-0" style="font-weight: bold; padding-left: 15px;">Bautizado
                en la
                parroquia
                de:</label>
        </div>
        <div class="col-md-8 mt-0">
            <input type="text" class="form-control color-e" id="bautismo" name="bautismo"
                value="{{ $comunionData->bautismo }}" readonly>
        </div>
    </div>

    <div class="row mt-2 d-flex align-items-center justify-content-start">
        <div class="col-md-1 m-0">
            <label class="form-label m-0" style="font-weight: bold; padding-left: 15px;">En</label>
        </div>
        <div class="col-md-5 mt-0">
            <input type="text" class="form-control color-e" id="lugar_bautismo" name="lugar_bautismo"
                value="{{ $comunionData->lugar_bautismo }}" readonly>
        </div>
        <div class="col-md-2 m-0">
            <label for="" class="form-label m-0" style="font-weight: bold; padding-left: 15px;">el dia de</label>
        </div>
        <div class="col-md-3 m-0">
            <input type="date" class="form-control color-e" id="fecha_bautismo" name="fecha_bautismo"
                value="{{ $comunionData->fecha_bautismo }}" readonly>
        </div>
    </div>

    {{-- Registro Libro Sacramento del Bautismo --}}
    <div class="row my-3 d-flex align-items-center justify-content-around">
        <div class="col-md-3 m-0">
            <label class="form-label" style="font-weight: bold;">Libro
                Sacramento de Bautismo</label>
        </div>
        <div class="col-auto">
            <label for="" class="form-label">Libro No.</label>
        </div>
        <div class="col">
            <input type="text" class="form-control color-e"
                value="{{ $comunionData->num_lib_bautismo }} {{ $comunionData->num_lib_letra_bautismo }}" readonly>
        </div>
        <div class="col-auto">
            <label for="" class="form-label">Folio</label>
        </div>
        <div class="col">
            <input type="number" class="form-control color-e" 
            value="{{ $comunionData->folio_bautismo }}" readonly>
        </div>
        <div class="col-auto">
            <label for="" class="form-label">Partida</label>
        </div>
        <div class="col">
            <input type="text" class="form-control color-e" 
            value="{{ $comunionData->partida_bautismo }}{{ $comunionData->letra_partida_bautismo }}" readonly>
        </div>
    </div>

    <hr>

    {{-- Libro Sacramento Comunion --}}
    <div class="row my-3 d-flex align-items-center justify-content-around">
        <div class="col-md-3">
            <label for="" class="form-label" style="font-weight: bold">Libro Sacramento de Eucaristía</label>
        </div>
        @foreach ($libro as $libroItem)
            @if ($libroItem['tipo'] == 'Comunion')
                <div class="col-auto">
                    <label for="" class="form-label">Libro
                        No.</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control color-e" id="libroSacramento" name="libroSacramento"
                        value="{{ $libroItem['numero_libro'] }} {{ $libroItem['num_letra'] }}" readonly>
                </div>
                <div class="col-auto ">
                    <label for="" class="form-label" >Folio</label>
                </div>
                <div class="col ">
                    <input type="number" class="form-control color-e" id="folioSacramento" name="folioSacramento"
                        value="{{ $libroItem['folio'] }}" readonly>
                </div>
                <div class="col-auto ">
                    <label for="" class="form-label">Partida</label>
                </div>
                <div class="col ">
                    <input type="text" class="form-control color-e" id="partidaSacramento" name="partidaSacramento"
                        value="{{ $libroItem['partida'] }} {{ $libroItem['letra_partida'] }}" readonly>
                </div>
            @endif
        @endforeach
    </div>

    <div class="row mt-2 justify-content-start align-items-center d-flex">
        <div class="col-md-1 mt-0">
            <label for="" class="form-label " style="font-weight: bold;">Celebrante</label>
        </div>
        <div class="col-md-11 ml-2">
            <div class="input-group mb-3 col-md-12 dropup">
                <input type="text" class="form-control color-e" id="selectedSacerdote" name="selectSacerdote"
                    value="{{ $comunionData->celebrante }}" readonly>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex align-items-center justify-content-start">
        <div class="col-md-12 m-0">
            <div class="form-floating">
                <textarea class="form-control color-e" placeholder="Notas" id="floatingTextarea" name="notas" readonly>{{ $comunionData->notas }}</textarea>
                <label for="floatingTextarea">Notas</label>
            </div>
        </div>
    </div>
