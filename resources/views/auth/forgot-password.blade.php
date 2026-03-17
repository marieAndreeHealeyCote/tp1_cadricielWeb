<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.forgot_password') }} - Collège Maisonneuve</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center min-vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">

                <div class="text-center mb-4">
                    <h1 class="fw-bold">Collège Maisonneuve</h1>
                    <p class="text-muted">{{ __('messages.forgot_password') }}</p>
                </div>

                <div class="card shadow">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">{{ __('messages.forgot_password') }}</h4>
                    </div>

                    <div class="card-body">

                        <p class="text-muted">
                            {{ __('messages.forgot_password_text') }}
                        </p>

                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('messages.email') }}</label>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    required
                                    autofocus>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('messages.email_reset_link') }}
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