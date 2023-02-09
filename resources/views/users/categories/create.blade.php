<x-layout>
  <x-slot:title>
    Nova categoria - Larablog
  </x-slot:title>
  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/users/categories/create.css') }}">
  @endpush
  
  <section class="new-category bg-light rounded py-3 px-4 overflow-hidden">

    <h2 class="text-dark">Nova categoria</h2>

    <form action="/user/categories" method="POST" enctype="multipart/form-data" class="row g-3 overflow-hidde" id="add-category">
      @csrf

      <div class="form-group col-md-4">
        <label class="form-label">
          Nome *
        </label>
        <input type="text" name="name" placeholder="Nome da categoria" value="{{ old('name') }}" class="form-control">
      </div>
      @error('name')
        <span class="text-danger opacity-75">
          {{ $message }}
        </span>
      @enderror
      @error('slug')
        <span class="text-danger opacity-75">
          {{ $message }}
        </span>
      @enderror
    </form>

    <div class="divider opacity-25 mt-5 mb-3"></div>

    <input type="submit" value="Adicionar" form="add-category" class="btn btn-primary">
    <a href="{{ url('/user/categories') }}" class="btn btn-outline-secondary">
      Voltar
    </a>
  </section>

</x-layout>