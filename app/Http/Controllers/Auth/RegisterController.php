<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Walidacja danych formularza
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

         // Sprawdzenie, czy adres e-mail już istnieje
         if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'Adres e-mail już istnieje.'])->withInput();
        }

         // Sprawdzenie, czy nazwa użytkownika już istnieje
        if (User::where('name', $request->name)->exists()) {
            return redirect()->back()->withErrors(['name' => 'Nazwa użytkownika już istnieje.'])->withInput();
        }

        // Tworzenie nowego użytkownika w bazie danych
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Haszowanie hasła
        $user->save();

        // Przekierowanie użytkownika po udanej rejestracji
        return redirect()->route('login')->with('success', 'Rejestracja przebiegła pomyślnie! Zaloguj się.');

    }
}
