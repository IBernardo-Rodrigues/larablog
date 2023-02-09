@if(session('status'))

  <div class="modal fade" id="modal-success">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body d-flex flex-column align-items-center position-relative">
          <button class="btn border-0 position-absolute end-0 top-0" data-bs-dismiss="modal">
            <img src="{{ asset('assets/svg/x-icon.svg') }}" alt="Fechar modal icone" class="icon opacity-75">
          </button>
          
          <img src="{{ asset('assets/svg/check-icon.svg') }}" alt="Icone de sucesso" class="icon-large mt-3 mb-3">

          <h2>Sucesso!</h2>

          <p class="text-center opacity-75">
            {{ session('status') }}
          </p>
        </div>
      </div>
    </div>
  </div>
  
@endif
