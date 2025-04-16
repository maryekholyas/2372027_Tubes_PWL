<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ProgramStudi;
use App\Models\Mahasiswa;
use App\Models\Kaprodi;
use App\Models\TataUsaha;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';  // Tetap di halaman register setelah registrasi berhasil.

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Pastikan hanya Tata Usaha yang bisa mengakses halaman register
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role !== 'tata_usaha') {
                return redirect('/login');  // Jika role bukan tata_usaha, arahkan ke login.
            }
            return $next($request);  // Jika role adalah tata_usaha, lanjutkan ke halaman register.
        });
    }

    /**
     * Tampilkan form registrasi dengan pilihan program studi.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $prodis = ProgramStudi::all(); // Ambil semua data program studi dari database
        return view('auth.register', compact('prodis'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id_user'           => ['required', 'string', 'unique:users,id_user'],
            'name'              => ['required', 'string', 'max:255'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
            'role'              => ['required', 'string', 'in:mahasiswa,kaprodi,tata_usaha'],
            'program_studi_id'  => ['required', 'exists:program_studi,program_studi_id'],
        ]);
    }
    
    /**
     * Create a new user instance after a valid registration.
     * Setelah membuat data User, secara otomatis dibuat data tambahan ke tabel terkait:
     * - Jika role = mahasiswa, data akan dibuat di tabel mahasiswas.
     * - Jika role = kaprodi, data akan dibuat di tabel kaprodi.
     * - Jika role = tata_usaha (admin), data akan dibuat di tabel tata_usaha.
     * Id pada masing-masing tabel tambahan sama dengan id_user yang diinput.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Membuat data user
        $user = User::create([
            'id_user'          => $data['id_user'],
            'name'             => $data['name'],
            'email'            => $data['email'],
            'password'         => Hash::make($data['password']),
            'role'             => $data['role'],
            'program_studi_id' => $data['program_studi_id'],
        ]);

        // Tambahkan data tambahan sesuai role user yang didaftarkan dengan id yang sama dengan id_user
        if ($data['role'] === 'mahasiswa') {
            // Sesuai dengan update tabel `mahasiswas`
            Mahasiswa::create([
                'id_mahasiswa'                     => $data['id_user'],  
                'user_id_user'                     => $data['id_user'],
                'program_studi_program_studi_id'   => $data['program_studi_id'],
                'alamat'                           => null,              
                'semester'                         => null,              
            ]);
            
        } elseif ($data['role'] === 'kaprodi') {
            Kaprodi::create([
                'id_kaprodi'                     => $data['id_user'],
                'user_id_user'                   => $data['id_user'],
                'program_studi_program_studi_id' => $data['program_studi_id'],
            ]);
        } elseif ($data['role'] === 'tata_usaha') {
            TataUsaha::create([
                'id_tata_usaha'  => $data['id_user'],
                'user_id'        => $data['id_user'],
                'program_studi_id' => $data['program_studi_id'],
            ]);
        }

        return $user;
    }
    
    /**
     * Override the registered method to show a success message without redirecting.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function registered(Request $request, $user)
    {
        // Menyimpan pesan sukses ke session
        Session::flash('status', 'Berhasil registrasi dengan role: ' . $user->role);

        // Tetap di halaman register
        return redirect()->route('register');
    }
}
