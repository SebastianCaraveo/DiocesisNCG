<div class="row d-flex align-items-center justify-content-start">
    <div class="col-auto">
        <label for="nombrePersona" class="form-label m-0" style="font-weight: bold;">Nombre:</label>
    </div>
    <div class="col">
        <input type="text" class="form-control color-b" id="nombrePersona" name="nombrePersona"
            value="{{ $persona->nombre }}" readonly>
    </div>
</div> {{-- Nombre --}}

<div class="row no-gutters mt-2 d-flex align-items-center">
    <div class="col-md-1 m-0 justify-content-end">
        <label for="generoPersona" class="form-label m-0" style="font-weight: bold; padding-left: 15px;">Hij</label>
    </div>
    <div class="col-md-1 m-0">
        <input type="text" class="form-control color-b" id="generoPersona" name="generoPersona"
            value="{{ $persona->genero == 'Masculino' ? 'O' : 'A' }}" readonly>
    </div>
    <div class="col-md-1 m-0 justify-content-start">
        <label class="form-label m-0" style="font-weight: bold; padding-left: 15px;">Sr.</label>
    </div>
    <div class="col-md-4 m-0">
        <input type="text" class="form-control color-b" id="padrePersona" name="padrePersona"
            value="{{ $persona->nombre_papa }}" readonly>
    </div>
    <div class="col-md-1 m-0 justify-content-start">
        <label class="form-label" style="font-weight: bold; padding-left: 15px;">Sra.</label>
    </div>
    <div class="col-md-4 m-0">
        <input type="text" class="form-control color-b" id="madrePersona" name="madrePersona"
            value="{{ $persona->nombre_mama }}" readonly>
    </div>
</div> {{-- Hij, Sr. y Sra. --}}

<div class="row mt-2 d-flex align-items-center justify-content-start">
    <div class="col-md-2 m-0">
        <label class="form-label m-0" style="font-weight: bold; padding-left: 15px;">Nacio
            el</label>
    </div>
    <div class="col-md-4 m-0">
        <input type="text" class="form-control color-b" id="nacimientoPersona" name="nacimientoPersona"
            value="{{ $persona->fecha_nacimiento['cadena'] }}" readonly>
    </div>
    <div class="col-md-1 m-0">
        <label class="form-label m-0" style="font-weight: bold; padding-left: 15px;">en</label>
    </div>
    <div class="col-md-5 m-0">
        <input type="text" class="form-control color-b" id="lugarPersona" name="lugarPersona"
            value="{{ $persona->lugar_nacimiento }}" readonly>
    </div>
</div>{{-- Naciio el, En --}}

<div class="row mt-2 justify-content-start align-items-center">
    <div class="col-md-12">
        <label for="" class="form-label" style="font-weight: bold; padding-left: 15px;">Recibio el
            sacramento del
            Bautismo</label>
    </div>
</div>

<div class="row mt-2 d-flex align-items-center justify-content-start">
    <div class="col-md-2 m-0">
        <label class="form-label m-0" style="font-weight: bold; padding-left: 15px;">En la
            parroquia
            de</label>
    </div>
    <div class="col-md-10 m-0">
        <input type="text" class="form-control color-b" id="selectParroquia" name="selectParroquia"
            value="{{ $persona->Parroquia->nombre }} {{ $bautismoData->capilla }}" readonly>
    </div>
</div>{{-- Parroquia --}}

<div class="row mt-2 d-flex align-items-center justify-content-start">
    <div class="col-md-1 m-0">
        <label for="" class="form-label m-0" style="font-weight: bold; padding-left: 15px;">En</label>
    </div>
    <div class="col-md-6 m-0">
        <input type="text" class="form-control color-b" id="municipioParroquia" name="municipioParroquia"
            value="{{ $persona->Parroquia->municipio }}" readonly>
    </div>
    <div class="col-md-2 m-0">
        <label for="" class="form-label m-0" style="font-weight: bold; padding-left: 15px;">el dia de</label>
    </div>
    <div class="col-md-3 m-0">
        <input type="date" class="form-control color-b" id="registroBautismo" name="registroBautismo"
            value="{{ $bautismoData->registro }}" readonly>
    </div>
</div>{{-- En, El dia de --}}

<div class="row mt-2 justify-content-start align-items-center d-flex">
    <div class="col-md-1 mt-0">
        <label for="" class="form-label" style="font-weight: bold; padding-left: 15px;">Padrinos</label>
    </div>
    <div class="col-md-11 mt-0">
        <input type="text" class="form-control color-b" id="padrinosBautismo" name="padrinosBautismo"
            value="{{ $bautismoData->padrinos }}" readonly>
    </div>
</div>

<div class="row mt-2 justify-content-start align-items-center d-flex">
    <div class="col-md-1 mt-0">
        <label for="" class="form-label " style="font-weight: bold;">Celebrante</label>
    </div>
    <div class="col-md-11 ml-2">
        <div class="col-md-12 ml-2">
            <div class="input-group mb-3 col-md-12 dropup">
                <input type="text" class="form-control color-b" id="selectedSacerdote" name="selectSacerdote"
                    value="{{ $bautismoData->celebrante }}" readonly>
            </div>
        </div>
    </div>
</div>

<div class="row mt-2 d-flex align-items-center justify-content-aroud">
    <div class="col-md-3 mb-0">
        <label for="" class="form-label" style="font-weight: bold">Libro Sacramento Bautismo</label>
    </div>
    @foreach ($libro as $libroItem)
        @if ($libroItem['tipo'] == 'Bautismo')
            <div class="col-auto">
                <label for="" class="form-label" style="">Libro
                    No.</label>
            </div>
            <div class="col">
                <input class="form-control color-b" id="libroSacramento" name="libroSacramento"
                    value="{{ $libroItem['numero_libro'] }} {{ $libroItem['num_letra'] }}" readonly>
            </div>
            <div class="col-auto">
                <label for="" class="form-label" style="">Folio</label>
            </div>
            <div class="col">
                <input class="form-control color-b" id="folioSacramento" name="folioSacramento"
                    value="{{ $libroItem['folio'] }}" readonly>
            </div>
            <div class="col-auto">
                <label for="" class="form-label" style="">Partida</label>
            </div>
            <div class="col">
                <input class="form-control color-b" id="partidaSacramento" name="partidaSacramento"
                    value="{{ $libroItem['partida'] }} {{ $libroItem['letra_partida']}}" readonly>
            </div>
        @endif
    @endforeach
</div>

<hr>

<div class="row mt-2 d-flex align-items-center justify-content-around">
    <div class="col-md-3 mb-0">
        <label for="" class="form-label" style="font-weight: bold;">Registro Civil Persona</label>
    </div>
    <div class="col-auto">
        <label for="" class="form-label" style="">Libro
            No.</label>
    </div>
    <div class="col">
        <input type="text" class="form-control color-b" value="{{$bautismoData->num_libro_rc}}" readonly>
    </div>
    <div class="col-auto">
        <label for="" class="form-label"
            style="">Foja</label>
    </div>
    <div class="col">
        <input type="text" class="form-control color-b" value="{{$bautismoData->folio_rc}}" readonly>
    </div>
    <div class="col-auto">
        <label for="" class="form-label"
            style="">Acta</label>
    </div>
    <div class="col">
        <input type="text" class="form-control color-b" value="{{$bautismoData->partida_rc}}" readonly>
    </div>    
</div>

<div class="row mt-3 d-flex align-items-center justify-content-start">
    <div class="col-md-3"></div>
    <div class="col-auto">
        <label for="" class="form-label">Delegación/Entidad</label>
    </div>
    <div class="col-md-5 mb-0">
        <input type="text" class="form-control color-b" value="{{$bautismoData->delegacion_rc}}" readonly>
    </div>
</div>

<div class="row my-3 d-flex align-items-center justify-content-center">
    <div class="col-md-4 m-0">
        <div class="form-floating">
            <textarea class="form-control color-b" placeholder="Recibio la Eucaristía en" id="floatingTextarea" name="partida_no" readonly>{{ $bautismoData->no_partida }}</textarea>
            <label for="floatingTextarea">Recibio la Eucaristía en</label>
        </div>
    </div>
    <div class="col-md-4 m-0">
        <div class="form-floating">
            <textarea class="form-control color-b" placeholder="Se confirmo en" id="floatingTextarea" name="confrimo" readonly>{{$bautismoData->lugar_confirmacion }}</textarea>
            <label for="floatingTextarea">Se confirmo en</label>
        </div>
    </div>
    <div class="col-md-4 m-0">
        <div class="form-floating">
            <textarea class="form-control color-b" placeholder="Contrajo Matrimonio en" id="floatingTextarea" name="matrimonio"
                readonly>{{ $bautismoData->contrajo_matrimonio }}</textarea>
            <label for="floatingTextarea">Contrajo Matrimonio en</label>
        </div>
    </div>
</div>

<div class="row mt-3 d-flex align-items-center justify-content-start">
    <div class="col-md-12 m-0">
        <div class="form-floating">
            <textarea class="form-control color-b" placeholder="Notas" id="floatingTextarea" name="notas" readonly>{{ $bautismoData->notas }}</textarea>
            <label for="floatingTextarea">Notas</label>
        </div>
    </div>
</div>
