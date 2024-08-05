@foreach($noticias as $noticia)
<div class="modal fade" id="ModalEditnews{{ $noticia->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('news.update', ['noticia' => $noticia->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" name="titulo" class="form-control" value="{{$noticia->titulo}}">
                        </div>
                        <div class="mb-3">
                            <label for="noticia" class="form-label">Noticia</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="noticia" id="floatingcommentnoticia">{{$noticia->noticia ?? ''}}</textarea>
                                <label for="floatingcommentnoticia">Noticia</label>
                            </div>                            
                        </div>
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" name="imagen" accept="image/*" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach