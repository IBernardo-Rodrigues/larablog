<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página não encontrada</title>

  <link rel="stylesheet" href="{{ asset('assets/css/not-found.css') }}">
</head>
<body>
  <main>
    <section class="not-found">
      <div>
        <p class="title">404</p>
        <p class="message">A página não foi encontrada</p>
      </div>

      <button class="btn-back">
        <a href="{{ url('/') }}">
          Voltar para home
        </a>
      </button>
    </section>
  </main>
</body>
</html>