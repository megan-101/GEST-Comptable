<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GEST-Comptable</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('app') }}">GEST-Comptable</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('utilisateur.index') }}">Liste Utilisateurs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('parametre.All') }}">Liste Paramètres</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('postcomptable.All') }}">Liste Post comptable</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('lieu.All') }}">Liste Lieux</a>
          </li>
        </ul>

        <!-- Nom d'utilisateur et Déconnexion -->
        <ul class="navbar-nav ms-auto">
          @auth
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="dropdown-item text-danger">Déconnexion</button>
            </form>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Connexion</a>
            </li>
          @endauth
        </ul>

      </div>
    </div>
  </nav>

  <div id="app" class="container mt-4">
    @if(request()->routeIs('app'))
      <div class="p-5 mb-4 bg-light rounded-1 shadow-sm border">
        <div class="container-fluid py-5">
          <h1 class="text-dark">
            <span class="text-dark">Bonjour {{ Auth::user()->nom }}</span>, bienvenue sur GEST-Comptable
          </h1>
          <p class="col-md-8 fs-4 text-secondary">Ceci est votre tableau de bord principal. Utilisez le menu de navigation
            en haut pour gérer vos utilisateurs, vos paramètres, vos lieux et vos postes comptables.</p>
          <a href="{{ route('utilisateur.index') }}" class="btn btn-primary btn-lg mt-3">Gérer les Utilisateurs</a>
        </div>
      </div>
    @endif

    <!-- Le contenu des autres pages viendra s'injecter ici (et écrasera le dashboard) -->
    @yield('content')
  </div>

</body>

</html>