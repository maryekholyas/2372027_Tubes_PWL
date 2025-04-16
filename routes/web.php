<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mahasiswa\MahasiswaDashboardController;
use App\Http\Controllers\Mahasiswa\MahasiswaPengajuanController;
use App\Http\Controllers\Mahasiswa\Pengajuan\SuratKeteranganLulusController;
use App\Http\Controllers\Mahasiswa\Pengajuan\SuratKeteranganMahasiswaAktifController;
use App\Http\Controllers\Mahasiswa\Pengajuan\SuratLaporanHasilStudiController;
use App\Http\Controllers\Mahasiswa\Pengajuan\SuratPengantarTugasController;
use App\Http\Controllers\Kaprodi\KaprodiDashboardController;
use App\Http\Controllers\TataUsaha\TataUsahaDashboardController;


// Route untuk halaman login (sudah ada)
Route::get('/', function () {
    return view('auth.login');
});

// Auth routes
Auth::routes();

Route::prefix('mahasiswa')->group(function () {
    // Dashboard Mahasiswa
    Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])->name('mahasiswa.dashboard');

    // Halaman utama pengajuan & form umum
    Route::get('/pengajuan', [MahasiswaPengajuanController::class, 'index'])->name('mahasiswa.pengajuan.index');
    Route::get('/pengajuan/form', [MahasiswaPengajuanController::class, 'formPengajuan'])->name('mahasiswa.pengajuan.form');

    // Form per jenis surat
    Route::get('/pengajuan/surat-keterangan-lulus/form', [SuratKeteranganLulusController::class, 'form'])->name('mahasiswa.pengajuan.skl.form');
    Route::get('/pengajuan/surat-mahasiswa-aktif/form', [SuratKeteranganMahasiswaAktifController::class, 'form'])->name('mahasiswa.pengajuan.aktif.form');
    Route::get('/pengajuan/surat-laporan-hasil-studi/form', [SuratLaporanHasilStudiController::class, 'form'])->name('mahasiswa.pengajuan.lhs.form');
    Route::get('/pengajuan/surat-pengantar-tugas/form', [SuratPengantarTugasController::class, 'form'])->name('mahasiswa.pengajuan.tugas.form');

    // Store per jenis surat
    Route::post('/pengajuan/surat-keterangan-lulus', [SuratKeteranganLulusController::class, 'store'])->name('mahasiswa.pengajuan.skl.store');
    Route::post('/pengajuan/surat-mahasiswa-aktif', [SuratKeteranganMahasiswaAktifController::class, 'store'])->name('mahasiswa.pengajuan.aktif.store');
    Route::post('/pengajuan/surat-laporan-hasil-studi', [SuratLaporanHasilStudiController::class, 'store'])->name('mahasiswa.pengajuan.lhs.store');
    Route::post('/pengajuan/surat-pengantar-tugas', [SuratPengantarTugasController::class, 'store'])->name('mahasiswa.pengajuan.tugas.store');
});

// Route untuk Kaprodi
Route::prefix('kaprodi')->group(function () {
    Route::get('/dashboard', [KaprodiDashboardController::class, 'index'])->name('kaprodi.dashboard');
    Route::get('/surat/{id}', [KaprodiDashboardController::class, 'show'])->name('kaprodi.surat.show');
    Route::post('/surat/{id}/approve', [KaprodiDashboardController::class, 'approve'])->name('kaprodi.surat.approve');
    // Menggunakan method PUT untuk tolak sesuai dengan form (menggunakan @method('PUT'))
    Route::put('/surat/{id}/tolak', [KaprodiDashboardController::class, 'tolak'])->name('kaprodi.surat.tolak');
});


// Route untuk Tata Usaha
Route::prefix('tatausaha')->group(function () {
    Route::get('/dashboard', [TataUsahaDashboardController::class, 'index'])->name('tata_usaha.dashboard');
    Route::post('/upload-surat/{pengajuan_id}', [TataUsahaDashboardController::class, 'uploadSurat'])->name('tata_usaha.uploadSurat');
});

