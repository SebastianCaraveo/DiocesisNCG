@extends('admin.layouts.main')

@section('content.news')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {{-- Formulario para agregar noticia --}}
                <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control" placeholder="Ej. Kermese diocesana">
                    </div>
                    <div class="col">
                        <label for="noticia" class="form-label">Noticia</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="noticia" id="floatingcommentnoticia">Noticia</textarea>
                            <label for="floatingcommentnoticia">Noticia</label>
                        </div>
                    </div>
                    <div class="col">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" name="imagen" accept="image/*" class="form-control">
                    </div>
                    <div class="col justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary col-md-10">Agregar Noticia</button>
                    </div>
                </form>

                {{-- Mostrar noticias existentes --}}
                <div class="container mt-4">
                    @foreach ($noticias as $noticia)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $noticia->titulo }}</h5>
                                <p class="card-text">{{ $noticia->noticia }}</p>
                            </div>
                            <img src="{{ asset($noticia->imagen) }}" class="card-img-top" alt="Noticia Image">
                            {{-- Botones para editar y eliminar --}}
                            <div class="card-footer">
                                <a href="{{ route('news.edit', ['noticia' => $noticia->id]) }}" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalEditNews{{ $noticia->id }}">Modificar</a>
                                <form action="{{ route('news.destroy', ['noticia' => $noticia->id]) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@include('admin.components.modalEnews')
