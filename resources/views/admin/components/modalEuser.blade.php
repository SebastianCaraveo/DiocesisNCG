@foreach($users as $user)
    <div class="modal fade" id="ModalEditUser{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.update', ['user' => $user->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name_user" name="name_user" value="{{ $user->name }}">
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="select_user_rol">
                                <option value="Usuario" {{ $user->rol === 'Usuario' ? 'selected' : '' }}>Usuario</option>
                                <option value="Administrador" {{ $user->rol === 'Administrador' ? 'selected' : '' }}>Administrador</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="select_user_parroquia" id="select_user_parroquia" required>
                                <option value="" disabled selected>Selecciona la parroquia</option>
                                @foreach($parroquias as $parroquia)
                                    <option value="{{ $parroquia->id }}">{{ $parroquia->nombre }}</option>
                                @endforeach
                            </select>
                          </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email_user" value="{{ $user->email }}">
                        </div>
                        <div class="mb3">
                            <input type="password" class="form-control" name="pass_user" placeholder="Insertar nueva contraseña">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
