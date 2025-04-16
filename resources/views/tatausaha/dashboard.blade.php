@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Card Header Dashboard -->
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    {{ __('Tata Usaha Dashboard') }}
                </div>
                <div class="card-body">
                    <p class="lead">Welcome to your dashboard, {{ Auth::user()->name }}!</p>
                    <!-- Daftar User -->
                    <h4 class="mt-4">List of All Registered Users</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ ucfirst($user->role) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if(Auth::user()->role === 'tata_usaha')
                        <div class="mt-3">
                            <a class="btn btn-primary" href="{{ route('register') }}">
                                {{ __('Register New User') }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Card untuk Surat Disetujui Belum Diunggah -->
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-warning text-white">
                    Surat Disetujui Belum Diunggah
                </div>
                <div class="card-body">
                    @if($approvedSurat->whereNull('file_surat')->isEmpty())
                        <p class="text-muted">Semua surat sudah diunggah.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Mahasiswa</th>
                                        <th>Jenis Surat</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Upload File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($approvedSurat->whereNull('file_surat') as $i => $surat)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $surat->mahasiswa->user->name ?? '-' }}</td>
                                            <td>{{ $surat->jenisSurat->nama_surat ?? '-' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($surat->tanggal_pengajuan)->format('d-m-Y') }}</td>
                                            <td>
                                                <form action="{{ route('tata_usaha.uploadSurat', $surat->pengajuan_id) }}"
                                                      method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="input-group">
                                                        <input type="file" name="file_surat" accept="application/pdf"
                                                               class="form-control form-control-sm" required>
                                                        <button class="btn btn-sm btn-success" type="submit">Upload</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Card untuk Surat Sudah Diunggah -->
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    Surat Sudah Diunggah
                </div>
                <div class="card-body">
                    @if($approvedSurat->whereNotNull('file_surat')->isEmpty())
                        <p class="text-muted">Belum ada surat yang diunggah.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mahasiswa</th>
                                        <th>Jenis Surat</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>File Surat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($approvedSurat->whereNotNull('file_surat') as $i => $surat)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $surat->mahasiswa->user->name ?? '-' }}</td>
                                            <td>{{ $surat->jenisSurat->nama_surat ?? '-' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($surat->tanggal_pengajuan)->format('d-m-Y') }}</td>
                                            <td>
                                                <a href="{{ asset('storage/' . $surat->file_surat) }}" target="_blank" class="btn btn-outline-info btn-sm">
                                                    Lihat File
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background-color: #f1f4f8;
        font-family: 'Nunito', sans-serif;
    }
    .card {
        border: none;
        border-radius: 1rem;
        overflow: hidden;
    }
    .card-header {
        font-weight: bold;
        font-size: 1.1rem;
    }
    .table-responsive {
        border-radius: 1rem;
        overflow: hidden;
    }
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }
    .btn {
        transition: all 0.2s ease;
    }
    .btn:hover {
        transform: scale(1.02);
    }
</style>
@endpush
