@if($persona)
    <a href="{{ route('personas.info', ['id' => $persona->id]) }}" class="card persona-card" data-person-id="{{ $persona->id }}" style="cursor: pointer; text-decoration: none; color: inherit;">
        <div class="card persona-card" data-person-id="{{ $persona->id }}" style="cursor: pointer;">
            <h3 class="card-header">{{ $persona->nombre }}</h3>
            <div class="card-body" style="display: flex; justify-content: space-between;">
                <div>
                    <p class="card-text" style="cursor: pointer;">
                        Nombre del Padre: {{ $persona->nombre_papa }} <br>
                        Nombre de la Madre: {{ $persona->nombre_mama }}
                    </p>
                </div>
                <div style="text-align: right;">
                    <p class="card-text" style="cursor: pointer;">
                        <br>
                        Fecha de Nacimiento: {{ $persona->fecha_nacimiento['cadena'] }}
                    </p>
                </div>
            </div>
        </div>
    </a>
@endif
