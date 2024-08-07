@extends('layouts.app')

<style>
    .table tbody tr:hover td {
        /* background-color: darkcyan; */
        background-color:#0077cc;
        color: white;
    }

    .search-results-info {
        text-align: center;
        margin-bottom: 20px;
    }

    .tab-content .tab-pane {
        background-color: #ffffff;
        /* Color de fondo ligero */
        border-radius: 0 0 5px 5px;
        /* Bordes redondeados en la parte inferior */
    }

    .nav-tabs {
        border-bottom: none;
        /* Eliminar el borde inferior de los tabs */
        display: flex;
        justify-content: space-between;
        /* Alinear los tabs y el botón a los extremos */
    }

    .nav-tabs .nav-link {
        border: 1px solid transparent;
        /* Quitar borde inicial */
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        background-color: #ffffff;
        /* Color de fondo para los tabs */
        color: rgb(0, 0, 0);
        /* Color del texto en los tabs */
    }

    .nav-tabs .nav-link.active {
        background-color: #0077cc;
        /* Fondo para el tab activo */
        color: rgb(0, 0, 0);
        /* Color del texto en el tab activo */
        border-color: #dee2e6 #dee2e6 #fff;
        /* Bordes personalizados */
    }

    .toggle-btn {
    background-color: #4CAF50; /* Verde */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 8px;
    }

    .toggle-btn i {
        transition: transform 0.3s ease;
    }
</style>

@section('content')
    <div class="container py-2">
        <div class="mb-3">
            @include('frontend.components.navbar-search')
        </div>
        <div class="search-results-info">
            <h4 class="form-label fw-bold">Resultados de la Búsqueda</h4>
            <p>En la siguiente tabla se mostraran los resultados de su busqueda.</p>
        </div>

        @if (isset($paginatedPersons) && $paginatedPersons->count() > 0)
            <table class="table table-striped table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Nombre de la madre</th>
                        <th>Nombre del padre</th>
                        <th>Fecha de nacimiento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paginatedPersons as $persona)
                        <tr onclick="location.href='{{ route('personas.info', ['id' => $persona->id]) }}'"
                            style="cursor: pointer;">
                            <td>{{ $persona->nombre }}</td>
                            <td>{{ $persona->nombre_mama }}</td>
                            <td>{{ $persona->nombre_papa }}</td>
                            <td>{{ $persona->fecha_nacimiento['cadena'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $paginatedPersons->appends(request()->query())->links() }}
        @elseif(isset($sacramentos) && $sacramentos->count() > 0)
            <table class="table table-striped table-bordered mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Libro</th>
                        <th></th>
                        <th>Folio</th>
                        <th>Partida</th>
                        <th></th>
                        <th>Sacramento</th>
                        <th>Nombre de la Persona</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sacramentos as $sacramento)
                        <tr onclick="location.href='{{ route('personas.info', ['id' => $sacramento->persona->id]) }}'"
                            style="cursor: pointer;">
                            <td>{{ $sacramento->persona->id }}</td>
                            <td>{{ $sacramento->libroSacramento->numero_libro ?? '' }}</td>
                            <td>{{ $sacramento->libroSacramento->num_letra ?? '' }}</td>
                            <td>{{ $sacramento->libroSacramento->folio ?? '' }}</td>
                            <td>{{ $sacramento->libroSacramento->partida ?? '' }}</td>
                            <td>{{ $sacramento->libroSacramento->letra_partida ?? '' }}</td>
                            <td>{{ $sacramento->tipo }}</td>
                            <td>{{ $sacramento->persona->nombre ?? '' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $sacramentos->appends(request()->query())->links() }}
        @else
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Lo sentimos!</h4>
                <p>No se ha podido realizar su búsqueda con éxito. Recomendamos intentar con las siguientes opciones de
                    búsqueda.</p>
                <ul>
                    <li>Buscar por nombre completo, sin abreviar.</li>
                    <li>Utilizar datos adicionales como nombre de los padres o fecha de nacimiento.</li>
                </ul>
                <hr>
                <p>Esto puede deberse a errores en el registro de la base de datos o del libro de sacramentos, como omisión
                    o abreviación de nombres.</p>
            </div>
        @endif
    </div>
@endsection



