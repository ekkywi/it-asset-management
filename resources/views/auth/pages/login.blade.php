@extends("auth.layouts.auth")

@section("title")
    Login {!! "&mdash;" !!} E-Office
@endsection

@section("content")
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <a href="{{ route("login-page") }}">
                                <img alt="logo" class="shadow-light rounded-circle" src="{{ asset("images/logo.svg") }}" width="100">
                            </a>
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3>Login</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route("login") }}" class="needs-validation" id="loginForm" method="POST" novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input autofocus class="form-control" id="username" name="username" placeholder="Masukan username Anda" required tabindex="1" type="text">
                                        <div class="invalid-feedback">
                                            Anda belum memasukan username
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label class="control-label" for="password">Password</label>
                                        </div>
                                        <input class="form-control" id="password" name="password" placeholder="Masukan password Anda" required tabindex="2" type="password">
                                        <div class="invalid-feedback">
                                            Anda belum memasukan password
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="remember-me" name="remember" tabindex="3" type="checkbox">
                                            <label class="custom-control-label" for="remember-me">Ingat Saya</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-lg btn-block" tabindex="4" type="submit">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer text-muted">
                            &copy; 2025 IT Asset Management - All Rights Reserved
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section("script")
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Load saved username and password if remember-me is checked
            if (localStorage.getItem('rememberMe') === 'true') {
                document.getElementById('username').value = localStorage.getItem('username');
                document.getElementById('password').value = localStorage.getItem('password');
                document.getElementById('remember-me').checked = true;
            }

            document.getElementById('loginForm').addEventListener('submit', function() {
                if (document.getElementById('remember-me').checked) {
                    // Save username and password to localStorage
                    localStorage.setItem('username', document.getElementById('username').value);
                    localStorage.setItem('password', document.getElementById('password').value);
                    localStorage.setItem('rememberMe', true);
                } else {
                    // Clear saved username and password
                    localStorage.removeItem('username');
                    localStorage.removeItem('password');
                    localStorage.setItem('rememberMe', false);
                }
            });
        });
    </script>
@endsection
