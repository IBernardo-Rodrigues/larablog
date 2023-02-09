<x-layout>
  <x-slot:title>
    Nova tag - Larablog
  </x-slot:title>
  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/users/tags/create.css') }}">
  @endpush
  
  <section class="new-tag bg-light rounded py-3 px-4 overflow-hidden">

    <h2 class="text-dark">Nova tag</h2>

    <form action="/user/tags" method="POST" enctype="multipart/form-data" class="row g-3" id="add-tag">
      @csrf

      <div class="form-group col-md-4">
        <label class="form-label">
          Nome *
        </label>
        <input type="text" name="name" placeholder="Nome da tag" value="{{ old('name') }}" class="form-control">
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
      </div>
    </form>

    <div class="divider opacity-25 mt-5 mb-3"></div>

    <input type="submit" value="Adicionar" form="add-tag" class="btn btn-primary">
    <a href="{{ url('/user/tags') }}" class="btn btn-outline-secondary">
      Voltar
    </a>
  </section>
</x-layout>