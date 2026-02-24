<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Étudiants - Collège Maisonneuve</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('etudiants.index') }}">Collège Maisonneuve</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('etudiants.index') }}">Liste Étudiants</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('etudiants.create') }}">Ajouter Étudiant</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-4 flex-fill">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @yield('content')

    </main>

    <footer class="bg-dark text-white mt-5 p-4 text-center">
        <div class="container">
            &copy; {{ date('Y') }} Collège Maisonneuve. Tous droits réservés.
            <br>
            <a href="#" class="text-white text-decoration-underline">Politique de confidentialité</a> |
            <a href="#" class="text-white text-decoration-underline">Contact</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>