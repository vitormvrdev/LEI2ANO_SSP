@extends('layouts.app')

@section('content')
<style>
.register-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    padding: 20px 0;
}

.register-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border: none;
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.register-card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    text-align: center;
    padding: 2rem;
    border: none;
    font-size: 1.5rem;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.register-card-body {
    padding: 3rem;
}

.form-control {
    border: 2px solid #e1e5e9;
    border-radius: 12px;
    padding: 12px 16px;
    font-size: 16px;
    transition: all 0.3s ease;
    background-color: #f8f9fa;
}

.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    background-color: white;
}

.form-control.is-invalid {
    border-color: #dc3545;
}

.col-form-label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 8px;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 12px;
    padding: 12px 30px;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    width: 100%;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
}

.invalid-feedback {
    font-weight: 500;
}

.row.mb-3 {
    margin-bottom: 1.5rem !important;
}

/* Password strength indicator */
.password-strength {
    margin-top: 8px;
    font-size: 12px;
    color: #6c757d;
}

.strength-bar {
    height: 4px;
    background-color: #e9ecef;
    border-radius: 2px;
    margin-top: 4px;
    overflow: hidden;
}

.strength-fill {
    height: 100%;
    transition: all 0.3s ease;
    border-radius: 2px;
}

.strength-weak { background-color: #dc3545; width: 25%; }
.strength-fair { background-color: #ffc107; width: 50%; }
.strength-good { background-color: #28a745; width: 75%; }
.strength-strong { background-color: #20c997; width: 100%; }

@media (max-width: 768px) {
    .register-card-body {
        padding: 2rem 1.5rem;
    }
    
    .col-md-4 {
        text-align: left !important;
        margin-bottom: 0.5rem;
    }
}
</style>

<div class="register-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card register-card">
                    <div class="card-header register-card-header">{{ __('Register') }}</div>

                    <div class="card-body register-card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                                    <div class="password-strength" id="password-strength" style="display: none;">
                                        <div class="strength-bar">
                                            <div class="strength-fill" id="strength-fill"></div>
                                        </div>
                                        <small id="strength-text">Password strength</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <div id="password-match" style="display: none; margin-top: 8px; font-size: 12px;"></div>
                                </div>
                            </div>

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
</div>
@endsection