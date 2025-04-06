<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect by role_id
            switch ($user->role_id) {
                case 1:
                    return redirect()->route('student.index');
                case 2:
                    return redirect()->route('lecturer.index');
                case 3:
                    return redirect()->route('manager.index');
                default:
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Role tidak dikenali.');
            }
        }

        return back()->withErrors([
            'nrp_nip' => 'NRP/NIP atau password salah.',
        ])->onlyInput('nrp_nip');
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
