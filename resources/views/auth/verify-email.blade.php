<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.verify_email') }} - Collège Maisonneuve</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center min-vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">

                <div class="text-center mb-4">
                    <h1 class="fw-bold">Collège Maisonneuve</h1>
                    <p class="text-muted">{{ __('messages.verify_email') }}</p>
                </div>

                <div class="card shadow">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">{{ __('messages.verify_email') }}</h4>
                    </div>

                    <div class="card-body">

                        <p class="text-muted">
                            {{ __('messages.verify_email_text') }}
                        </p>

                        @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success">
                            {{ __('messages.verification_link_sent') }}
                        </div>
                        @endif

                        <div class="d-grid gap-2">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('messages.resend_verification') }}
                                </button>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger w-100">
                                    {{ __('messages.logout') }}
                                </button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>