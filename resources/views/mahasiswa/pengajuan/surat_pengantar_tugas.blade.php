@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Form Surat Pengantar Tugas</h4>
        </div>

        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('mahasiswa.pengajuan.tugas.store') }}" method="POST">

                @csrf
                <input type="hidden" name="jenis_surat" value="4">

                <!-- Data Mahasiswa -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" class="form-control" 
                                   value="{{ Auth::user()->mahasiswa->user->name }}" 
                                   readonly>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label fw-bold">NRP</label>
                            <input type="text" class="form-control" 
                                   value="{{ Auth::user()->mahasiswa->id_mahasiswa }}" 
                                   readonly>
                        </div>
                    </div>
                </div>

                <!-- Tujuan dan Perusahaan -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="nama_tujuan" class="form-label fw-bold">Nama Tujuan</label>
                        <input type="text" class="form-control" id="nama_tujuan" name="nama_tujuan" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nama_perusahaan_tujuan" class="form-label fw-bold">Nama Perusahaan Tujuan</label>
                        <input type="text" class="form-control" id="nama_perusahaan_tujuan" name="nama_perusahaan_tujuan" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="alamat_perusahaan_tujuan" class="form-label fw-bold">Alamat Perusahaan Tujuan</label>
                    <textarea class="form-control" id="alamat_perusahaan_tujuan" name="alamat_perusahaan_tujuan" rows="2" required></textarea>
                </div>

                <!-- Info Mata Kuliah -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="kode_mata_kuliah" class="form-label fw-bold">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" id="kode_mata_kuliah" name="kode_mata_kuliah" required>
                    </div>
                    <div class="col-md-6">
                        <label for="semester_tahun" class="form-label fw-bold">Semester / Tahun</label>
                        <input type="text" class="form-control" id="semester_tahun" name="semester_tahun" required>
                    </div>
                </div>

                <!-- Tujuan & Topik -->
                <div class="mb-4">
                    <label for="tujuan" class="form-label fw-bold">Tujuan</label>
                    <input type="text" class="form-control" id="tujuan" name="tujuan" required>
                </div>

                <div class="mb-4">
                    <label for="topik" class="form-label fw-bold">Topik</label>
                    <input type="text" class="form-control" id="topik" name="topik" required>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-paper-plane me-2"></i>Kirim Pengajuan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
