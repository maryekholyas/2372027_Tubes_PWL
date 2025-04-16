@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4 text-center text-primary">Dashboard Mahasiswa</h3>

    <!-- Tombol untuk membuka modal pilihan surat -->
    <div class="d-flex justify-content-center mb-4">
        <button type="button" class="btn btn-primary btn-lg shadow-sm" data-bs-toggle="modal" data-bs-target="#pilihSuratModal">
            Ajukan Surat Baru
        </button>
    </div>

    <!-- Modal untuk memilih jenis surat -->
    <div class="modal fade" id="pilihSuratModal" tabindex="-1" aria-labelledby="pilihSuratModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3">
                <form method="GET" action="{{ route('mahasiswa.pengajuan.form') }}">
                    <div class="modal-header bg-primary text-white rounded-top-3">
                        <h5 class="modal-title" id="pilihSuratModalLabel">Pilih Jenis Surat</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="jenis_surat" class="form-label">Jenis Surat</label>
                            <select class="form-select" name="jenis_surat" id="jenis_surat" required>
                                <option value="">-- Pilih Surat --</option>
                                <option value="1">Surat Keterangan Lulus</option>
                                <option value="2">Surat Keterangan Mahasiswa Aktif</option>
                                <option value="3">Surat Laporan Hasil Studi</option>
                                <option value="4">Surat Pengantar Tugas</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Lanjutkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Notifikasi jika ada pesan -->
    @if(session('message'))
        <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @else
        <div class="row gy-4">
            <!-- Pengajuan Menunggu -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-warning text-white fw-bold">
                        Pengajuan Menunggu
                    </div>
                    <div class="card-body">
                        @if($waiting->isEmpty())
                            <p class="text-muted">Tidak ada pengajuan menunggu.</p>
                        @else
                            <ul class="list-group list-group-flush">
                                @foreach($waiting as $item)
                                    <li class="list-group-item">
                                        <strong>{{ $item->jenisSurat->nama_surat ?? 'Jenis tidak ditemukan' }}</strong><br>
                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d-m-Y') }}
                                        </small>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Pengajuan Disetujui -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-success text-white fw-bold">
                        Pengajuan Disetujui
                    </div>
                    <div class="card-body">
                        @if($approved->isEmpty())
                            <p class="text-muted">Tidak ada pengajuan disetujui.</p>
                        @else
                            <ul class="list-group list-group-flush">
                                @foreach($approved as $item)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div>
                                            <strong>{{ $item->jenisSurat->nama_surat ?? 'Jenis tidak ditemukan' }}</strong><br>
                                            <small class="text-muted">
                                                {{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d-m-Y') }}
                                            </small>
                                        </div>
                                        <div class="btn-group">
                                            @if($item->file_surat)
                                                <a href="{{ asset('storage/' . $item->file_surat) }}" target="_blank" class="btn btn-sm btn-outline-light">
                                                    Lihat
                                                </a>
                                                <a href="{{ asset('storage/' . $item->file_surat) }}" download class="btn btn-sm btn-light">
                                                    Download
                                                </a>
                                            @else
                                                <span class="badge bg-secondary">Belum tersedia</span>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Pengajuan Ditolak -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-danger text-white fw-bold">
                        Pengajuan Ditolak
                    </div>
                    <div class="card-body">
                        @if($rejected->isEmpty())
                            <p class="text-muted">Tidak ada pengajuan ditolak.</p>
                        @else
                            <ul class="list-group list-group-flush">
                                @foreach($rejected as $item)
                                    <li class="list-group-item">
                                        <strong>{{ $item->jenisSurat->nama_surat ?? 'Jenis tidak ditemukan' }}</strong><br>
                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d-m-Y') }}
                                        </small>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Custom Styles untuk mempercantik tampilan -->
@push('styles')
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Nunito', sans-serif;
    }
    .card {
        border: none;
        border-radius: 1rem;
        transition: transform 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .modal-content {
        border-radius: 1rem;
    }
    .btn-primary {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        border: none;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        transform: scale(1.03);
    }
</style>
@endpush
@endsection
