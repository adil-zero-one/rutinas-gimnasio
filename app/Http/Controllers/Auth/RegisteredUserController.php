<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // voy a añadir los campos del usuario para validarlo en el registro (leer abajo)
            'dni' => ['required', 'string', 'max:20'],
            'data_naixement' => ['required', 'date'],
            'telefon' => ['required', 'string', 'max:15']
        ], [
            'data_naixement.required' => 'Edad obligatoria para mejor recomendaciones'
        ], []);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // notaba que el cliente no se me creaba, no coje los datos del user
        // siguiendo la pagina 81/90 de la diapositiva:
        $user->client()->create([
            // el user_id lo pondra laravel automaticamente en este caso
            // creo que al añadir esto voy a validar arriba los datos
            // y porque no ponerlo en el la vista del register del principio cuando
            // crea el usuario la cuenta nueva?
            'dni' => $request->dni,
            'data_naixement' => $request->data_naixement,
            'telefon' => $request->telefon,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
