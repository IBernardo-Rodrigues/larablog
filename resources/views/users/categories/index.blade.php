<x-layout>
  <x-slot:title>
    Categorias - Larablog
  </x-slot:title>

  <section class="categories">
    <div class="d-flex justify-content-between align-items-center">
      <h2 class="fw-semibold">
        Categorias
      </h2>

      <a href="{{ url('/user/categories/create') }}" class="btn btn-primary fw-semibold d-flex justify-content-between align-items-center gap-2">
        <img src="{{ asset('assets/svg/add-icon.svg') }}" alt="Adicionar categoria" class="icon">
        <span class="text-white">
          Adicionar
        </span>
      </a>
    </div>
    <p class="opacity-75">
      {{ $categories->total() . ' categorias' }}
    </p>

    <table class="table table-hover align-middle mb-5">
      <thead>
        <tr>
          <td class="text-uppercase opacity-75">Categoria</td>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
          <tr>
            <td>
              <a href="{{ url('/user/categories/' . $category->id . '/edit') }}" class="ms-2 fw-semibold text-decoration-none text-dark d-block w-100">
                {{ $category->name }}
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="d-flex justify-content-center">
      {{ $categories->onEachSide(3)->links() }}
    </div>

    <div class="modals">
      <x-modals.modal-success/>
    </div>
  </section>

  @push('scripts')
    <script src="{{ asset('assets/js/modal.js') }}"></script>
  @endpush

</x-layout>