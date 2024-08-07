@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Base de Datos para Sacramentos') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('Bienvenido a la base de datos de los Sacramentos de la Diocesis de Nuevo Casas Grandes') }}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
