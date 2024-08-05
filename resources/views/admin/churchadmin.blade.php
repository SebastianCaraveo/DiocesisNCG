@extends('admin.layouts.main')

@section('content.church')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{ route('church.store') }}" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre_parroquia" class="form-control"
                                placeholder="Parroquia, Capilla, Catedral" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Dirección</label>
                            <input type="text" name="direccion_parroquia" class="form-control"
                                placeholder="Calle Benito Juarez #000 Col. Centro, 31700" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Municipio</label>
                            <select name="municipio_parroquia" class="form-select" required>
                                <option value="Nuevo Casas Grandes">Nuevo Casas Grandes</option>
                                <option value="Casas Grandes">Casas Grandes</option>
                                <option value="Ascención">Ascención</option>
                                <option value="Janos">Janos</option>
                                <option value="Buenaventura">Buenaventura</option>
                                <option value="Galeana">Galeana</option>
                                <option value="Ignacio Zaragoza">Ignacio Zaragoza</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ubicación Mapa</label>
                            <input type="text" name="ubicacion_parroquia" class="form-control"
                                placeholder="Comando de mapa" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono_parroquia" class="form-control"
                                placeholder="Número de teléfono" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Horario Oficina</label>
                            <input type="text" name="horario_parroquia" class="form-control"
                                placeholder="Lunes a Viernes de 9:00am - 12:00pm" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Parroco</label>
                            <select name="id_parroco" class="form-select" required>
                                @foreach ($parrocos as $parroco)
                                    <option value="{{ $parroco->id }}">{{ $parroco->sacerdote->nombre }}
                                        {{ $parroco->sacerdote->ap_paterno }} {{ $parroco->sacerdote->ap_materno }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-end" style="margin-top: 10px;">
                                <h2>Lista de Parroquias</h2>
                                <button type="submit" class="btn btn-primary btn-lg">Agregar</button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Lista de parroquias -->
                <div class="row justify-content-evenly">
                    @foreach ($parroquias as $parroquia)
                        <div class="col-md-5     mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">{{ $parroquia->nombre }}</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text"><strong>Dirección:</strong> {{ $parroquia->direccion }}</p>
                                    <p class="card-text"><strong>Municipio:</strong> {{ $parroquia->municipio }}</p>
                                    <p class="card-text"><strong>Teléfono:</strong> {{ $parroquia->telefono }}</p>
                                    <p class="card-text"><strong>Parroco:</strong> 
                                        @if ($parroquia->parroco && $parroquia->parroco->sacerdote)
                                            {{ $parroquia->parroco->sacerdote->nombre }} 
                                            {{ $parroquia->parroco->sacerdote->ap_paterno }} 
                                            {{ $parroquia->parroco->sacerdote->ap_materno }}
                                        @else
                                            Sin parroco asignado
                                        @endif
                                    </p>
                                    <p class="card-text"><strong>Horario:</strong> {{ $parroquia->horario }}</p>
                                    <div class="map-container">{{ $parroquia->ubicacion }}</div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('church.edit', ['parroquia'=>$parroquia->id] ) }}" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalEditParroquia{{ $parroquia->id }}">Editar</a>
                                    <form action="{{ route('church.destroy', ['parroquia' => $parroquia->id]) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ms-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                              </svg>
                                              Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>

@include('admin.components.modalEchurch')
@endsection


{{-- <script>    
    function resizeMap() {
        const mapContainer = document.querySelector('.map-container iframe');
        if (mapContainer) {
            mapContainer.style.height = mapContainer.offsetWidth * 0.75 + 'px'; // Ajusta la altura según el aspecto deseado
        }
    }
   
    window.addEventListener('load', resizeMap);

    window.addEventListener('resize', resizeMap);
</script>
 --}}