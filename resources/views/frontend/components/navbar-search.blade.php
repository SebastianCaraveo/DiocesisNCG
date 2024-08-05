<div>
    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1"
                type="button" role="tab" aria-controls="tab1" aria-selected="true">Buscar por
                Nombre</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button"
                role="tab" aria-controls="tab2" aria-selected="false">Buscar por Libro</button>
        </li>
        <li class="d-flex">
            <button class="toggle-btn" onclick="toggleTabs()">
                <i id="icon" class="fas fa-arrow-down"></i>
                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up" viewBox="0 0 16 16">
                    <path d="M3.204 11h9.592L8 5.519zm-.753-.659 4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659"/>
                  </svg> --}}
                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                    <path d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659"/>
                </svg> --}}
            </button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active border p-3" id="tab1" role="tabpanel"
            aria-labelledby="tab1-tab">
            <div class="row d-flex">
                <h3 class="col-md-8">Campos para la búsqueda de personas por Nombre(s)</h3>
                <div class="col-md-4 text-end">
                    <button class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#ModalPerson">Registrar Persona</button>
                </div>
            </div>
            <form method="GET" action="{{ route('personas.index') }}">
                <div class="row mt-3">
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nombre"
                                placeholder="Nombre Completo" name="nombre" required autofocus>
                            <label for="nombre">Nombre Completo</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nombre_mama"
                                placeholder="Nombre de la Madre" name="nombre_mama">
                            <label for="nombre_mama">Nombre de la Madre</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nombre_papa"
                                placeholder="Nombre del Padre" name="nombre_papa">
                            <label for="nombre_papa">Nombre del Padre</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="fecha_nacimiento"
                                placeholder="Fecha de Nacimiento" name="fecha_nacimiento">
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        </div>
                    </div>
                    <div class="col-auto d-flex p-1">
                        <button class="btn btn-secondary btn-lg" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade border p-3" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
            <div class="row d-flex">
                <h3 class="col-md-8">Campos para la búsqueda de personas por Libro de Sacramento</h3>
                <div class="col-md-4 text-end">
                    <button class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#ModalPerson">Registrar Persona</button>
                </div>
            </div>
            <form method="GET" action="{{ route('list_registers') }}">
                <div class="row align-items-center mt-3">
                    <div class="col-md-5">
                        <div class="form-floating">
                            <select class="form-select" id="parroquiaSelect" name="parroquia_id"
                                aria-label="Seleccionar parroquia">
                                @foreach ($parroquias as $parroquia)
                                    <option value="{{ $parroquia->id }}"
                                        {{ $parroquia->id == $parroquiaPredeterminada ? 'selected' : '' }}>
                                        {{ $parroquia->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="parroquiaSelect">Parroquia</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" name="tipo"
                                aria-label="Floating label select example">
                                <option disabled selected>Seleccionar el sacramento</option>
                                <option value="bautismo">Bautismo</option>
                                <option value="comunion">Primera Comunión</option>
                                <option value="confirmacion">Confirmación</option>
                                <option value="matrimonio">Matrimonio</option>
                            </select>
                            <label for="floatingSelect">Tipo de Sacramento</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-2">
                        <div class="form-floating">
                            <input id="number_book" class="form-control" type="number" name="numero_libro"
                                placeholder="#">
                            <label for="number_book">Libro</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-floating">
                            <input id="letter_book" class="form-control" type="text" name="num_letra"
                                placeholder="Letra">
                            <label for="letter_book">Letra de Libro</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-floating">
                            <input id="folio" class="form-control" type="number" name="folio"
                                placeholder="#">
                            <label for="folio">Folio</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-floating">
                            <input id="partida" class="form-control" type="number" name="partida"
                                placeholder="#">
                            <label for="partida">Partida</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-floating">
                            <input id="letter_partida" class="form-control" type="text"
                                name="letra_partida" placeholder="Letra">
                            <label for="letter_partida">Letra de Partida</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-lg" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
