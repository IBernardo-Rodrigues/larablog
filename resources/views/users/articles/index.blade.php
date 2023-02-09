<x-layout>
  <x-slot:title>
    Artigos - Larablog
  </x-slot:title>

  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/users/articles/index.css') }}">
  @endpush


  <section class="articles">
    <div class="d-flex justify-content-between align-items-center">
      <h2 class="fw-semibold">
        Artigos
      </h2>

      <a href="{{ url('/user/articles/create') }}" class="btn btn-primary fw-semibold d-flex justify-content-between align-items-center gap-2">
        <img src="{{ asset('assets/svg/add-icon.svg') }}" alt="Adicionar artigo" class="icon">
        <span class="text-white">
          Adicionar
        </span>
      </a>
    </div> 
      <p class="opacity-75">
      {{ $articles->total() . ' artigos' }}
    </p>

    <table class="table table-hover align-middle mb-5">
      <thead>
        <tr>
          <td class="text-uppercase opacity-75">Artigo</td>
          <td class="text-uppercase opacity-75 d-none d-md-table-cell">Categoria</td>
          <td class="text-uppercase opacity-75 d-none d-md-table-cell">Tags</td>
        </tr>
      </thead>
      <tbody>
        @foreach($articles as $article)
            <tr>
              <td class="d-flex align-items-center">
                <img src="{{ asset('storage/' . $article->thumb) }}" alt="thumbnail" class="img-fluid rounded">
                <a href="{{ url('user/articles/' . $article->id . '/edit') }}" class="d-inline ms-2 fw-semibold text-decoration-none text-dark">
                {{ $article->title }}
                </a>
              </td>

              <td class="d-none d-md-table-cell opacity-75">
                {{ $article->category->name }}
              </td>

              <td class="d-none d-md-table-cell opacity-75">
                @foreach($article->tags()->get() as $tag)
                    @if($loop->last)
                      {{ $tag->name }}
                    @else
                      {{ $tag->name }},
                    @endif
                @endforeach
              </td>
            </tr>
          @endforeach
      </tbody>
    </table>

    <div class="d-flex justify-content-center">
      {{ $articles->onEachSide(3)->links() }}
    </div>

    <div class="modals">
      <x-modals.modal-success/>
    </div>
  </section>
  
  @push('scripts')
    <script src="{{ asset('assets/js/modal.js') }}"></script>
  @endpush
</x-layout>