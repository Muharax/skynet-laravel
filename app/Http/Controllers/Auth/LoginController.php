<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Walidacja danych logowania
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Próba logowania użytkownika
        if (Auth::attempt($credentials)) {
            // Jeśli logowanie się powiodło, przekieruj do odpowiedniej ścieżki
            return redirect()->intended('/');
        }

        // Jeśli logowanie się nie powiodło, przekieruj z powrotem do formularza logowania z błędem
        return redirect()->back()->withErrors(['loginError' => 'Błędne dane logowania lub użytkownik nie istnieje.']);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Wylogowanie użytkownika
        $request->session()->invalidate(); // Usunięcie sesji
        $request->session()->regenerateToken(); // Wygenerowanie nowego tokena sesji

        return redirect('/'); // Przekierowanie użytkownika po wylogowaniu
    }
}
