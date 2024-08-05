@extends('admin.layouts.main')

@section('contenido')
    <div class="container">
        <div class="card">
            <h1 class="main-title"><strong>Conteo de Registros</strong></h1>
            <p class="sub-title">Estadísticas de registros de sacramentos</p>

            <div class="count-container">
                <div class="sacrament-count">
                    <div class="count-box">
                        <h2>Bautismos</h2>
                        <p>{{ $conteoBautismos }}</p>
                    </div>
                    <div class="count-box">
                        <h2>Comuniones</h2>
                        <p>{{ $conteoComuniones }}</p>
                    </div>
                    <div class="count-box">
                        <h2>Confirmaciones</h2>
                        <p>{{ $conteoConfirmaciones }}</p>
                    </div>
                    <div class="count-box">
                        <h2>Matrimonios</h2>
                        <p>{{ $conteoMatrimonios }}</p>
                    </div>
                </div>
                <div class="total-count">
                    <div class="total-box">
                        <h2>Total</h2>
                        <p>{{ $totalRegistros }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<link rel="stylesheet" href="{{ asset('css/dashboard.css')}}">
