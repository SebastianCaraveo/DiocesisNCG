<!-- Modal -->
<div class="modal fade" id="ModalPerson" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de persona</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->has('ErrorInsert'))
                    <div class="alert alert-danger">
                        {{ $errors->first('ErrorInsert') }}
                    </div>
                @endif
                <form action="{{ route('personas.store') }}" method="POST">
                    @csrf
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Nombre Completo"
                                name="nombre" required autofocus>
                            <label for="floatingInput">Nombre Completo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Nombre Completo del Padre" name="nombre_papa" required>
                                <label for="floatingInput">Nombre Completo del Padre</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Nombre Completo de la Madre" name="nombre_mama" required>
                                <label for="floatingInput">Nombre Completo de la Madre</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" id="genero" name="genero"
                                    aria-label="Floating label select example">
                                    <option disabled selected>Seleccionar una opción</option>
                                    <option value="2">Femenino</option>
                                    <option value="1">Masculino</option>
                                </select>
                                <label for="floatingSelect">Género de la Persona</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="floatingInput"
                                    placeholder="Fecha de Nacimiento" name="fecha_nacimiento">
                                <label for="floatingInput">Fecha de Nacimiento</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Lugar de Nacimiento" name="lugar_nacimiento">
                                <label for="floatingInput">Lugar de Nacimiento</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="justify-content-center">
                            <button class="btn btn-success col-md-12">Registrar Persona</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
