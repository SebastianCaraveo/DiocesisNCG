@extends('layouts.main')

@section('carrusel')
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($noticias as $key => $noticia)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}"
                    @if ($key === 0) class="active" @endif></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($noticias as $key => $noticia)
                <div class="carousel-item @if ($key === 0) active @endif">
                    <img src="{{ asset($noticia->imagen) }}" class="d-block w-100" alt="... ">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $noticia->titulo }}</h5>
                        <p>{{ $noticia->noticia }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
@endsection

@section('busquedaparroquias')
    <section id="seccionparroquias" style="min-height: 80vh; padding: 20px;">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto text-center mt-4" style="margin-bottom: 10px;">
                        <h2 class="text-dark mt-0" style="font-size: 20px">Busca la parroquia o capilla deseada</h2>
                        <form id="searchForm" action="{{ route('buscar') }}" method="GET">
                            @csrf
                            <div class="input-group">
                                <select class="form-select m-2" name="parroquia_id" id="parroquia_id">
                                    <option selected>Seleccione una parroquia o capilla...</option>
                                    @foreach ($parroquias as $parroquia)
                                        <option value="{{ $parroquia->id }}">{{ $parroquia->nombre }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-light m-2" type="submit">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div id="resultadosParroquia" class="container">
                <div class="row bg-white" style="border-radius: 10px;">
                    <!-- Lado izquierdo con la información de la parroquia -->
                    <div class="col-md-7" id="parroquiaInfo">
                    </div>
                    <!-- Lado derecho con el mapa -->
                    <div class="col-md-5"
                        style="background-color: #DD9F54; border-top-right-radius: 10px; border-bottom-right-radius: 10px;"
                        id="ubicacionMapa">
                        <!-- Aquí se mostrará el mapa -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('horariosservicios')
    <section class="about-section text-center" id="seccionservicios">
        <div class="container">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-12">
                    <h2 class="text-white mb-4">Encuentra los horarios de nuestro servicios</h2>
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        <div class="col">
                            <div class="card h-100 bg-dark">
                                <img src="{{ asset('/img/misa-obispo2.jpg') }}" class="card-img-top"
                                    style="align-self: center;width: 80%; margin-top: 1em;">
                                <div class="card-body">
                                    <h5 class="card-title text-white">Misas</h5>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary btn-light" data-bs-toggle="modal"
                                        data-bs-target="#misas">Ver horarios</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 bg-dark">
                                <img src="{{ asset('/img/confesionario.jpg') }}" class="card-img-top"
                                    style="align-self: center;width: 80%; margin-top: 1em;">
                                <div class="card-body">
                                    <h5 class="card-title text-white">Confesiones</h5>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary btn-light" data-bs-toggle="modal"
                                        data-bs-target="#confesion">Ver horarios</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 bg-dark">
                                <img src="{{ asset('/img/srobispo-ninos.jpg') }}" class="card-img-top"
                                    style="align-self: center;width: 80%; margin-top: 1em;">
                                <div class="card-body">
                                    <h5 class="card-title text-white">Catequesis</h5>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary btn-light" data-bs-toggle="modal"
                                        data-bs-target="#catequesis">Ver horarios</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 bg-dark">
                                <img src="{{ asset('/img/batiuzo.png') }}" class="card-img-top"
                                    style="align-self: center;width: 80%; margin-top: 1em;">
                                <div class="card-body">
                                    <h5 class="card-title text-white">Bautizos</h5>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary btn-light" data-bs-toggle="modal"
                                        data-bs-target="#bautizo">Ver horarios</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<p class="text-white-50">
                                                Grayscale is a free Bootstrap theme created by Start Bootstrap. It can be yours right now, simply download the template on
                                                <a href="https://startbootstrap.com/theme/grayscale/">the preview page.</a>
                                                The theme is open source, and you can use it for any purpose, personal or commercial.
                                            </p>-->
                </div>
            </div>
        </div>
    </section>
    <!-- ---------------MODALES---------------- -->
    <!-- Modal de misas-->
    <div class="modal fade" id="misas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Horarios de misas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid p-2">
                        <table class="table table-striped table-bordered" id="tmisas">
                            <thead>
                                <tr>
                                    <th>Parroquia</th>
                                    <th>Misas dominicales</th>
                                    <th>Misas de entre semana</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($misas as $misa)
                                    <tr>
                                        <td>{{ $misa->parroquia->nombre }}</td>
                                        <td>{{ $misa->misa_dominical }}</td>
                                        <td>{{ $misa->misa_entre_semanal }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de confesiones-->
    <div class="modal fade" id="confesion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Horarios de confesiones</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid p-2">
                        <table class="table table-striped table-bordered" id="tmisas">
                            <thead>
                                <tr>
                                    <th>Parroquia</th>
                                    <th>Horarios de confesiones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($confesiones as $confesion)
                                    <tr>
                                        <td>{{ $confesion->parroquia->nombre }}</td>
                                        <td>{{ $confesion->horario }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de catequesis-->
    <div class="modal fade" id="catequesis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Horarios de catequesis</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid p-2">
                        <table class="table table-striped table-bordered" id="tmisas">
                            <thead>
                                <tr>
                                    <th>Parroquia</th>
                                    <th>Horarios de catequesis</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($catecismos as $catecismo)
                                    <tr>
                                        <td>{{ $catecismo->parroquia->nombre }}</td>
                                        <td>{{ $catecismo->horario }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de bautizos-->
    <div class="modal fade" id="bautizo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Fechas de bautizmos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid p-2">
                        <table class="table table-striped table-bordered" id="tmisas">
                            <thead>
                                <tr>
                                    <th>Parroquia</th>
                                    <th>Fechas de platicas prebautismales</th>
                                    <th>Fechas de bautismos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bautizos as $bautizo)
                                    <tr>
                                        <td>{{ $bautizo->parroquia->nombre }}</td>
                                        <td>{{ $bautizo->fecha_platicas }}</td>
                                        <td>{{ $bautizo->fecha_bautizos }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pastorales')
    <section class="page-section" id="seccionpastorales">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Conoce nuestras comisiones y dimensiones diocesanas</h2>
            <hr class="divider" />

            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <!-- <div><img src="{{ asset('dash/img/azules/comunicacion.jpg') }}" class="img-thumbnail" alt="..."></div> -->
                        <div class="mb-2">
                            <img src="{{ asset('/img/azules/profetica.png') }}" class="img-thumbnail"
                                style="max-width:50%" alt="...">
                        </div>
                        <h3 class="h4 mb-2">Pastoral profética</h3>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2">
                            <img src="{{ asset('/img/azules/liturgica.png') }}" class="img-thumbnail"
                                style="max-width:50%"></img>
                        </div>
                        <h3 class="h4 mb-2">Pastoral litúrgica</h3>
                        <!--    <p class="text-muted mb-0">------------------------------------------</p>   -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2">
                            <img src="{{ asset('/img/azules/social.png') }}" class="img-thumbnail"
                                style="max-width:50%"></img>
                        </div>
                        <h3 class="h4 mb-2">Pastoral social</h3>
                        <!--    <p class="text-muted mb-0">------------------------------------------</p>   -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2">
                            <img src="{{ asset('/img/azules/familia.png') }}" class="img-thumbnail"
                                style="max-width:50%"></img>
                        </div>
                        <h3 class="h4 mb-2">Familia</h3>
                        <!--    <p class="text-muted mb-0">------------------------------------------</p>   -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2">
                            <img src="{{ asset('/img/azules/vocasiones.png') }}" class="img-thumbnail"
                                style="max-width:50%"></img>
                            </i>
                        </div>
                        <h3 class="h4 mb-2">Vocaciones y ministerios</h3>
                        <!--    <p class="text-muted mb-0">------------------------------------------</p>   -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2">
                            <img src="{{ asset('/img/azules/comunicacion.png') }}" class="img-thumbnail"
                                style="max-width:50%"></img>
                        </div>
                        <h3 class="h4 mb-2">Pastoral de comunicación</h3>
                        <!--    <p class="text-muted mb-0">------------------------------------------</p>   -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2">
                            <img src="{{ asset('/img/azules/liturgica.png') }}" class="img-thumbnail"
                                style="max-width:50%"></img>
                        </div>
                        <h3 class="h4 mb-2">Solidaridad eclesial</h3>
                        <!--    <p class="text-muted mb-0">------------------------------------------</p>   -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#searchForm').submit(function(e) {
                e.preventDefault();

                var parroquiaId = $('#parroquia_id').val();

                $.ajax({
                    type: 'GET',
                    url: $(this).attr('action'),
                    data: {
                        parroquia_id: parroquiaId
                    },
                    success: function(response) {
                        $('#parroquiaInfo').html('');
                        response.parroquias.forEach(function(parroquia) {
                            $('#parroquiaInfo').html(
                                `<div style="display: flex; flex-direction: column; justify-content: center; padding: 20px;">
                                 <h2>${parroquia.nombre}</h2>
                                <br>
                                <p style="font-weight: bold;" class="row">
                                    <span class="col-3">Dirección:</span>
                                    <span class="col-8" style="font-weight: normal;">${parroquia.direccion}</span>
                                </p>
                                <p style="font-weight: bold;" class="row">
                                    <span class="col-3">Horario:</span>
                                    <span class="col-8" style="font-weight: normal;">${parroquia.horario}</span>
                                </p>
                                <p style="font-weight: bold;" class="row">
                                    <span class="col-3">Teléfono:</span>
                                    <span class="col-8" style="font-weight: normal;">${parroquia.telefono}</span>
                                </p>
                                <p style="font-weight: bold;" class="row">
                                    <span class="col-3">Parroco:</span>
                                    <span class="col-8" style="font-weight: normal;">${parroquia.parroco ? `${parroquia.parroco.sacerdote.nombre} ${parroquia.parroco.sacerdote.ap_paterno} ${parroquia.parroco.sacerdote.ap_materno}` : 'No disponible'}</span>
                                </p>
                            </div>`
                            );
                        });

                        $('#ubicacionMapa').html('');
                        response.parroquias.forEach(function(parroquia) {
                            $('#ubicacionMapa').html(
                                `<div style="display: flex; flex-direction:column; justify-content:center; align-items:center; padding: 20px;">
                                <p> ${parroquia.ubicacion}</p>
                                </div>`
                            )
                        });

                        // Mostrar el contenedor
                        $('#resultadosParroquia').show();
                    },
                    error: function(error) {
                        console.error(error);
                    },
                });
            });
        });
    </script>

    {{-- <script>
    document.getElementById('carouselExampleCaptions').carousel({
        interval: 3000 // Establece la velocidad en milisegundos (actualmente, 3000 ms o 3 segundos)
    });
</script> --}}
@endsection
