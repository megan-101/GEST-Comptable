<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GEST-Comptable</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">GEST-Comptable</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="" href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=""></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
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
          <a class="nav-link" href="{{ route('logs.All') }}">Liste des Logs</a>
        </li>
        </ul>
      </div>
  </nav>

  <div id="app" class="container">
    @yield('content')
  </div>

</body>

</html>