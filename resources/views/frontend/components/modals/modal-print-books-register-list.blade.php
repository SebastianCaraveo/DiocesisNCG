<div class="modal fade" id="ModalRecordsBooks" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Imprimir Lista de Registros</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h1>Generar Documento</h1>
                <hr>
                <form method="POST" action="{{ route('generate-document') }}">
                    @csrf
                    <div class="form-group">
                        <label for="tipo_sacramento">Tipo de Sacramento</label>
                        <select name="tipo_sacramento" id="tipo_sacramento" class="form-control">
                            @foreach ($tipos_sacramento as $tipo)
                                <option value="{{ $tipo }}">{{ $tipo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="numero_libro">Número de Libro</label>
                            <input type="number" class="form-control" name="numero_libro">
                        </div>
                        <div class="col form-group">
                            <label for="letra_libro">Letra de Libro</label>
                            <input type="text" class="form-control" name="letra_libro">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="parroquia_id">Parroquia</label>
                        <select name="parroquia_id" id="parroquia_id" class="form-control">
                            @foreach ($parroquias as $parroquia)
                                <option value="{{ $parroquia->id }}" {{ $parroquia->id == $parroquiaUsuario ? 'selected' : '' }}>
                                    {{ $parroquia->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-secondary">Generar Documento PDF
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1"/>
                                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                                </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
