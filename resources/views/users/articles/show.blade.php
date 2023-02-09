<x-layout>
  <x-slot:title>
    Ver artigo - Larablog
  </x-slot:title>

  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/users/articles/show.css') }}">
  @endpush

  <article class="mx-auto bg-light rounded position-relative p-3">
    
    <div class="d-flex justify-content-between align-items-center mb-3">
      <a href="{{ url('/user/articles/') }}">
        <img src="{{ asset('assets/svg/chevron-left-icon.svg') }}" alt="Atualizar artigo" class="icon">
      </a>
      
      <a href="{{ url('/user/articles/1/edit') }}" class="btn-edit btn btn-dark">
        <img src="{{ asset('assets/svg/white-pen-icon.svg') }}" alt="Atualizar artigo" class="icon">
      </a>
    </div>

    <h1>
      Vikings
    </h1>
    <div class="mb-4">
      <p class="m-0"><small>Autor: Carlos Müger · História</small></p>
      <p class="m-0 opacity-75"><small>última atualização: 10/02/2023</small></p>
    </div>

    <img src="{{ asset('assets/img/era-viking.png') }}" alt="Imagem do artigo" class="blog-img d-block mx-auto">    

    <p>
      Os vikings foram marinheiros, comerciantes, exploradores e guerreiros conhecidos por serem selvagens e atacarem as civilizações em busca de mulheres e ouro. A Era Viking iniciou em 763 d.C. e durou até 1066, onde este povo explorou diversos cantos do mundo, desde os confins da Rússia até as Américas, antes de Colombo chegar.
    </p>

    <h2>
      O início da Era Viking e suas invasões
    </h2>

    <p>
      O início da Era Viking começou alguns anos após o primeiro ataque registrado deste povo, e perdurou até alguns anos antes da conquista normanda da Inglaterra em 1066. Neste período, diversas nações do mundo encontraram vikings invadindo suas costas e roubando seus bens mais preciosos.
    </p>

    <p>
      Um dos primeiros ataques dos vikings, que marcou o início da sua migração, foi direcionado aos monges de Lindisfarne, uma ilha pequena próxima a Inglaterra, conhecida por ser uma abadia de aprendizagem que possuía uma extensa biblioteca. No ataque, diversos monges foram mortos, jogados ao mar ou levados como escravos, e sua imensa biblioteca foi destruída.
      </p>
  </article>

</x-layout>