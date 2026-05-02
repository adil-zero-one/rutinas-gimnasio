<section class="mt-2">
    <header class="mb-4">
        <h2 class="h4">Eliminar cuenta</h2>
        <p class="text-muted">
            Una vez elimines tu cuenta, todos tus datos serán eliminados permanentemente.
            Descarga cualquier información que quieras conservar antes de continuar.
        </p>
    </header>

    <!-- Botón que abre el modal -->
    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
        Eliminar cuenta
    </button>

    <!-- Modal Bootstrap -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h5 class="modal-title">¿Seguro que quieres eliminar tu cuenta?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <p class="text-muted">
                            Una vez elimines tu cuenta, todos tus datos serán eliminados permanentemente.
                            Introduce tu contraseña para confirmar.
                        </p>

                        <div class="mb-3">
                            <label for="delete_password" class="form-label">Contraseña</label>
                            <input id="delete_password" name="password" type="password"
                                class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                                placeholder="Contraseña">
                            @error('password', 'userDeletion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>

                        <button type="submit" class="btn btn-danger">
                            Eliminar cuenta
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>
