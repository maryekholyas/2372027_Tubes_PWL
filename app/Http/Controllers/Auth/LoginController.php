<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // Default redirect if no custom redirect is set based on role
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Redirect the user after login based on their role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        // Check the role and redirect accordingly
        if ($user->role == 'mahasiswa') {
            return redirect()->route('mahasiswa.dashboard'); // Sesuaikan dengan rute mahasiswa
        } elseif ($user->role == 'kaprodi') {
            return redirect()->route('kaprodi.dashboard'); // Sesuaikan dengan rute kaprodi
        } elseif ($user->role == 'tata_usaha') {
            return redirect()->route('tata_usaha.dashboard'); // Sesuaikan dengan rute tata_usaha
        }

        // Default redirect if no role matches
        return redirect()->route('home');
    }
}
