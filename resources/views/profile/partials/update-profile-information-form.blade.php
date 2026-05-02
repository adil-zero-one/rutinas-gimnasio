{{-- cambiare estilos tailwind con estilos de bootstrap --}}
<section>
    <header class="mb-4">
        <h2 class="h4">
            Información del Perfil
        </h2>

        <p class="text-muted">
            Actualiza tu nombre y correo electrónico.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input id="name" name="name" type="text" class="form-control"
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input id="email" name="email" type="email"
                class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}"
                required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="small text-muted">
                        Tu correo no está verificado.
                        <button form="send-verification" class="btn btn-link p-0">
                            Reenviar correo de verificación
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success small">Se ha enviado un nuevo enlace de verificación.</p>
                    @endif
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

        @if (session('status') === 'profile-updated')
            <span class="text-success ms-3">Guardado.</span>
        @endif
    </form>
</section>
