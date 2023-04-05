<x-layout>
   <x-navbar>
   </x-navbar>
  <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card border-0 shadow rounded-3 my-5">
            <div class="card-body p-4 p-sm-5">
              <h5 class="card-title text-center mb-5 fw-light fs-5">Registrati</h5>
              <form method="POST" action="{{ route ('register')}}">
                  @csrf
                <div class="form-floating mb-3">
                  <input type="text" name= "name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" value="{{ old('name') }}">
                  <label for="name">Aggiungi username</label>
                </div>
                <div class="form-floating mb-3">
                  <input name= "email" type="email" class="form-control @error('email') is-invalid @enderror" id="name" placeholder="email" value="{{ old('email') }}">
                  <label for="name">Aggiungi email</label>
                </div>
                <div class="form-floating mb-3">
                  <input name= "password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password" value="{{ old('password') }}">
                  <label for="name">Aggiungi password</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" name= "password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password confirmation" placeholder="name" value="{{ old('password_confirmation') }}">
                  <label for="name">Conferma password</label>
                </div>

                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                  <label class="form-check-label" for="rememberPasswordCheck">
                    Remember password
                  </label>
                </div>
                <div class="d-grid">
                  <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">
                  Registrati
                 </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</x-layout>