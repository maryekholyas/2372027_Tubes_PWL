@extends('layouts.app')

@section('content')
    <div class="row justify-content-center min-vh-100 align-items-center">
            <div class="col-md-12 col-lg-6 col-xl-6 card shadow-lg rounded-3 border-0">
                <div class="card-header bg-transparent border-0 py-4">
                    <h3 class="text-center fw-bold text-primary">{{ __('Login') }}</h3>
                </div>
                <div class="card-body p-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                                <i class="fas fa-envelope me-2"></i>{{ __('Email Address') }}
                            </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="email" type="email" 
                                           class="form-control rounded-3 @error('email') is-invalid @enderror" 
                                           name="email" value="{{ old('email') }}" 
                                           required autocomplete="email" autofocus>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-end">
                                <i class="fas fa-lock me-2"></i>{{ __('Password') }}
                            </label>
                            <div class="col-md-6">
                                <input id="password" type="password" 
                                       class="form-control rounded-3 @error('password') is-invalid @enderror" 
                                       name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill">
                                    <i class="fas fa-sign-in-alt me-2"></i>{{ __('Login') }}
                                </button>
                                <br>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link mt-3 text-decoration-none" 
                                       href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>


<style>
    .gradient-bg {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }
    
    .rounded-3 {
        border-radius: 1rem !important;
    }
    
    .card {
        border-radius: 1.5rem;
        transition: transform 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    .form-control {
        border: 2px solid #dee2e6;
        padding: 0.75rem 1.25rem;
    }
    
    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.25);
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        border: none;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
