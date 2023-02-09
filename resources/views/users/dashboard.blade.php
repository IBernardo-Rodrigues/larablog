<x-layout>
  <x-slot:title>
    Dashboard - Larablog
  </x-slot:title>

  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/users/dashboard.css') }}">
  @endpush

  <section class="dashboard">
    <h1 class="mb-3">
      Bem vindo, {{ Auth::user()->name }}!
    </h1>
    
    <div class="cards row g-2 g-lg-5">
      <div class="col-lg-4">
        <div class="card-info d-flex justify-content-between align-items-center rounded border p-3">
          <p class="d-flex flex-column align-items-center text-white fw-semibold">
            {{ count(auth()->user()->articles()->get()) }}
            <span class="text-white">
              Artigos
            </span>
          </p>

          <img src="{{ asset('assets/svg/article-icon.svg') }}" alt="Ícone de artigo" class="icon-medium">
        </div>
      </div>
      
      <div class="col-lg-4">
        <div class="card-info d-flex justify-content-between align-items-center rounded border p-3">
          <p class="d-flex flex-column align-items-center text-white fw-semibold">
            {{ count(auth()->user()->categories()->get()) }}
            <span class="text-white">
              Categorias
            </span>
          </p>

          <img src="{{ asset('assets/svg/bookmark-icon.svg') }}" alt="Ícone de artigo" class="icon-medium">
        </div>
      </div>
      
      <div class="col-lg-4">
        <div class="card-info d-flex justify-content-between align-items-center rounded border p-3">
          <p class="d-flex flex-column align-items-center text-white fw-semibold">
          {{ count(auth()->user()->tags()->get()) }}
            <span class="text-white">
              Tags
            </span>
          </p>

          <img src="{{ asset('assets/svg/tags-icon.svg') }}" alt="Ícone de artigo" class="icon-medium">
        </div>
      </div>
    </div>

    <div class="row g-2 mt-3">
      <div class="col-lg-8">
        <div class="chart">
          <canvas id="activity-chart"></canvas>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="last-article rounded p-3 position-relative">
          <h3>
            Vontade de escrever?
          </h3>

          <a href="{{ url('/user/articles/create') }}" class="btn btn-primary mt-2 ms-3">
            <img src="{{ asset('assets/svg/add-icon.svg') }}" alt="Acicionar artigo" class="icon">
            <span class="text-white fw-semibold">
              Escrever artigo
            </span>
          </a>

          <img src="{{ asset('assets/img/writing-vector.jpg') }}" alt="Pessoa escrevendo" style="width:300px;" class="position-absolute start-0 bottom-0 rounded">
        </div>
      </div>
    </div>
    

  </section>

  @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  @endpush
</x-layout>