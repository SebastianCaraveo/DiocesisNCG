@extends('layouts.app')
@section('section-info')

<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button{
        -webkit-appearance: none;
        margin: 0;
    }
    input[type=number]{
        -moz-appearance: textfield;
    }
</style>

    <div class="container">
        {{--  --}}
        <div class="mt-2">
            @include('frontend.components.navbar-search')
        </div>


        {{-- Alertas --}}
        <div class="row">
            <div class="col-md-10">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>

        {{-- Pestañas --}}
        <nav>
            <div class="nav nav-tabs justify-content-between" id="nav-tab" role="tablist">
                <button class="nav-link" id="nav-info-tab" data-bs-toggle="tab" data-bs-target="#nav-info" type="button"
                    role="tab" aria-controls="nav-info" aria-selected="true">Informacion General</button>
                <button class="nav-link active" id="nav-bautismo-tab" data-bs-toggle="tab" data-bs-target="#nav-bautismo"
                    type="button" role="tab" aria-controls="nav-bautismo" aria-selected="false">Bautismo</button>
                <button class="nav-link" id="nav-eucaristia-tab" data-bs-toggle="tab" data-bs-target="#nav-eucaristia"
                    type="button" role="tab" aria-controls="nav-eucaristia" aria-selected="false">Eucaristia</button>
                <button class="nav-link" id="nav-confirmacion-tab" data-bs-toggle="tab" data-bs-target="#nav-confirmacion"
                    type="button" role="tab" aria-controls="nav-confirmacion"
                    aria-selected="false">Confirmacion</button>
                <button class="nav-link" id="nav-matrimonio-tab" data-bs-toggle="tab" data-bs-target="#nav-matrimonio"
                    type="button" role="tab" aria-controls="nav-disabled" aria-selected="false">Matrimonio</button>
            </div>
        </nav>

        {{-- Contenido de pestañas --}}
        <div class="tab-content" id="nav-tabContent">

            {{-- Informacion General --}}
            <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab" tabindex="0">
                <div class="p-3">
                    <table style="width:100%; font-size: 16px;">
                        <tr>
                            <th class="col-md-2" style="font-weight: bold; padding-left: 15px;">Id de la Persona:
                            </th>
                            <td class="col-md-9 "><span style="font-weight: normal;">{{ $persona->id }}</span></td>
                        </tr>
                        <br>
                        <tr>
                            <th class="col-md-2" style="font-weight: bold; padding-left: 15px;">Nombre Completo:
                            </th>
                            <td class="col-md-9 "><span style="font-weight: normal;">{{ $persona->nombre }}</span></td>
                        </tr>
                        <tr>
                            <th class="col-md-2" style="font-weight: bold; padding-left: 15px;">Nombre del
                                Padre:
                            </th>
                            <td class="col-md-9"><span style="font-weight: normal;">{{ $persona->nombre_papa }}</span></td>
                        </tr>
                        <tr>
                            <th class="col-md-2" style="font-weight: bold; padding-left: 15px;">Nombre de la
                                Madre:
                            </th>
                            <td class="col-md-9 "><span style="font-weight: normal;">{{ $persona->nombre_mama }}</span></td>
                        </tr>
                        <tr>
                            <th class="col-md9" style="font-weight: bold; padding-left: 15px;">Fecha de
                                Nacimiento:
                            </th>
                            <td class="col-md-9"><span
                                    style="font-weight: normal;">{{ $persona->fecha_nacimiento['cadena'] }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-2" style="font-weight: bold; padding-left: 15px;">Lugar de
                                Nacimiento:
                            </th>
                            <td class="col-md-9"><span style="font-weight: normal;">{{ $persona->lugar_nacimiento }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-2" style="font-weight: bold; padding-left: 15px;">Género:</th>
                            <td class="col-md9"><span style="font-weight: normal;">{{ $persona->genero }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-2" style="font-weight: bold; padding-left: 15px;">Sacramentos:</th>
                            <td class="col-md-9">
                                <span style="font-weight: normal;">
                                    @if ($sacramentosPersona[$persona->id]['bautismo'])
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="green" class="bi bi-check-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zm-.47 11.53a.5.5 0 0 0 .47.47h.47a.5.50 0 0 0 .47-.47l.12-.71a6.51 6.51 0 0 0-.47-2.57.75.75 0 0 0-1.45 0 6.51 6.51 0 0 0-.47 2.57l.12.71zm-.02-3.97a1 1 0 1 0-1.96 0 1 1 0 0 0 1.96 0z" />
                                        </svg>
                                        Bautizado
                                    @endif

                                    @if ($sacramentosPersona[$persona->id]['comunion'])
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="green" class="bi bi-check-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zm-.47 11.53a.5.5 0 0 0 .47.47h.47a.5.50 0 0 0 .47-.47l.12-.71a6.51 6.51 0 0 0-.47-2.57.75.75 0 0 0-1.45 0 6.51 6.51 0 0 0-.47 2.57l.12.71zm-.02-3.97a1 1 0 1 0-1.96 0 1 1 0 0 0 1.96 0z" />
                                        </svg>
                                        Primera Comunión
                                    @endif

                                    @if ($sacramentosPersona[$persona->id]['confirmacion'])
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="green" class="bi bi-check-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zm-.47 11.53a.5.5 0 0 0 .47.47h.47a.5.50 0 0 0 .47-.47l.12-.71a6.51 6.51 0 0 0-.47-2.57.75.75 0 0 0-1.45 0 6.51 6.51 0 0 0-.47 2.57l.12.71zm-.02-3.97a1 1 0 1 0-1.96 0 1 1 0 0 0 1.96 0z" />
                                        </svg>
                                        Confirmación
                                    @endif

                                    @if ($sacramentosPersona[$persona->id]['matrimonio'])
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="green" class="bi bi-check-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zm-.47 11.53a.5.5 0 0 0 .47.47h.47a.5.50 0 0 0 .47-.47l.12-.71a6.51 6.51 0 0 0-.47-2.57.75.75 0 0 0-1.45 0 6.51 6.51 0 0 0-.47 2.57l.12.71zm-.02-3.97a1 1 0 1 0-1.96 0 1 1 0 0 0 1.96 0z" />
                                        </svg>
                                        Matrimonio
                                    @endif
                                </span>
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="d-flex">
                    <div class="row m-2 col-md-12">
                        <div class="col-md-8 ">
                            <div class="col-md-4 text-start">
                                @if (Auth::user()->rol == 'Administrador')
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editPersonaModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path
                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                        </svg>
                                        Editar
                                    </button>
                                @endif
                            </div>
                            <div class="col-md-4">
                                @if (Auth::user()->rol == 'Administrador')
                                    <form method="POST" action="{{ route('personas.destroy', $persona->id) }}"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar a esta persona?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger custom-btn"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                            </svg>
                                            Eliminar
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bautismo --}}
            <div class="tab-pane fade show active" id="nav-bautismo" role="tabpanel" aria-labelledby="nav-bautismo-tab"
                tabindex="0">
                <div class="mt-3">
                    <div class="container-fluid">
                        <div class="container text-center">
                            @if (!$sacramentosPersona[$persona->id]['bautismo'])
                                <form action="{{ route('bautismo.store') }}" method="POST">
                                    @csrf
                                    <div>
                                        <input value="{{ $persona->id }}" name="idPerson" type="hidden" readonly>
                                    </div>
                                    <div class="row d-flex align-items-center justify-content-start">
                                        <div class="col-md-1 m-0">
                                            <label for="nombrePersona" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Nombre:</label>
                                        </div>
                                        <div class="col-md-11 m-0">
                                            <input type="text" class="form-control color-b" id="nombrePersona"
                                                name="nombrePersona" value="{{ $persona->nombre }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row no-gutters mt-2 d-flex align-items-center">
                                        <div class="col-md-1 m-0 justify-content-end">
                                            <label for="generoPersona" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Hij</label>
                                        </div>
                                        <div class="col-md-1 m-0">
                                            <input type="text" class="form-control color-b" id="generoPersona"
                                                name="generoPersona"
                                                value="{{ $persona->genero == 'Masculino' ? 'O' : 'A' }}" readonly>
                                        </div>
                                        <div class="col-md-1 m-0 justify-content-start">
                                            <label class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Sr.</label>
                                        </div>
                                        <div class="col-md-4 m-0">
                                            <input type="text" class="form-control color-b" id="padrePersona"
                                                name="padrePersona" value="{{ $persona->nombre_papa }}" readonly>
                                        </div>
                                        <div class="col-md-1 m-0 justify-content-start">
                                            <label class="form-label"
                                                style="font-weight: bold; padding-left: 15px;">Sra.</label>
                                        </div>
                                        <div class="col-md-4 m-0">
                                            <input type="text" class="form-control color-b" id="madrePersona"
                                                name="madrePersona" value="{{ $persona->nombre_mama }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                                        <div class="col-md-2 m-0">
                                            <label class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Nacio
                                                el</label>
                                        </div>
                                        <div class="col-md-4 m-0">
                                            <input type="text" class="form-control color-b" id="nacimientoPersona"
                                                name="nacimientoPersona"
                                                value="{{ $persona->fecha_nacimiento['cadena'] }}" readonly>
                                        </div>
                                        <div class="col-md-1 m-0">
                                            <label class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">en</label>
                                        </div>
                                        <div class="col-md-5 m-0">
                                            <input type="text" class="form-control color-b" id="lugarPersona"
                                                name="lugarPersona" value="{{ $persona->lugar_nacimiento }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row my-3 align-items-center justify-content-center">
                                        <div class="col-auto">
                                            <label for="" class="form-label"
                                                style="font-weight: bold;">
                                                Recibio el sacramento del Bautismo</label>
                                        </div>
                                    </div>

                                    <div class="row d-flex align-items-center justify-content-start">
                                        <div class="col-md-2 m-0">
                                            <label class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">En la parroquia de</label>
                                        </div>
                                        <div class="col-md-5 m-0">
                                            <input type="text" class="form-control color-b" id="selectParroquia2"
                                                value="{{ Session::get('parroquia_nombre') }}" readonly>
                                            <input type="hidden" name="id_parroquia" id="idParroquia"
                                                value="{{ Session::get('parroquia_id') }}">
                                        </div>
                                        <div class="col-md-5 m-0">
                                            <input type="text" class="form-control color-b"
                                                    placeholder="Ingrese la capilla" name="capilla">
                                        </div>
                                    </div>

                                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                                        <div class="col-md-1 m-0">
                                            <label for="" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">En</label>
                                        </div>
                                        <div class="col-md-6 m-0">
                                            <input type="text" class="form-control color-b" id="municipioParroquia2"
                                                name="municipioParroquia2"
                                                value="{{ Session::get('parroquia_municipio') }}" readonly>
                                        </div>
                                        <div class="col-md-2 m-0">
                                            <label for="" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">el dia de</label>
                                        </div>
                                        <div class="col-md-3 m-0">
                                            <input type="date" class="form-control color-b" id="registroBautismo"
                                                name="registroBautismo">
                                        </div>
                                    </div>

                                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                                        <div class="col-md-2 mt-0">
                                            <label for="" class="form-label "
                                                style="font-weight: bold; padding-left: 15px;">Celebrante</label>
                                        </div>
                                        <div class="col-md-10 ml-2">
                                            <div class="input-group mb-3 col-md-12 dropup">
                                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" id="sacerdoteDropdown1">
                                                    @foreach ($sacerdotes as $sacerdote)
                                                        <li><a class="dropdown-item"
                                                                data-sacerdote="{{ $sacerdote->nombre }} {{ $sacerdote->ap_paterno }} {{ $sacerdote->ap_materno }}">{{ $sacerdote->nombre }}
                                                                {{ $sacerdote->ap_paterno }}
                                                                {{ $sacerdote->ap_materno }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <input type="text" class="form-control color-b"
                                                    id="selectedSacerdote1" name="selectSacerdote">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                                        <div class="col-md-1 mt-0">
                                            <label for="" class="form-label"
                                                style="font-weight: bold; padding-left: 15px;">Padrinos</label>
                                        </div>
                                        <div class="col-md-11 mt-0">
                                            <input type="text" class="form-control color-b" id="padrinosBautismo"
                                                name="padrinosBautismo"
                                                placeholder="Ingrese el nombre completo de los padrinos" required>
                                        </div>
                                    </div>

                                    {{-- Libro de Sacramentos --}}
                                    <div class="row mt-4 mb-2 d-flex align-items-center justify-content-around">
                                        <div class="col-md-3">
                                            <label for="" class="form-label" style="font-weight: bold;">Libro
                                                Sacramento Bautismo</label>
                                        </div>
                                        <div class="col">
                                            <label for="" class="form-label" style="">Libro
                                                No.</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-b" id="libroSacramento"
                                                name="libroSacramento" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-b"
                                                id="libroLetraSacramento" name="libroLetraSacramento">
                                        </div>
                                        <div class="col">
                                            <label for="" class="form-label"
                                                style="">Folio</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-b" id="folioSacramento"
                                                name="folioSacramento" required>
                                        </div>
                                        <div class="col">
                                            <label for="" class="form-label"
                                                style="">Partida</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-b" id="partidaSacramento"
                                                name="partidaSacramento" style="width: 80px; height: 40px;" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-b"
                                            name="num_letra_partida" style="width: 80px; height: 40px;">
                                        </div>
                                    </div>

                                    <hr>

                                    {{-- Registro Civil --}}
                                    <div class="row mb-4 mt-2 d-flex align-items-center justify-content-around">
                                        <div class="col-md-3">
                                            <label for="" class="form-label"
                                                style="font-weight: bold;">Registro Civil Persona</label>
                                        </div>
                                        <div class="col">
                                            <label for="" class="form-label" style="">Libro
                                                No.</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-b" name="libroRC">
                                        </div>
                                        <div class="col">
                                            <input type="hidden" class="form-control color-b" name=""
                                                readonly>
                                        </div>
                                        <div class="col">
                                            <label for="" class="form-label"
                                                style="">Foja</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-b" name="folioRC">
                                        </div>
                                        <div class="col">
                                            <label for="" class="form-label"
                                                style="">Acta</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-b" name="actaRC" style="width: 180px; height: 40px;">
                                        </div>

                                    </div>

                                        {{-- Delegacion/Entidad --}}
                                    <div class="row mb-3 d-flex">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-2 mb-0">
                                            <label for="" class="form-label"
                                                style="">Delegación/Entidad</label>
                                        </div>
                                        <div class="col-md-5 mb-0">
                                            <input type="text" class="form-control color-b" name="delegacionRC">
                                        </div>
                                    </div>

                                    <div class="row my-3 d-flex align-items-center justify-content-center">
                                        <div class="col-md-4 m-0">
                                            <div class="form-floating">
                                                <textarea class="form-control color-b" placeholder="Recibio la Eucaristía en" id="floatingTextarea"
                                                    name="partida_no"></textarea>
                                                <label for="floatingTextarea">Recibio la Eucaristía en</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 m-0">
                                            <div class="form-floating">
                                                <textarea class="form-control color-b" placeholder="Se confirmo en" id="floatingTextarea" name="confirmo"></textarea>
                                                <label for="floatingTextarea">Se confirmo en</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 m-0">
                                            <div class="form-floating">
                                                <textarea class="form-control color-b" placeholder="Contrajo Matrimonio en" id="floatingTextarea" name="matrimonio"></textarea>
                                                <label for="floatingTextarea">Contrajo Matrimonio en</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3 d-flex align-items-center justify-content-start">
                                        <div class="col-md-12 m-0">
                                            <div class="form-floating">
                                                <textarea class="form-control color-b" placeholder="Notas" id="floatingTextarea" name="notas"></textarea>
                                                <label for="floatingTextarea">Notas</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row d-flex m-2 align-items-center justify-content-end">
                                        <div class="col-md-1">
                                            <button type="submit"
                                                class="btn btn-success btn-lg btn-block">Agregar</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                {{-- Lo que se le mostrara al usuario --}}
                                @include('frontend.components.tabs.tabBautismo')
                                {{-- Botones de acciones solo permitidas por el administrador --}}
                                <div class="footer d-flex align-items-center justify-content-end">
                                    @if (Auth::user()->rol == 'Administrador')
                                        <div class="btn-group">
                                            <button class="btn btn-warning mb-3 me-2 btn-functions" data-bs-toggle="modal"
                                                data-bs-target="#ModalBautismo">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                </svg>
                                            </button>
                                            <form action="{{ route('bautismo.destroy', ['id' => $persona->id]) }}"
                                                method="post" style="display:inline;"
                                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar a este sacramento? (Sacramento: Bautismo)');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-functions">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Eucaristia --}}
            <div class="tab-pane fade" id="nav-eucaristia" role="tabpanel" aria-labelledby="nav-eucaristia-tab"
                tabindex="0">
                <div class="mt-3">
                    <div class="container-fluid">
                        <div class="container text-center">
                            @if (!$sacramentosPersona[$persona->id]['comunion'])
                                <form action="{{ route('comunion.store') }}" method="post">
                                    @csrf

                                    <div>
                                        <input value="{{ $persona->id }}" name="id_persona" type="hidden" readonly>
                                    </div>

                                    <div class="row d-flex align-items-center justify-content-start">
                                        <div class="col-md-1 m-0">
                                            <label for="nombrePersona" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Nombre:</label>
                                        </div>
                                        <div class="col-md-11 m-0">
                                            <input type="text" class="form-control color-e" id="nombre_persona"
                                                name="nombre_persona" value="{{ $persona->nombre }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row my-3 align-items-center justify-content-center">
                                        <div class="col-auto">
                                            <label for="" class="form-label"
                                                style="font-weight: bold;">
                                                Recibio la Primera Comunión</label>
                                        </div>
                                    </div>

                                    <div class="row d-flex align-items-center justify-content-start">
                                        <div class="col-md-2 m-0">
                                            <label class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">En la
                                                parroquia</label>
                                        </div>
                                        <div class="col-md-5 m-0">
                                            <input type="text" class="form-control color-e" id="selectParroquia2"
                                                value="{{ Session::get('parroquia_nombre') }}" readonly>
                                            <input type="hidden" name="id_parroquia" id="idParroquia"
                                                value="{{ Session::get('parroquia_id') }}">
                                        </div>
                                        <div class="col-md-5 m-0">
                                                <input type="text" class="form-control color-e"
                                                    placeholder="Ingresar capilla de ser necesario" name="capilla">
                                        </div>
                                    </div>

                                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                                        <div class="col-md-1 m-0">
                                            <label for="" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">En</label>
                                        </div>
                                        <div class="col-md-6 m-0">
                                            <input type="text" class="form-control color-e" id="municipioParroquia2"
                                                name="municipioParroquia2"
                                                value="{{ Session::get('parroquia_municipio') }}" readonly>
                                        </div>
                                        <div class="col-md-2 m-0">
                                            <label for="" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">el dia de</label>
                                        </div>
                                        <div class="col-md-3 m-0">
                                            <input type="date" class="form-control color-e" id="registroComunion"
                                                name="fecha_registro_comunion">
                                        </div>
                                    </div>

                                    <div class="row mt-2 d-flex align-items-center">
                                        <div class="col-md-1 m-0 justify-content-end">
                                            <label for="generoPersona" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Hij</label>
                                        </div>
                                        <div class="col-md-1 m-0">
                                            <input type="text" class="form-control color-e" id="generoPersona"
                                                name="generoPersona"
                                                value="{{ $persona->genero == 'Masculino' ? 'O' : 'A' }}" readonly>
                                        </div>
                                        <div class="col-md-1 m-0 justify-content-start">
                                            <label class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Sr.</label>
                                        </div>
                                        <div class="col-md-4 m-0">
                                            <input type="text" class="form-control color-e" id="padrePersona"
                                                name="padrePersona" value="{{ $persona->nombre_papa }}" readonly>
                                        </div>
                                        <div class="col-md-1 m-0 justify-content-start">
                                            <label class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Sra.</label>
                                        </div>
                                        <div class="col-md-4 m-0">
                                            <input type="text" class="form-control color-e" id="madrePersona"
                                                name="madrePersona" value="{{ $persona->nombre_mama }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                                        <div class="col-md-1 mt-0">
                                            <label for="" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Padrino</label>
                                        </div>
                                        <div class="col-md-11 mt-0">
                                            <input type="text" class="form-control color-e" id="padrinoComunion"
                                                name="padrino_comunion"
                                                placeholder="Ingrese el nombre completo del padrino">
                                        </div>
                                    </div>

                                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                                        <div class="col-md-1 mt-0">
                                            <label for="" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Madrina</label>
                                        </div>
                                        <div class="col-md-11 mt-0">
                                            <input type="text" class="form-control color-e" id="madrinaComunion"
                                                name="madrina_comunion"
                                                placeholder="Ingrese el nombre completo de la madrina">
                                        </div>
                                    </div>

                                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                                        <div class="col-md-3 m-0">
                                            <label class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Bautizado
                                                en la
                                                parroquia
                                                de:</label>
                                        </div>
                                        <div class="col-md-8 mt-0">
                                            <input type="text" class="form-control color-e" id="bautismo"
                                                name="parroquia_bautizado" placeholder="Parroquia donde haya sido bautizado">
                                        </div>
                                    </div>

                                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                                        <div class="col-md-1 m-0">
                                            <label class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">En</label>
                                        </div>
                                        <div class="col-md-5 mt-0">
                                            <input type="text" class="form-control color-e" id="lugar_bautismo"
                                                name="municipio_bautizado" placeholder="Parroquia donde haya sido bautizado">
                                        </div>
                                        <div class="col-md-2 m-0">
                                            <label for="" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">el dia de</label>
                                        </div>
                                        <div class="col-md-3 m-0">
                                            <input type="date" class="form-control color-e" id="fecha_bautismo"
                                                name="fecha_bautizado">
                                        </div>
                                    </div>

                                    {{-- Libro Sacramento Bautismo --}}
                                    <div class="row my-4 d-flex align-items-center justify-content-start">
                                        <div class="col-md-3 m-0">
                                            <label class="form-label" style="font-weight: bold">Libro
                                                Sacramento de Bautismo</label>
                                        </div>
                                        <div class="col-auto">
                                            <label for="" class="form-label">Libro No.</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-e" id="libroSacramento"
                                                name="libro_sacramento_bautismo">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-e" id="libroSacramento"
                                                name="libro_sacramento_letra_bautismo">
                                        </div>
                                        <div class="col-auto">
                                            <label for="" class="form-label">Folio</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-e" id="folioSacramento"
                                                name="folio_sacramento_bautismo">
                                        </div>
                                        <div class="col-auto">
                                            <label for="" class="form-label">Partida</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-e" id="partidaSacramento"
                                                name="partida_sacramento_bautismo">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-e" id="partidaSacramento"
                                                name="partida_letra_sacramento_bautismo">
                                        </div>
                                    </div>

                                    <hr>

                                    {{-- Libro Sacramento Comunion --}}
                                    <div class="row mb-4 d-flex align-items-center justify-content-start">
                                        <div class="col-md-3 m-0">
                                            <label class="form-label" style="font-weight: bold;">Libro
                                                Sacramento de Eucaristía</label>
                                        </div>
                                        <div class="col-auto">
                                            <label for="" class="form-label" style="font-weight: bold;">Libro No.</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-e" id="libroSacramento"
                                                name="libro_sacramento" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-e" id="libroLetraSacramento"
                                                name="libro_letra_sacramento">
                                        </div>
                                        <div class="col-auto">
                                            <label for="" class="form-label">Folio</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-e" id="folioSacramento"
                                                name="folio_sacramento" required>
                                        </div>
                                        <div class="col-auto">
                                            <label for="" class="form-label">Partida</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-e" id="partidaSacramento"
                                                name="partida_sacramento" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-e" id="partidaSacramento"
                                                name="letra_partida_sacramento">
                                        </div>
                                    </div>

                                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                                        <div class="col-md-1 mt-0">
                                            <label for="" class="form-label "
                                                style="font-weight: bold;">Celebrante</label>
                                        </div>
                                        <div class="col-md-11 ml-2">
                                            <div class="input-group mb-3 col-md-12 dropup">
                                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" id="sacerdoteDropdown2">
                                                    @foreach ($sacerdotes as $sacerdote)
                                                        <li><a class="dropdown-item"
                                                                data-sacerdote="{{ $sacerdote->nombre }} {{ $sacerdote->ap_paterno }} {{ $sacerdote->ap_materno }}">{{ $sacerdote->nombre }}
                                                                {{ $sacerdote->ap_paterno }}
                                                                {{ $sacerdote->ap_materno }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <input type="text" class="form-control color-e"
                                                    id="selectedSacerdote2" name="sacerdote">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3 d-flex align-items-center justify-content-start">
                                        <div class="col-md-12 m-0">
                                            <div class="form-floating">
                                                <textarea class="form-control color-e" placeholder="Notas" id="floatingTextarea" name="notas"></textarea>
                                                <label for="floatingTextarea">Notas</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer d-flex justify-content-end my-3">
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-lg">Agregar</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                @include('frontend.components.tabs.tabComunion')
                                <div class="footer d-flex align-items-center justify-content-end mt-3">
                                    @if (Auth::user()->rol == 'Administrador')
                                        <div class="btn-group">
                                            <button class="btn btn-warning mb-3 me-2 btn-functions" data-bs-toggle="modal"
                                                data-bs-target="#ModalComunion">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                </svg>
                                            </button>
                                            <form action="{{ route('comunion.destroy', ['id' => $persona->id]) }}"
                                                method="post" style="display:inline;"
                                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar a este sacramento? (Sacramento: Bautismo)');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-functions">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Confirmacion --}}
            <div class="tab-pane fade" id="nav-confirmacion" role="tabpanel" aria-labelledby="nav-confirmacion-tab"
                tabindex="0">
                <div class="mt-3">
                    <div class="container-fluid">
                        <div class="container text-center">
                            @if (!$sacramentosPersona[$persona->id]['confirmacion'])
                                <form action="{{ route('confirmacion.store') }}" method="post">
                                    @csrf

                                    <div class="row d-flex align-items-center justify-content-start">

                                        <div>
                                            <input value="{{ $persona->id }}" name="id_persona" type="hidden" readonly>
                                        </div>

                                        <div class="col-md-1 m-0">
                                            <label for="nombrePersona" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Nombre:</label>
                                        </div>

                                        <div class="col-md-11 m-0">
                                            <input type="text" class="form-control color-c" id="nombrePersona"
                                                name="nombrePersona" value="{{ $persona->nombre }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row no-gutters mt-2 d-flex align-items-center">
                                        <div class="col-md-1 m-0 justify-content-end">
                                            <label for="generoPersona" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Hij</label>
                                        </div>
                                        <div class="col-md-1 m-0">
                                            <input type="text" class="form-control color-c" id="generoPersona"
                                                name="generoPersona"
                                                value="{{ $persona->genero == 'Masculino' ? 'O' : 'A' }}" readonly>
                                        </div>
                                        <div class="col-md-1 m-0 justify-content-start">
                                            <label class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Sr.</label>
                                        </div>
                                        <div class="col-md-4 m-0">
                                            <input type="text" class="form-control color-c" id="padrePersona"
                                                name="padrePersona" value="{{ $persona->nombre_papa }}" readonly>
                                        </div>
                                        <div class="col-md-1 m-0 justify-content-start">
                                            <label class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Sra.</label>
                                        </div>
                                        <div class="col-md-4 m-0">
                                            <input type="text" class="form-control color-c" id="madrePersona"
                                                name="madrePersona" value="{{ $persona->nombre_mama }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                                        <div class="col-md-2 m-0 justify-content-end">
                                            <label for="generoPersona" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Bautizad</label>
                                        </div>
                                        <div class="col-md-1 m-0">
                                            <input type="text" class="form-control color-c" id="generoPersona"
                                                name="generoPersona"
                                                value="{{ $persona->genero == 'Masculino' ? 'O' : 'A' }}" readonly>
                                        </div>
                                        <div class="col-md-3 m-0">
                                            <label class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">En la
                                                parroquia
                                                de</label>
                                        </div>
                                        <div class="col-md-6 m-0">
                                            <input type="text" class="form-control color-c" id="bautismo_parroquia"
                                                name="parroquia_bautismo">
                                        </div>
                                    </div>

                                    <div class="row mt-2 justify-content-start align-items-center">
                                        <div class="col-md-1 m-0">
                                            <label class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">en</label>
                                        </div>
                                        <div class="col-md-5 m-0">
                                            <input type="text" class="form-control color-c" id="municipio_bautismo"
                                                name="municipio_bautismo">
                                        </div>
                                        <div class="col-md-1 m-0">
                                            <label class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">el</label>
                                        </div>
                                        <div class="col-md-5 m-0">
                                            <input type="date" class="form-control color-c" id="fecha_bautismo"
                                                name="fecha_bautismo">
                                        </div>
                                    </div>

                                    {{-- Libro Sacramento Bautismo --}}
                                    <div class="row my-4 d-flex align-items-center justify-content-start">
                                        <div class="col-auto">
                                            <label class="form-label" style="font-weight: bold;">Libro
                                                Sacramento de Bautismo</label>
                                        </div>
                                        <div class="col-auto">
                                            <label for="" class="form-label">Libro No.</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-c" id="no_libro_bautismo"
                                                name="numero_libro_bautismo">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-c" id="no_libro_bautismo"
                                                name="letra_libro_bautismo">
                                        </div>
                                        <div class="col-auto">
                                            <label for="" class="form-label">Folio</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-c" id="folio_bautismo"
                                                name="folio_bautismo">
                                        </div>
                                        <div class="col-auto">
                                            <label for="" class="form-label">Partida</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-c" id="partida_bautismo"
                                                name="partida_bautismo">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-c"
                                                name="partida_letra_bautismo">
                                        </div>
                                    </div>

                                    <div class="row my-3 align-items-center justify-content-center">
                                        <div class="col-auto">
                                            <label for="" class="form-label"
                                                style="font-weight: bold;">
                                                Recibio el sacramento de la Confirmación</label>
                                        </div>
                                    </div>

                                    <div class="row d-flex align-items-center justify-content-start">
                                        <div class="col-auto">
                                            <label class="form-label"
                                                style="font-weight: bold;">En la
                                                parroquia</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-c" id="selectParroquia2"
                                                value="{{ Session::get('parroquia_nombre') }}" readonly>
                                            <input type="hidden" name="id_parroquia" id="idParroquia"
                                                value="{{ Session::get('parroquia_id') }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-c" id="inputCapilla3"
                                                placeholder="Ingrese la capilla de ser necesario" name="capilla">
                                        </div>
                                    </div>

                                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                                        <div class="col-md-1 m-0">
                                            <label for="" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">En</label>
                                        </div>
                                        <div class="col-md-6 m-0">
                                            <input type="text" class="form-control color-c" id="municipioParroquia2"
                                                name="municipioParroquia2"
                                                value="{{ Session::get('parroquia_municipio') }}" readonly>
                                        </div>
                                        <div class="col-md-2 m-0">
                                            <label for="" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">el dia de</label>
                                        </div>
                                        <div class="col-md-3 m-0">
                                            <input type="date" class="form-control m-0 color-c"
                                                name="fecha_registro_confirmacion">
                                        </div>
                                    </div>

                                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                                        <div class="col-md-3 mt-0">
                                            <label for="" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Padrino o
                                                Madrina</label>
                                        </div>
                                        <div class="col-md-9 mt-0">
                                            <input type="text" class="form-control color-c" id="padrinos"
                                                name="padrinos"
                                                placeholder="Ingrese el nombre completo del padrino o madrina">
                                        </div>
                                    </div>

                                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                                        <div class="col-md-1 mt-0">
                                            <label for="" class="form-label "
                                                style="font-weight: bold;">Celebrante</label>
                                        </div>
                                        <div class="col-md-11 ml-2">
                                            <div class="input-group mb-3 col-md-12 dropup">
                                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" id="sacerdoteDropdown3">
                                                    @foreach ($sacerdotes as $sacerdote)
                                                        <li><a class="dropdown-item"
                                                                data-sacerdote="{{ $sacerdote->nombre }} {{ $sacerdote->ap_paterno }} {{ $sacerdote->ap_materno }}">{{ $sacerdote->nombre }}
                                                                {{ $sacerdote->ap_paterno }}
                                                                {{ $sacerdote->ap_materno }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <input type="text" class="form-control color-c"
                                                    id="selectedSacerdote3" name="sacerdote">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                                        <div class="col-auto">
                                            <label class="form-label" style="font-weight: bold;">Libro
                                                Sacramento</label>
                                        </div>
                                        <div class="col-auto">
                                            <label for="" class="form-label">Libro No.</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-c" id="libroSacramento"
                                                name="libro_sacramento" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-c" id="libroSacramento"
                                                name="libro_letra_sacramento">
                                        </div>
                                        <div class="col-auto">
                                            <label for="" class="form-label">Folio</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-c" id="folioSacramento"
                                                name="folio_sacramento" required>
                                        </div>
                                        <div class="col-auto">
                                            <label for="" class="form-label">Partida</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-c" id="partidaSacramento"
                                                name="partida_sacramento" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-c" id="partidaSacramento"
                                                name="letra_partida_sacramento" >
                                        </div>
                                    </div>

                                    <div class="row mt-3 d-flex align-items-center justify-content-start">
                                        <div class="col-md-12 m-0">
                                            <div class="form-floating">
                                                <textarea class="form-control color-c" placeholder="Notas" id="floatingTextarea" name="notas"></textarea>
                                                <label for="floatingTextarea">Notas</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer d-flex justify-content-end">
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-success btn-lg">Agregar</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                @include('frontend.components.tabs.tabConfirmacion')
                                <div class="footer d-flex align-items-center justify-content-end mt-3">
                                    @if (Auth::user()->rol == 'Administrador')
                                        <div class="btn-group">
                                            <button class="btn btn-warning mb-3 me-2 btn-functions" data-bs-toggle="modal"
                                                data-bs-target="#ModalConfirmacion" data-tab="confirmacion">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                </svg>
                                            </button>
                                            <form action="{{ route('confirmacion.destroy', ['id' => $persona->id]) }}"
                                                method="post" style="display:inline;"
                                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar a este sacramento? (Sacramento: Confirmación)');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-functions">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-trash3"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Matrimonio --}}
            <div class="tab-pane fade" id="nav-matrimonio" role="tabpanel" aria-labelledby="nav-matrimonio-tab"
                tabindex="0">
                <div class="mt-3">
                    <div class="container-fluid">
                        <div class="container text-center">
                            @if (!$sacramentosPersona[$persona->id]['matrimonio'])
                                <form action="{{ route('matrimonio.store') }}" method="POST">
                                    @csrf

                                    <div>
                                        <input value="{{ $persona->id }}" name="id_persona" type="hidden" readonly>
                                    </div>

                                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                                        <div class="col-auto">
                                            <label class="form-label fw-bold">Parroquia de:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-m" id="selectParroquia2"
                                                value="{{ Session::get('parroquia_nombre') }}" readonly>
                                            <input type="hidden" name="id_parroquia" id="idParroquia"
                                                value="{{ Session::get('parroquia_id') }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-m"
                                                    placeholder="Ingrese la capilla de ser necesario" name="capilla">
                                        </div>
                                    </div>

                                    <div class="row mt-2 justify-content-start align-items-center">
                                        <div class="col-md-1 m-0">
                                            <label class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Lugar</label>
                                        </div>
                                        <div class="col-md-11 m-0">
                                            <input type="text" class="form-control color-m"
                                                id="municipioParroquia2" name="municipioParroquia2"
                                                value="{{ Session::get('parroquia_municipio') }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row mt-2 justify-content-start align-items-center">
                                        <div class="col-md-1 m-0">
                                            <label class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">el</label>
                                        </div>
                                        <div class="col-md-11 m-0">
                                            <input type="date" class="form-control color-m" id="registro"
                                                name="fecha_registro_matrimonio">
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
                                            <input type="text" class="form-control color-m" id="sr"
                                                name="esposo" >
                                        </div>
                                    </div>

                                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                                        <div class="col-md-1 m-0">
                                            <label for="" class="form-label m-0" style="font-weight: bold;">la
                                                Srita.</label>
                                        </div>
                                        <div class="col-md-11 m-0">
                                            <input type="text" class="form-control color-m" id="srita"
                                                name="esposa" >
                                        </div>
                                    </div>

                                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                                        <div class="col-md-3 mt-0">
                                            <label for="" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">Habiendo sido
                                                tesitgo el Sr.</label>
                                        </div>
                                        <div class="col-md-9 mt-0">
                                            <input type="text" class="form-control color-m" id="testigoSr"
                                                name="testigo_senor" >
                                        </div>
                                    </div>

                                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                                        <div class="col-md-3 mt-0">
                                            <label for="" class="form-label m-0"
                                                style="font-weight: bold; padding-left: 15px;">y la Srita.</label>
                                        </div>
                                        <div class="col-md-9 mt-0">
                                            <input type="text" class="form-control color-m" id="testigoSrita"
                                                name="testigo_senorita" >
                                        </div>
                                    </div>

                                    <div class="row mt-2 justify-content-start align-items-center d-flex">
                                        <div class="col-md-1 mt-0">
                                            <label for="" class="form-label "
                                                style="font-weight: bold;">Celebrante</label>
                                        </div>
                                        <div class="col-md-11 ml-2">
                                            <div class="input-group mb-3 col-md-12 dropup">
                                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" id="sacerdoteDropdown4">
                                                    @foreach ($sacerdotes as $sacerdote)
                                                        <li><a class="dropdown-item"
                                                                data-sacerdote="{{ $sacerdote->nombre }} {{ $sacerdote->ap_paterno }} {{ $sacerdote->ap_materno }}">{{ $sacerdote->nombre }}
                                                                {{ $sacerdote->ap_paterno }}
                                                                {{ $sacerdote->ap_materno }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <input type="text" class="form-control color-m"
                                                    id="selectedSacerdote4" name="sacerdote">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2 d-flex align-items-center justify-content-start">
                                        <div class="col-auto">
                                            <label for="" class="form-label fw-bolder"> Libro Sacramento Matrimonio</label>
                                        </div>
                                        <div class="col-auto">
                                            <label for="" class="form-label">Libro No.</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-m" id="libroSacramento"
                                                name="libro_sacramento" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-m" id="libroSacramento"
                                                name="libro_letra_sacramento">
                                        </div>
                                        <div class="col-auto">
                                            <label for="" class="form-label">Folio</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-m"
                                                name="folio_sacramento" required>
                                        </div>
                                        <div class="col-auto">
                                            <label for="" class="form-label">Partida</label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control color-m"
                                                name="partida_sacramento" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control color-m"
                                                name="letra_partida_sacramento" >
                                        </div>
                                    </div>

                                    <div class="row mt-3 d-flex align-items-center justify-content-start">
                                        <div class="col-md-12 m-0">
                                            <div class="form-floating">
                                                <textarea class="form-control color-m" placeholder="Notas" id="floatingTextarea" name="notas"></textarea>
                                                <label for="floatingTextarea">Notas</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="footer d-flex justify-content-end">
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-success btn-lg">Agregar</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                @include('frontend.components.tabs.tabMatrimonio')
                                <div class="footer d-flex align-items-center justify-content-end mt-3">
                                    @if (Auth::user()->rol == 'Administrador')
                                        <div class="btn-group">
                                            <button class="btn btn-warning mb-3 me-2 btn-functions"
                                                data-bs-toggle="modal" data-bs-target="#ModalMatrimonio">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                </svg>
                                            </button>
                                            <form action="{{ route('matrimonio.destroy', ['id' => $persona->id]) }}"
                                                method="post" style="display:inline;"
                                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar a este sacramento? (Sacramento: Matrimonio)');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-functions">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-trash3"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <link rel="stylesheet" href="{{ asset('css/info-style.css') }}">
        <script src="{{ asset('js/info.js') }}"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                function handleCheckboxToggle(checkboxId, inputId) {
                    var checkbox = document.getElementById(checkboxId);
                    if (checkbox) {
                        checkbox.addEventListener('change', function() {
                            var inputElement = document.getElementById(inputId);
                            if (inputElement) {
                                inputElement.style.display = this.checked ? 'block' : 'none';
                            }
                        });
                    }
                }

                // Llamadas a la función handleCheckboxToggle para cada checkbox
                handleCheckboxToggle('flexCheckDefault1', 'capillaInput1');
                handleCheckboxToggle('flexCheckDefault2', 'capillaInput2');
                handleCheckboxToggle('flexCheckDefault3', 'capillaInput3');
                handleCheckboxToggle('flexCheckDefault4', 'capillaInput4');

                // Funcionalidad de pestañas de navegación
                var tabLinks = document.querySelectorAll('.tab-link');
                var tabContents = document.querySelectorAll('.tab-content');

                tabLinks.forEach(function(link) {
                    link.addEventListener('click', function(event) {
                        event.preventDefault();
                        var target = this.getAttribute('href').substring(1);

                        tabContents.forEach(function(content) {
                            content.classList.remove('active');
                        });

                        var targetElement = document.getElementById(target);
                        if (targetElement) {
                            targetElement.classList.add('active');
                        }
                    });
                });

                // Activar la primera pestaña por defecto
                if (tabContents.length > 0) {
                    tabContents[0].classList.add('active');
                }
            });
        </script>

        <script>
            function toggleTabs() {
                const tabContent = document.getElementById('myTabContent');
                tabContent.style.display = (tabContent.style.display === 'none' ? 'block' : 'none');
            }
        </script>

    @endsection
    @include('frontend.components.modals.modalEditPerson')
    @include('frontend.components.modals.modalBautismo')
    @include('frontend.components.modals.modalComunion')
    @include('frontend.components.modals.modalConfirmacion')
    @include('frontend.components.modals.modalMatrimonio')
    @include('frontend.components.modals.modalperson')

