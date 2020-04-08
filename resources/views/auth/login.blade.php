@extends('layouts.welcome_template')

@section('title', 'Login')

@section('content')

        <!-- Form Login -->
        <div class="section-form-login py-5 bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card border-0 rounded-0">
                            <div class="card-body">
                                <h3 class="section-title font-weight-light text-center">Masuk untuk akses akun anda</h3>
                                <hr width="50%">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus tabindex="1">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="sebagai">Masuk sebagai</label>
                                        <select id="role" class="custom-select @error('role') is-invalid @enderror" name="role" required autocomplete="current-role" tabindex="2">
                                            <option value=""></option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->role }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <label for="password">Password</label>
                                            </div>
                                            <div>
                                                <a href="#">lupa password?</a>
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" required tabindex="3">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="remember">
                                            <label class="custom-control-label" for="remember">Remember me</label>
                                          </div>
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-md btn-primary" tabindex="4">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
