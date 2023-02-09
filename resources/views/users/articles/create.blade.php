<x-layout>
  <x-slot:title>
    Novo Artigo - Larablog
  </x-slot:title>
  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/users/articles/create.css') }}">
  @endpush
  
  <section class="new-article bg-light rounded py-3 px-4 overflow-hidden">

    <h2 class="text-dark">Novo artigo</h2>

    <form action="/user/articles" method="POST" enctype="multipart/form-data" class="row g-3 overflow-hidden" id="add-article">
      @csrf

      <div class="form-group col-md-4">
        <label class="form-label">
          Título *
        </label>
        <input type="text" name="title" placeholder="Título do artigo" value="{{ old('title') }}" class="form-control">
        @error('title')
          <span class="text-danger opacity-75">
            {{ $message }}
          </span>
        @enderror
      </div>
      
      <div class="form-group col-md-4">
        <label class="form-label">
          Tags *
        </label>
        <input type="text" name="tags" placeholder="Ex: História, Para crianças" value="{{ old('tags') }}" class="form-control">
        @error('tags')
          <span class="text-danger opacity-75">
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
              <option value="{{ $category->slug }}">
                {{ $category->name }}
              </option>
            @endforeach
          @endif
        </select>
        @error('category')
          <span class="text-danger opacity-75">
            {{ $message }}
          </span>
        @enderror
      </div>

      <div class="form-group col-md-8">
        <label class="form-label">
          Texto *
        </label>
        <textarea name="text" cols="30" rows="10" class="form-control">{{ old('text') ?? "# Cerque uma frase de # para transformá-lo em um título #" }}</textarea>
        @error('text')
          <span class="text-danger opacity-75">
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
        @error('thumb')
          <span class="text-danger opacity-75 d-block">
            {{ $message }}
          </span>
        @enderror
      </div>
    </form>

    <div class="divider opacity-25 mt-5 mb-3"></div>

    <input type="submit" value="Adicionar" form="add-article" class="btn btn-primary">
    <a href="{{ url('/user/articles') }}" class="btn btn-outline-secondary">
      Voltar
    </a>
  </section>
</x-layout>