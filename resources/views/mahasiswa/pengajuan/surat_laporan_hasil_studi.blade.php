@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Form Surat Laporan Hasil Studi (LHS)</h4>
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

            <form action="{{ route('mahasiswa.pengajuan.lhs.store') }}" method="POST">
                @csrf
                <input type="hidden" name="jenis_surat" value="3">

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

                <!-- Field spesifik LHS -->
                <div class="form-group mb-4">
                    <label for="keperluan_pembuatan_lhs" class="form-label fw-bold">Keperluan Pembuatan LHS</label>
                    <input type="text" 
                           class="form-control @error('keperluan_pembuatan_lhs') is-invalid @enderror" 
                           id="keperluan_pembuatan_lhs" 
                           name="keperluan_pembuatan_lhs" 
                           value="{{ old('keperluan_pembuatan_lhs') }}" 
                           required>
                    @error('keperluan_pembuatan_lhs')
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
