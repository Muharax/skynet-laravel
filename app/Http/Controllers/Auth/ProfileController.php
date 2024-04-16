<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        // Pobierz aktualnie zalogowanego użytkownika
        $user = Auth::user();

        // Przekazanie danych użytkownika do widoku
        return view('users.profile', compact('user'));
    }
}
