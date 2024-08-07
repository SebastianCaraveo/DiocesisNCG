<!-- Modal -->
<div class="modal fade" id="ModalRecordsBooks" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de persona</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h1>Imprimir Lista
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                            <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
                          </svg>
                    </h1>
                    <hr>
                    <form method="POST">
                        @csrf
                        <div class="form-group mt-3">

                            <label for="tipo_sacramento">Tipo de Sacramento
                            </label>
                            <select name="tipo_sacramento" id="tipo_sacramento" class="form-control">
                                @foreach ($tipos_sacramento as $tipo)
                                    <option value="{{ $tipo }}">{{ $tipo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="numero_libro">Número de Libro</label>
                                <input type="number" class="form-control" name="numero_libro">
                            </div>
                            <div class="form-group col">
                                <label for="letra_libro">Letra de Libro</label>
                                <input type="text" class="form-control" name="letra_libro">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="parroquia_id">Parroquia</label>
                            <select name="parroquia_id" id="parroquia_id" class="form-control">
                                @foreach ($parroquias as $parroquia)
                                    <option value="{{ $parroquia->id }}">{{ $parroquia->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Generar Documento</button>
            </div>
            </form>
        </div>
    </div>
</div>
