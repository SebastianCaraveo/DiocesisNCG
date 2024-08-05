<div class="modal fade" id="ModalInsertUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Insertar Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('users.store') }}" method="post">
          @csrf
          <div class="mb-3">
            <input type="text" class="form-control" id="name_user" name="name_user" placeholder="Nombre de usuario" required>
          </div>
          <div class="mb-3">
            <select class="form-select" name="select_user_rol" id="select_user_rol">
              <option value="Usuario">Usuario</option>
              <option value="Administrador">Administrador</option>
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
            <input type="email" class="form-control" name="email_user" id="email_user" placeholder="Correo electrónico" required>
          </div>
          <div class="mb-3">
            <input class="form-control" type="password" name="pass_user" id="pass_user" placeholder="Contraseña" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Insertar</button>
      </div>
      </form>
    </div>
  </div>
</div>
