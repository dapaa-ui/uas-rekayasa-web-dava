<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - E-Commerce Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ secure_asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('assets/image/baground.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="col-md-4">
            <div class="card p-4">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Login Admin</h3>
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('loginUser') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                id="email" 
                                name="email" 
                                placeholder="Enter email" 
                                required 
                                autofocus
                                value="{{ old('email') }}"
                            >
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                id="password" 
                                name="password" 
                                placeholder="Password" 
                                required
                            >
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <div class="mt-3 text-center text-muted" style="font-size: 0.95em;">
                        <small>Default: admin@gmail.com / admin123</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ secure_asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
