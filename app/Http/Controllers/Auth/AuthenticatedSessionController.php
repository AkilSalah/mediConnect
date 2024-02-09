<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Admin;
use App\Models\Doctors;
use App\Models\Patient;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse{
    $credentials = $request->only('email', 'password');
    
    if (Auth::guard('patient')->attempt($credentials)) {
        return redirect('/patient');
    }

    if (Auth::guard('admin')->attempt($credentials)) {
        return redirect('/admin');
    }

    if (Auth::guard('doctor')->attempt($credentials)) {
        return redirect('/doctor');
    }

    return redirect()->back()->withInput($request->only('email'))->withErrors([
        'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
    ]);
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
