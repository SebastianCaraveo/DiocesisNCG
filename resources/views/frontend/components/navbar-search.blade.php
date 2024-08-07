<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<style>
    .nav-tabs {
        margin-top: 1rem;
    }

    .toggle-btn {
        border: none;
        width: 100%;
        height: 35px;
        padding: 10px;
        cursor: pointer;
        text-align: center;
    }

    .toggle-btn svg {
        transition: transform 0.8s ease;
    }
</style>

<div class="container">
    <button type="button" class="toggle-btn btn btn-light" onclick="toggleTabs()">
        <i id="icon" class="fas">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                <path
                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
            </svg>
        </i>
    </button>
    <ul class="nav nav-tabs nav-fill nav-pills" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button"
                role="tab" aria-controls="tab1" aria-selected="true">Buscar por Nombre</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button"
                role="tab" aria-controls="tab2" aria-selected="false">Buscar por Libro</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active border p-3" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
            <div class="row">
                <h3 class="col-md-8">Campos para la búsqueda de personas por Nombre(s)</h3>
            </div>
            <div class="row d-flex justify-content-end">
                <div class="col-md-auto">
                    <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#ModalRecordsBooks">Imprimir Lista de Registros
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1"/>
                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                          </svg>
                    </button>
                </div>
                <div class="col-md-auto">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalPerson">Registrar
                        Persona
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                        </svg></button>
                </div>
            </div>
            <form method="GET" action="{{ route('personas.index') }}">
                <div class="row mt-3">
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre Completo"
                                name="nombre" required autofocus>
                            <label for="nombre">Nombre Completo</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nombre_mama" placeholder="Nombre de la Madre"
                                name="nombre_mama">
                            <label for="nombre_mama">Nombre de la Madre</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nombre_papa" placeholder="Nombre del Padre"
                                name="nombre_papa">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade border p-3" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
            <div class="row">
                <h3 class="col-md-8">Campos para la búsqueda de personas por Libro de Sacramento</h3>
            </div>
            <div class="row d-flex justify-content-end">
                <div class="col-md-auto">
                    <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#ModalRecordsBooks">Imprimir Lista de Registros
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1"/>
                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                          </svg>
                    </button>
                </div>
                <div class="col-md-auto">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalPerson">Registrar
                        Persona
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                        </svg></button>
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
                                        {{ $parroquia->nombre }}</option>
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
                            <input id="letter_partida" class="form-control" type="text" name="letra_partida"
                                placeholder="Letra">
                            <label for="letter_partida">Letra de Partida</label>
                        </div>
                    </div>
                    <div class="col-md-2 d-flex p-1">
                        <button class="btn btn-secondary btn-lg" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('frontend.components.modals.modalperson')
@include('frontend.components.modals.modal-print-books-register-list')
<script>
    function toggleTabs() {
        const tabs = document.getElementById('myTab');
        const content = document.getElementById('myTabContent');
        const button = document.querySelector('.toggle-btn');
        const icon = button.querySelector('svg');

        tabs.classList.toggle('d-none');
        content.classList.toggle('d-none');

        if (icon.classList.contains('bi-caret-up-fill')) {
            icon.outerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                  </svg>`;
        } else {
            icon.outerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                    <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                  </svg>`;
        }
    }
</script>

