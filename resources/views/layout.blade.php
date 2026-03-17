<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collège Maisonneuve</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('etudiants.index') }}">
                Collège Maisonneuve
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">

                @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('etudiants.index') }}">
                            {{ __('messages.students') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('etudiants.create') }}">
                            {{ __('messages.add_student') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">
                            {{ __('messages.forum') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('documents.index') }}">
                            {{ __('messages.documents') }}
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            🌐 {{ strtoupper(app()->getLocale()) }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('lang.switch', ['locale' => 'fr']) }}">
                                    Français
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('lang.switch', ['locale' => 'en']) }}">
                                    English
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <span class="nav-link text-white">
                            {{ __('messages.hello') }}, {{ Auth::user()->name }}
                        </span>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.edit') }}">
                            {{ __('messages.profile') }}
                        </a>
                    </li> -->

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-decoration-none">
                                {{ __('messages.logout') }}
                            </button>
                        </form>
                    </li>
                </ul>
                @else
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            🌐 {{ strtoupper(app()->getLocale()) }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('lang.switch', ['locale' => 'fr']) }}">
                                    Français
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('lang.switch', ['locale' => 'en']) }}">
                                    English
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            {{ __('messages.login') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            {{ __('messages.register') }}
                        </a>
                    </li>
                </ul>
                @endauth

            </div>
        </div>
    </nav>

    <main class="container my-4 flex-fill">

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>{{ __('messages.form_error') }}</strong>
        </div>
        @endif

        @yield('content')

    </main>

    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            &copy; {{ date('Y') }} Collège Maisonneuve — {{ __('messages.rights_reserved') }}
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>