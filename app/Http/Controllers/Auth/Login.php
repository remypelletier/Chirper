<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Auth::attempt vérifie email + password en base
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/')->with('success', 'success message login!');
        }

        // Si les identifiants sont mauvais, on renvoie une erreur
        throw ValidationException::withMessages([
            'email' => 'Les identifiants sont incorrects.',
        ]);

    }
}
