<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.reset_password') }} - Collège Maisonneuve</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center min-vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">

                <div class="text-center mb-4">
                    <h1 class="fw-bold">Collège Maisonneuve</h1>
                    <p class="text-muted">{{ __('messages.reset_password') }}</p>
                </div>

                <div class="card shadow">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">{{ __('messages.reset_password') }}</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('messages.email') }}</label>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email', $request->email) }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    required
                                    autofocus
                                    autocomplete="username">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('messages.password') }}</label>
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    required
                                    autocomplete="new-password">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">{{ __('messages.confirm_password') }}</label>
                                <input
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    required
                                    autocomplete="new-password">
                                @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('messages.reset_password') }}
                                </button>
                            </div>

                            <div class="text-center mt-3">
                                <a class="text-decoration-none" href="{{ route('login') }}">
                                    {{ __('messages.back_to_login') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>