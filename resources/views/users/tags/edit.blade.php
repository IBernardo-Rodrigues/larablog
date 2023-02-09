<x-layout>
  <x-slot:title>
    Editar tag - Larablog
  </x-slot:title>
  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/users/tags/edit.css') }}">
  @endpush
  
  <section class="edit-tag bg-light rounded py-3 px-4 overflow-hidden">

    <h2 class="text-dark">Editar tag</h2>

    <form action="/user/tags/{{ $tag->id }}" method="POST" enctype="multipart/form-data" class="row g-3" id="edit-tag">
      @csrf
      @method('PUT')

      <div class="form-group col-md-4">
        <label class="form-label">
          Nome *
        </label>
        <input type="text" name="name" placeholder="Nome da tag" class="form-control" value="{{ $tag->name }}">
        @error('slug')
          <span class="text-danger opacity-75">
            {{ $message }}
          </span>
        @enderror
        
      </div>
    </form>

    <div class="divider opacity-25 mt-5 mb-3"></div>

    <div class="d-flex justify-content-between align-items-center">

      <div>
        <input type="submit" value="Adicionar" form="edit-tag" class="btn btn-primary">
        <a href="{{ url('/user/tags') }}" class="btn btn-outline-secondary">
          Voltar
        </a>
      </div>

      <button class="btn btn-outline-danger end-0" data-bs-toggle="modal" data-bs-target="#delete-confirmation">
        Apagar
      </button>
    </div>

    <div class="modals">
      <div class="modal fade" id="delete-confirmation">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-body">
              <div class="d-flex justify-content-end">
                <button data-bs-dismiss="modal" class="btn border-0">
                  <img src="{{ asset('assets/svg/x-icon.svg') }}" alt="Fechar modal" class="icon">
                </button>
              </div>

              <img src="{{ asset('assets/svg/question-icon.svg') }}" alt="Apagar artigo ícone" class="icon-large d-block mx-auto mb-3">
              
              <p class="text-center m-0">
                Deseja mesmo apagar essa tag?
              </p>
              <p class="text-center opacity-75 mb-4">
                <small>
                  Será apagada permanentemente!
                </small>
              </p>

              <form action="/user/tags/{{ $tag->id }}" method="POST">
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