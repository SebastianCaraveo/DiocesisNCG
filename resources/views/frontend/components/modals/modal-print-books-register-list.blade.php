<div class="modal fade" id="ModalRecordsBooks" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de persona</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h1>Generar Documento</h1>
                    <form method="POST" action="{{ route('generate-document') }}">
                        @csrf
                        <div class="form-group">
                            <label for="tipo_sacramento">Tipo de Sacramento</label>
                            <select name="tipo_sacramento" id="tipo_sacramento" class="form-control">
                                @foreach($tipos_sacramento as $tipo)
                                    <option value="{{ $tipo }}">{{ $tipo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="numero_libro">Número de Libro</label>
                            <input type="number" class="form-control" name="numero_libro">
                        </div>
                        <div class="form-group">
                            <label for="letra_libro">Letra de Libro</label>
                            <input type="text" class="form-control" name="letra_libro">
                        </div>
                        <div class="form-group">
                            <label for="parroquia_id">Parroquia</label>
                            <select name="parroquia_id" id="parroquia_id" class="form-control">
                                @foreach($parroquias as $parroquia)
                                    <option value="{{ $parroquia->id }}">{{ $parroquia->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Generar Documento</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
