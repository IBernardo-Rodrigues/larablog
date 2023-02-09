<x-layout>
  <x-slot:title>
    Editar Artigo - Larablog
  </x-slot:title>
  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/users/articles/edit.css') }}">
  @endpush
  
  <section class="edit-article bg-light rounded py-3 px-4 overflow-hidden">

    <h2 class="text-dark">Novo artigo</h2>

    <form action="/user/articles/{{ $article->id }}" method="POST" enctype="multipart/form-data" class="row g-3 overflow-hidden" id="edit-article">
      @csrf
      @method('PUT')

      <div class="form-group col-md-4">
        <label class="form-label">
          Título *
        </label>
        <input type="text" name="title" placeholder="Título do artigo" value="{{ $article->title }}" class="form-control">
        @error('title')
          <span class="text-danger opacity-75 d-block">
            {{ $message }}
          </span>
        @enderror
      </div>
      
      <div class="form-group col-md-4">
        <label class="form-label">
          Tags *
        </label>

        <input type="text" name="tags" placeholder="Ex: História, Para crianças" value="{{ $tags }}" class="form-control">
        @error('tags')
          <span class="text-danger opacity-75 d-block">
            {{ $message }}
          </span>
        @enderror
      </div>

      <div class="form-group col-md-4">
        <label class="form-label">
          Categoria *
        </label>
        
        <select name="category" class="form-control">
          @if($categories->isEmpty())
            <option value="">Nenhuma categoria disponivel</option>          
          @else
            @foreach($categories as $category)
              @if($article->category->id == $category->id)
                <option value="{{ $category->slug }}" selected>
                  {{ $category->name }}
                </option>  
              @endif

              <option value="{{ $category->slug }}">
                {{ $category->name }}
              </option>
            @endforeach
          @endif
        </select>
        @error('category')
          <span class="text-danger opacity-75 d-block">
            {{ $message }}
          </span>
        @enderror
      </div>

      <div class="form-group col-md-8">
        <label class="form-label">
          Texto *
        </label>
        <textarea name="text" cols="30" rows="10" class="form-control">{{ $article->text }}</textarea>
        @error('text')
          <span class="text-danger opacity-75 d-block">
            {{ $message }}
          </span>
        @enderror
      </div>
      
      <div class="form-group col-md-4 p-md-2">
        <label for="thumb" class="btn btn-primary mt-md-4">
          <img src="{{ asset('assets/svg/upload-icon.svg') }}" alt="Fazer upload da capa" class="icon">
          <span class="text-white fw-semibold">Capa</span>
        </label>
        <input type="file" name="thumb" class="form-control d-none" id="thumb">
        <div class="form-text">Deixe em branco para manter a atual</div>
        @error('thumb')
          <span class="text-danger opacity-75 d-block">
            {{ $message }}
          </span>
        @enderror
      </div>
    </form>

    <div class="divider opacity-25 mt-5 mb-3"></div>

    <div class="d-flex justify-content-between align-items-center">

      <div>
        <input type="submit" value="Adicionar" form="edit-article" class="btn btn-primary">
        <a href="{{ url('/user/articles/' . $article->id) }}" class="btn btn-outline-secondary">
          Voltar
        </a>
      </div>

      <button class="btn btn-outline-danger end-0" data-bs-toggle="modal" data-bs-target="#delete-confirmation">
        Apagar
      </button>
    </div>

    <div class="modals">
      <div class="modal fade" id="delete-confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-body">
              <img src="{{ asset('assets/svg/question-icon.svg') }}" alt="Apagar artigo ícone" class="icon-large d-block mx-auto mb-3">
              
              <p class="text-center m-0">
                Deseja mesmo apagar esse artigo?
              </p>
              <p class="text-center opacity-75 mb-4">
                <small>
                  Será apagado permanentemente!
                </small>
              </p>

              <form action="/user/articles/{{ $article->id }}" method="POST">
                @csrf
                @method('DELETE')

                <input type="submit" value="Apagar" class="btn btn-danger d-block mx-auto">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>