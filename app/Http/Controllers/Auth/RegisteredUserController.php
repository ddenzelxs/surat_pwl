<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Prodi;
use App\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $prodis = Prodi::all();
        return view('auth.register', compact('prodis'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException;
     */
    public function store(Request $request)
    {
        $request->validate([
            'nrp_nip' => ['required', 'string', 'max:20', 'unique:users,nrp_nip'],
            'nama_lengkap' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'prodi_id' => ['required', 'integer', 'exists:prodi,id'],
        ]);

        $user = new Users([
            'nrp_nip' => $request->nrp_nip,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 1,
            'prodi_id' => $request->prodi_id,
            'status' => 1
        ]);

        $user->save();

        return redirect('login');
    }
}
