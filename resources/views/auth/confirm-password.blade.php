<x-guest-layout>
    <p class="text-muted small mb-3">
        Aquesta és una àrea segura. Confirma la teva contrasenya abans de continuar.
    </p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-3">
            <label for="password" class="form-label">Contrasenya</label>
            <input id="password" type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   required autocomplete="current-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Confirmar</button>
        </div>
    </form>
</x-guest-layout>