<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>{{ $title }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">
  @stack('styles')

</head>
<body>
<header class="navbar navbar-expand-lg border-bottom px-2 px-lg-5">
  <div class="container-fluid p-0">
    <a class="navbar-brand" href="/">
      Larablog
    </a>
    <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item rounded">
          <a class="nav-link {{ request()->is('/')  ? 'active' : '' }}" href="{{ url('/') }}">
            Home
          </a>
        </li>
        <li class="nav-item rounded">
          <a class="nav-link {{ request()->is('user/dashboard')  ? 'active' : '' }}" href="{{ url('/user/dashboard') }}">
            Dashboard
          </a>
        </li>
        <li class="nav-item rounded">
          <a class="nav-link {{ request()->is('user/articles*')  ? 'active' : '' }}" href="{{ url('/user/articles') }}">
            Meus artigos
          </a>
        </li>
        <li class="nav-item rounded">
          <a class="nav-link {{ request()->is('user/categories*')  ? 'active' : '' }}" href="{{ url('/user/categories') }}">
            Minhas categorias
          </a>
        </li>
        <li class="nav-item rounded">
          <a class="nav-link {{ request()->is('user/tags*')  ? 'active' : '' }}" href="{{ url('/user/tags') }}">
            Minhas tags
          </a>
        </li>
      </ul>
      
      <div>
      <div class="btn-group">
        <div class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
          <div class="profile bg-dark rounded-circle position-relative">
            <p class="text-white position-absolute top-50 start-50 translate-middle fw-bold">
              {{ substr(trim(auth()->user()->name), 0, 1) }}
            </p>
          </div>
        </div>
        <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-start">
          <li>
            <button class="dropdown-item" type="button">
              <a href="{{ url('/about-us') }}" class="text-decoration-none text-dark">
                Sobre nós
              </a>
            </button>
            <button class="dropdown-item" type="button">
              <a href="{{ url('/logout') }}" class="text-decoration-none text-dark">
                Logout
              </a>
            </button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>

  <main class="px-2 pt-3 px-lg-5 pt-lg-3">
    {{ $slot }}
  </main>

  <footer></footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <script src="{{ asset('assets/js/layout.js') }}"></script>
  @stack('scripts')
</body>
</html>