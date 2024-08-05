<div>
    <input value="{{$persona->id}}" name="idPerson" type="hidden" readonly>
</div>

<div class="row mt-2 d-flex align-items-center justify-content-start">
    <div class="col-md-2">
        <label class="form-label m-0" style="font-weight: bold; padding-left: 15px;">Parroquia
            de:</label>
</div>
    <div class="col-md-10 m-0">
        <input type="text" class="form-control color-m" value="{{$persona->Parroquia->nombre}} {{$matrimonioData->capilla}}" readonly>
    </div>
</div>

<div class="row mt-2 justify-content-start align-items-center">
    <div class="col-md-1 m-0">
        <label class="form-label m-0"
            style="font-weight: bold; padding-left: 15px;">Lugar</label>
    </div>
    <div class="col-md-11 m-0">
        <input type="text" class="form-control color-m" id="municipioParroquia4"
            name="municipioParroquia" value="{{$persona->Parroquia->municipio}}" readonly>
    </div>
</div>

<div class="row mt-2 justify-content-start align-items-center">
    <div class="col-md-1 m-0">
        <label class="form-label m-0"
            style="font-weight: bold; padding-left: 15px;">el</label>
    </div>
    <div class="col-md-11 m-0">
        <input type="date" class="form-control color-m" id="registro" name="registro"
            value="{{$matrimonioData->registro}}" readonly>
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
        <input type="text" class="form-control color-m" id="sr" name="sr"
            value="{{$matrimonioData->senor}}" readonly>
    </div>
</div>

<div class="row mt-2 d-flex align-items-center justify-content-start">
    <div class="col-md-1 m-0">
        <label for="" class="form-label m-0"
            style="font-weight: bold;">la Srita.</label>
    </div>
    <div class="col-md-11 m-0">
        <input type="text" class="form-control color-m" id="srita" name="srita"
            value="{{$matrimonioData->senorita}}" readonly>
    </div>
</div>

<div class="row mt-2 justify-content-start align-items-center d-flex">
    <div class="col-md-3 mt-0">
        <label for="" class="form-label m-0"
            style="font-weight: bold; padding-left: 15px;">Habiendo sido
            tesitgo el Sr.</label>
    </div>
    <div class="col-md-9 mt-0">
        <input type="text" class="form-control color-m" id="testigoSr" name="testigoSr"
            value="{{$matrimonioData->testigo_senor}}" readonly>
    </div>
</div>

<div class="row mt-2 justify-content-start align-items-center d-flex">
    <div class="col-md-3 mt-0">
        <label for="" class="form-label m-0"
            style="font-weight: bold; padding-left: 15px;">y la Srita.</label>
    </div>
    <div class="col-md-9 mt-0">
        <input type="text" class="form-control color-m" id="testigoSrita"
            name="testigoSrita" value="{{$matrimonioData->testigo_senorita}}" readonly>
    </div>
</div>

<div class="row mt-2 justify-content-start align-items-center d-flex">
    <div class="col-md-1 mt-0">
        <label for="" class="form-label "
            style="font-weight: bold;">Celebrante</label>
    </div>
    <div class="col-md-11 ml-2">
        <div class="input-group mb-3 col-md-12 dropup">
            <input type="text" class="form-control color-m" id="selectedSacerdote2"
                name="selectSacerdote" value="{{$matrimonioData->celebrante}}" readonly>
        </div>
    </div>
</div>

<div class="row mt-2 d-flex align-items-center justify-content-start">
    <div class="col-auto">
        <label for="" class="form-label fw-bold">Libro Sacramento Matrimonio</label>
    </div>
    @foreach ($libro as $libroItem)
        @if ($libroItem['tipo'] == 'Matrimonio')
            <div class="col-auto">
                <label for="" class="form-label">Libro No.</label>
            </div>
            <div class="col">
                <input type="text" class="form-control color-m" 
                    value="{{ $libroItem['numero_libro'] }} {{ $libroItem['num_letra'] }}" readonly>
            </div>
            <div class="col-auto">
                <label for="" class="form-label">Folio</label>
            </div>
            <div class="col">
                <input type="number" class="form-control color-m" 
                    value="{{ $libroItem['folio'] }}" readonly>
            </div>
            <div class="col-auto">
                <label for="" class="form-label">Partida</label>
            </div>
            <div class="col">
                <input type="text" class="form-control color-m" 
                    value="{{ $libroItem['partida'] }} {{ $libroItem['letra_partida'] }}" readonly>
            </div>
        @endif
    @endforeach
</div>

<div class="row mt-3 d-flex align-items-center justify-content-start">
    <div class="col-md-12 m-0">
        <div class="form-floating">
            <textarea class="form-control color-m" placeholder="Notas" id="floatingTextarea" name="notas" readonly>{{$matrimonioData->notas}}</textarea>
            <label for="floatingTextarea">Notas</label>
        </div>
    </div>
</div>
