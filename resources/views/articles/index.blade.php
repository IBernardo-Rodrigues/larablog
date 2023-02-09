<x-layout>

  <x-slot:title>
    Artigos - Larablog
  </x-slot:title>

  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/articles/index.css') }}">
  @endpush

  <section class="search-field">
    <form action="" method="GET" class="d-flex align-items-center gap-2">
      <div class="form-group">
        <label for="" class="form-label d-none">
          Pesquisar 
        </label>
        <input type="text" name="search" placeholder="Título, categorias, autores" class="form-control">
      </div>

      <button type="submit" class="btn btn-primary">
        <img src="{{ asset('assets/svg/search-icon.svg') }}" alt="Pesquisar" class="icon">
      </button>
    </form>
  </section>

  <section class="articles mt-1 row gx-2 gy-4">
    @foreach($articles as $article)
      <div class="col-md-6 col-lg-4">
        <div class="article">
          <div class="article-thumb bg-light">
            <img src="{{ asset('storage/' . $article->thumb) }}" alt="Capa do artigo" class="img-fluid rounded d-block mx-auto">
          </div>

          <p class="category mb-1 mt-2 fw-semibold opacity-50 ms-2">
            <span>
              <img src="{{ asset('assets/svg/gray-bookmark-icon.svg') }}" alt="Icone de tag" class="icon">
            </span>
            {{ $article->category->name }}
          </p>

          <h2 class="fw-semibold">
            <a href="{{ url('/articles/' . $article->id) }}" class="text-decoration-none text-dark">
            {{ $article->title }}
            </a>
          </h2>

          <p class="opacity-75 w-75">
            {{ substr(preg_replace('/#(.*?)#/', "", $article->text), 0, 115) }}...
            
          </p>

          <div class="d-flex gap-3">
            <p class="author opacity-50 fw-bold">
              {{ $article->user->name }}
            </p>
            <p class="date opacity-50 fw-bold">
              {{ date('d/m/Y', strtotime($article->updated_at)) }}
            </p>
          </div>
        </div>
      </div>
    @endforeach


    <div>
      {{ $articles->onEachside(3)->links() }}
    </div>
  </section>

</x-layout>