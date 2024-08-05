@extends('admin.layouts.main')

@section('content.service')
<div class="container">
    <h2 class="col-md-4 ms-2">Registrar Servicios</h2>
    <form action="{{ route('service.store') }}" method="post">
        @csrf
        <div class="row mt-4 ms-2">
                <div class="col-md-4">
                    <label class="form-label">Seleccionar Tipo de Servicio:</label>
                    <select class="form-select" name="tipo_servicio" id="tipo_servicio">
                        <option value="" disabled selected>Selecciona algún servicio</option>
                        <option value="bautizos">Bautizos</option>
                        <option value="confesiones">Confesiones</option>
                        <option value="misas">Misas</option>
                        <option value="catecismo">Catecismo</option>
                    </select>
                </div>
    
                <div class="col-md-6">
                    <label class="form-label" for="id_parroquia">Seleccionar Parroquia:</label>
                    <select class="form-select" name="id_parroquia" id="id_parroquia">
                        @foreach ($parroquias as $parroquia)
                        <option value="{{ $parroquia->id }}">{{ $parroquia->nombre }}</option>
                    @endforeach
                    </select>
                </div>
    
                <div class="col-md-2 mt-4">
                    <button class="btn btn-success btn-lg" type="submit">Guardar</button>
                </div>
        </div>

        <!-- Campos específicos para Bautizos -->
        <div class="campos bautizos row mt-4 ms-2">
            <div class="col-md-6">
                <label class="form-label">Fechas de pláticas:</label>
                <input class="form-control" type="text" name="fecha_platica" placeholder="3er domingo del mes; 10:00am. Último viernes del mes; 7:00pm..."> 
            </div>
            <div class="col-md-4">
                <label class="form-label">Fechas de bautismos:</label>
                <input class="form-control" type="text" name="fecha_bautismo" placeholder="Sábados; 11:00am y 1:00pm...">
            </div>
        </div>

        <!-- Campos específicos para Confesiones -->
        <div class="campos confesiones row mt-4 ms-2">
            <div class="col-md-6">
                <label class="form-label">Horario de confesiones:</label>
                <input class="form-control" type="text" name="horario_confesion" placeholder="30min. Antes de misa..."> 
            </div>
        </div>

        <!-- Campos específicos para Misas -->
        <div class="campos misas row mt-4 ms-2">
            <div class="col-md-6">
                <label class="form-label">Misas dominicales:</label>
                <input class="form-control" type="text" name="misa_dominical" placeholder="8:00am, 10:00am, 12:00pm..."> 
            </div>
            <div class="col-md-4">
                <label class="form-label">Misas entre semana:</label>
                <input class="form-control" type="text" name="misa_entre_semana" placeholder="8:00am, 5:00pm y jueves 6:00pm...">
            </div>
        </div>

        <!-- Campos específicos para Catecismo -->
        <div class="campos catecismo row mt-4 ms-2">
            <div class="col-md-6">
                <label class="form-label">Horario de catecismo:</label>
                <input class="form-control" type="text" name="horario_catecismo" placeholder="Sábados 10:00am - 1:00pm..."> 
            </div>
        </div>
    </form>

    <!-- Para la tabla de Bautizos -->
    <div class="tabla mt-4 bautizos-table">
        <h3>Información de Servicios - Bautizos</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Parroquia</th>
                    <th>Fechas de Pláticas</th>
                    <th>Fechas de Bautismos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bautizos as $bautizo)
                    <tr class="fila-servicio bautizos" data-tipo="bautizos">
                        <td>{{ $bautizo->parroquia->nombre }}</td>
                        <td>{{ $bautizo->fecha_platicas }}</td>
                        <td>{{ $bautizo->fecha_bautizos }}</td>
                        <td>
                            <a href="{{ route('service.editar', ['tipo' => 'bautizos', 'id' => $bautizo->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('service.eliminar', ['tipo' => 'bautizos', 'id' => $bautizo->id]) }}" method="post" class="d-inline">
                            @csrf
                            @method('post')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Para la tabla de Catecismo -->
    <div class="tabla mt-4 catecismo-table">
        <h3>Información de Servicios - Catecismo</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Parroquia</th>
                    <th>Horario de Catecismo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($catecismos as $catecismo)
                    <tr class="fila-servicio catecismo" data-tipo="catecismo">
                        <td>{{ $catecismo->parroquia->nombre }}</td>
                        <td>{{ $catecismo->horario_catecismo }}</td>
                        <td>
                            <!-- Botones de Acciones -->
                            <a href="{{ route('service.editar', ['tipo' => 'catecismos', 'id' => $catecismo->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('service.eliminar', ['tipo' => 'catecismos', 'id' => $catecismo->id]) }}" method="post" class="d-inline">
                            @csrf
                            @method('post')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Vista principal para Confesiones -->
<div class="tabla mt-4 confesiones-table">
    <h3>Información de Servicios - Confesiones</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Parroquia</th>
                <th>Horario de Confesiones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($confesiones as $confesion)
                <tr class="fila-servicio confesiones" data-tipo="confesiones">
                    <td>{{ $confesion->parroquia->nombre }}</td>
                    <td>{{ $confesion->horario }}</td>
                    <td>
                        <!-- Botones de Acciones -->
                        <a href="{{ route('service.editar', ['tipo' => 'confesiones', 'id' => $confesion->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('service.eliminar', ['tipo' => 'confesiones', 'id' => $confesion->id]) }}" method="post" class="d-inline">
                            @csrf
                            @method('post')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Vista principal para Misas -->
<div class="tabla mt-4 misas-table">
    <h3>Información de Servicios - Misas</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Parroquia</th>
                <th>Misas Dominicales</th>
                <th>Misas Entre Semana</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($misas as $misa)
                <tr class="fila-servicio misas" data-tipo="misas">
                    <td>{{ $misa->parroquia->nombre }}</td>
                    <td>{{ $misa->misa_dominical }}</td>
                    <td>{{ $misa->misa_entre_semana }}</td>
                    <td>
                        <!-- Botones de Acciones -->
                        <a href="{{ route('service.editar', ['tipo' => 'misas', 'id' => $misa->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('service.eliminar', ['tipo' => 'misas', 'id' => $misa->id]) }}" method="post" class="d-inline">
                            @csrf
                            @method('post')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $(".campos").hide();
        $(".tabla").hide();

        $("#tipo_servicio").change(function () {
            $(".campos").hide();
            $(".tabla").hide();
            $("." + $(this).val()).show();
            $("." + $(this).val() + "-table").show();
        });
    });    

    function editarServicio(tipo, id) {
        // Lógica para editar el servicio según el tipo y el ID
        console.log('Editar servicio:', tipo, id);
    }

    function eliminarServicio(tipo, id) {
        // Lógica para eliminar el servicio según el tipo y el ID
        console.log('Eliminar servicio:', tipo, id);
    }
</script>

@endsection
