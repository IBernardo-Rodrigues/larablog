<x-layout>
  <x-slot:title>
    {{ $article->title }} - Larablog
  </x-slot:title>

  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/articles/show.css') }}">
  @endpush

  <article class="mx-auto bg-light rounded position-relative p-3">
    
    <a href="{{ url('/') }}" class="d-block mb-3">
      <img src="{{ asset('assets/svg/chevron-left-icon.svg') }}" alt="Atualizar artigo" class="icon">
    </a>

    <h1>
      {{ $article->title }}
    </h1>
    <div class="mb-4">
      <p class="m-0">
        <small>Autor: {{ $article->user->name }} · {{ $article->category->name }}</small>
      </p>
      <p class="m-0 opacity-75"><small>última atualização: {{ date('d/m/Y', strtotime($article->updated_at)) }}</small></p>
    </div>

    <img src="{{ asset('storage/' . $article->thumb) }}" alt="Imagem do artigo" class="blog-img d-block mx-auto">    

    <div class="article-text">
      {{ $article->text }}
    </div>
  </article>

  @push('scripts')
    <script src="{{ asset('assets/js/articles/show.js') }}"></script>
  @endpush
</x-layout>