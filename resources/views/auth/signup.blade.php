<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Login - Larablog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ ('assets/css/auth/auth.css') }}">
</head>
<body>
  <main class="h-100 d-lg-flex flex-row-reverse">
    <section class="login h-100 d-grid">
      <div class="p-4">
        <h2 class="text-center mb-4 fw-bold">
          Cadastro
        </h2>

        <form action="/register" method="POST">
          @csrf

          <div class="form-group mb-3">
            <div class="input position-relative">
              <label class="form-label position-absolute top-50 translate-middle">
                <img src="{{ asset('assets/svg/user-icon.svg') }}" alt="Ícone usuário" class="icon">
              </label>
              <input type="text" name="name" placeholder="Nome" class="form-control ps-5 border-0">
            </div>
            @error('name')
                <p class="text-danger opacity-75 position-">
                  {{ $message }}
                </p>
            @enderror
          </div>
          
          <div class="form-group mb-3">
            <div class="input position-relative">
              <label class="form-label position-absolute top-50 translate-middle">
                <img src="{{ asset('assets/svg/email-icon.svg') }}" alt="Ícone email" class="icon">
              </label>
              <input type="email" name="email" placeholder="Email" class="form-control ps-5 border-0">
            </div>
            @error('email')
              <p class="text-danger opacity-75">
                {{ $message }}
              </p>
            @enderror
          </div>
          
          <div class="form-group mb-3">
            <div class="input position-relative">
              <label class="form-label position-absolute top-50 translate-middle">
                <img src="{{ asset('assets/svg/lock-icon.svg') }}" alt="Ícone senha" class="icon">
              </label>
              <input type="password" name="password" placeholder="Senha" class="form-control ps-5 border-0">
            </div>
            @error('password')
              <p class="text-danger opacity-75">
                {{ $message }}
              </p>
            @enderror
          </div>

          <input type="submit" value="Entrar" class="btn-send btn btn-primary rounded-pill d-block mx-auto fw-semibold">
        </form>

        <p class="text-center opacity-75 mt-3">
          Já tem uma conta?
          <a href="/login">Clique aqui!</a>
        </p>
      </div>
    </section>
    <aside class="d-none d-md-flex">
      <h3 class="text-white">
        Bem vindo <br>
        Escritor!
      </h3>
    </aside>
  </main>

  <footer>

</footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>