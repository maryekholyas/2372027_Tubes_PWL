@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Form Surat Keterangan Mahasiswa Aktif</h4>
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

            <form action="{{ route('mahasiswa.pengajuan.aktif.store') }}" method="POST">
                @csrf
                <input type="hidden" name="jenis_surat" value="2">

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

                <!-- Field spesifik surat aktif -->
                <div class="form-group mb-3">
                    <label for="semester" class="form-label fw-bold">Semester</label>
                    <input type="number" 
                           class="form-control @error('semester') is-invalid @enderror" 
                           id="semester" name="semester" 
                           value="{{ old('semester') }}" required>
                    @error('semester')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="alamat" class="form-label fw-bold">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" 
                              id="alamat" name="alamat" rows="2" required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="keperluan_pengajuan" class="form-label fw-bold">Keperluan Pengajuan</label>
                    <input type="text" 
                           class="form-control @error('keperluan_pengajuan') is-invalid @enderror" 
                           id="keperluan_pengajuan" name="keperluan_pengajuan" 
                           value="{{ old('keperluan_pengajuan') }}" required>
                    @error('keperluan_pengajuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
