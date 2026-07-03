<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEST-Comptable</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">

            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
                GEST-Comptable
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            Tableau de bord
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('operation.All') }}">
                            Liste des opérations
                        </a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                Déconnexion
                            </button>
                        </form>
                    </li>

                </ul>

            </div>

        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>

</html>