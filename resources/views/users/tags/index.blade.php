<x-layout>
  <x-slot:title>
    Tags - Larablog
  </x-slot:title>

  @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/users/tags/index.css') }}">
  @endpush


  <section class="tags">
    <div class="d-flex justify-content-between align-items-center">
      <h2 class="fw-semibold">
        Tags
      </h2>

      <a href="{{ url('/user/tags/create') }}" class="btn btn-primary fw-semibold d-flex justify-content-between align-items-center gap-2">
        <img src="{{ asset('assets/svg/add-icon.svg') }}" alt="Adicionar tag" class="icon">
        <span class="text-white">
          Adicionar
        </span>
      </a>
    </div>
    <p class="opacity-75">
      {{ $tags->total() . ' tags' }}
    </p>

    <table class="table table-hover align-middle mb-5">
      <thead>
        <tr>
          <td class="text-uppercase opacity-75">Tag</td>
        </tr>
      </thead>
      <tbody>
        <tr>
        @foreach($tags as $tag)
          <tr>
            <td>
              <a href="{{ url('/user/tags/' . $tag->id . '/edit') }}" class="ms-2 fw-semibold text-decoration-none text-dark d-block w-100">
                {{ $tag->name }}
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="d-flex justify-content-center">
      {{ $tags->onEachSide(3)->links() }}
    </div>

    <div class="modals">
      <x-modals.modal-success/>
    </div>

    @push('scripts')
      <script src="{{ asset('assets/js/modal.js') }}"></script>
    @endpush
  </section>

</x-layout>
