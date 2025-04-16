@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center text-primary mb-5">Dashboard Kaprodi - Pengajuan Surat</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="mb-5">
        <!-- Tabel Surat Menunggu -->
        <h3 class="mb-3">Surat Menunggu</h3>
        <div class="table-responsive shadow-sm rounded-3 bg-white p-3">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID Pengajuan</th>
                        <th>Jenis Surat</th>
                        <th>Mahasiswa</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Nama Pengguna</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengajuans->where('status', 'menunggu') as $pengajuan)
                        <tr>
                            <td>{{ $pengajuan->pengajuan_id }}</td>
                            <td>{{ strtoupper($pengajuan->jenis_surat_nama) }}</td>
                            <td>{{ $pengajuan->mahasiswa_id_mahasiswa }}</td>
                            <td>{{ $pengajuan->tanggal_pengajuan ? date('d-m-Y H:i', strtotime($pengajuan->tanggal_pengajuan)) : '-' }}</td>
                            <td>{{ ucfirst($pengajuan->status) }}</td>
                            <td>{{ $pengajuan->user_name }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $pengajuan->pengajuan_id }}">
                                    Detail
                                </button>
                                <form action="{{ route('kaprodi.surat.approve', $pengajuan->pengajuan_id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm mb-1" onclick="return confirm('Setujui surat ini?')">
                                        Setujui
                                    </button>
                                </form>
                                <form action="{{ route('kaprodi.surat.tolak', $pengajuan->pengajuan_id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Tolak surat ini?')">
                                        Tolak
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @include('kaprodi._detail_modal', ['pengajuan' => $pengajuan])
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada surat menunggu.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mb-5">
        <!-- Tabel Surat Disetujui -->
        <h3 class="mb-3">Surat Disetujui</h3>
        <div class="table-responsive shadow-sm rounded-3 bg-white p-3">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID Pengajuan</th>
                        <th>Jenis Surat</th>
                        <th>Mahasiswa</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Nama Pengguna</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengajuans->where('status', 'disetujui') as $pengajuan)
                        <tr>
                            <td>{{ $pengajuan->pengajuan_id }}</td>
                            <td>{{ strtoupper($pengajuan->jenis_surat_nama) }}</td>
                            <td>{{ $pengajuan->mahasiswa_id_mahasiswa }}</td>
                            <td>{{ $pengajuan->tanggal_pengajuan ? date('d-m-Y H:i', strtotime($pengajuan->tanggal_pengajuan)) : '-' }}</td>
                            <td>{{ ucfirst($pengajuan->status) }}</td>
                            <td>{{ $pengajuan->user_name }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $pengajuan->pengajuan_id }}">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        @include('kaprodi._detail_modal', ['pengajuan' => $pengajuan])
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada surat disetujui.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mb-5">
        <!-- Tabel Surat Ditolak -->
        <h3 class="mb-3">Surat Ditolak</h3>
        <div class="table-responsive shadow-sm rounded-3 bg-white p-3">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID Pengajuan</th>
                        <th>Jenis Surat</th>
                        <th>Mahasiswa</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Nama Pengguna</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengajuans->where('status', 'ditolak') as $pengajuan)
                        <tr>
                            <td>{{ $pengajuan->pengajuan_id }}</td>
                            <td>{{ strtoupper($pengajuan->jenis_surat_nama) }}</td>
                            <td>{{ $pengajuan->mahasiswa_id_mahasiswa }}</td>
                            <td>{{ $pengajuan->tanggal_pengajuan ? date('d-m-Y H:i', strtotime($pengajuan->tanggal_pengajuan)) : '-' }}</td>
                            <td>{{ ucfirst($pengajuan->status) }}</td>
                            <td>{{ $pengajuan->user_name }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $pengajuan->pengajuan_id }}">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        @include('kaprodi._detail_modal', ['pengajuan' => $pengajuan])
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada surat ditolak.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Nunito', sans-serif;
    }
    h2, h3 {
        font-weight: bold;
    }
    .table-responsive {
        border-radius: 1rem;
    }
    .table thead th {
        background-color: #e9ecef;
    }
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .table-bordered td, .table-bordered th {
        border: 1px solid #dee2e6;
    }
    .btn {
        transition: transform 0.2s ease;
    }
    .btn:hover {
        transform: scale(1.02);
    }
</style>
@endpush
