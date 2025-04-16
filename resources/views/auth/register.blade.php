@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
      <div class="card-header">{{ __('Register') }}</div>
      <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Input untuk ID User manual -->
        <div class="mb-3 row">
          <label for="id_user" class="col-md-4 col-form-label text-md-end">{{ __('ID User') }}</label>
          <div class="col-md-6">
          <input id="id_user" type="text" class="form-control @error('id_user') is-invalid @enderror"
            name="id_user" value="{{ old('id_user') }}" required>
          @error('id_user')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
          </div>
        </div>

        <!-- Input Name -->
        <div class="mb-3 row">
          <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
          <div class="col-md-6">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ old('name') }}" required autofocus>
          @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
          </div>
        </div>

        <!-- Input Email -->
        <div class="mb-3 row">
          <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
          <div class="col-md-6">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required>
          @error('email')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
          </div>
        </div>

        <!-- Input Password -->
        <div class="mb-3 row">
          <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
          <div class="col-md-6">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required>
          @error('password')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
          </div>
        </div>

        <!-- Confirm Password -->
        <div class="mb-3 row">
          <label for="password-confirm"
          class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
          <div class="col-md-6">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
          </div>
        </div>

        <!-- Select Role -->
        <div class="mb-3 row">
          <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
          <div class="col-md-6">
          <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
            <option value="mahasiswa" {{ old('role') == 'mahasiswa' ? 'selected' : '' }}>{{ __('Mahasiswa') }}
            </option>
            <option value="kaprodi" {{ old('role') == 'kaprodi' ? 'selected' : '' }}>{{ __('Kaprodi') }}</option>
            <option value="tata_usaha" {{ old('role') == 'tata_usaha' ? 'selected' : '' }}>{{ __('Tata Usaha') }}
            </option>
          </select>
          @error('role')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
          </div>
        </div>

        <div class="form-group">
          <label for="program_studi_id">Program Studi</label>
          <select name="program_studi_id" class="form-control" required>
          <option value="">-- Pilih Program Studi --</option>
          @foreach($prodis as $prodi)
        <option value="{{ $prodi->program_studi_id }}">{{ $prodi->nama_program_studi }}</option>
      @endforeach
          </select>
        </div>


        <!-- Submit Button -->
        <div class="row mb-0">
          <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
          </button>
          </div>
        </div>

        </form>
      </div>
      </div>
    </div>
    </div>
  </div>

  <!-- Flash message popup -->
  @if (session('success'))
    <script type="text/javascript">
    alert("{{ session('success') }}");
    </script>
  @endif

  <!-- Tombol kembali ke dashboard -->
  @if (Auth::user())
    <div class="row mt-3">
    <div class="col-md-6 offset-md-4">
    <a href="{{ route('tata_usaha.dashboard') }}" class="btn btn-secondary">
      {{ __('Back to Dashboard') }}
    </a>
    </div>
    </div>
  @endif

@endsection