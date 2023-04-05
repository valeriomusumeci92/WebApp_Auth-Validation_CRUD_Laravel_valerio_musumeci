<x-layout>
  
  <div class="container-fluid ps-md-0">
    <div class="row g-0">
      <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
      <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-4">Welcome back!</h3>
  
                <!-- Sign In Form -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form method="POST" action="{{ route ('login') }}">
                  @csrf
                  <div class="form-floating mb-3">
                    <input name="email" type="email" class="form-control" id="name" placeholder="name@example.com">
                    <label for="name">Email address</label>
                  </div>
                  
                  <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                  </div>
  
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                    <label class="form-check-label" for="rememberPasswordCheck">
                      Remember password
                    </label>
                  </div>
  
                  <div class="d-grid">
                    <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Login</button>
                    <div class="text-center">
                      <a class="small" href="#">Forgot password?</a>
                    </div>
                  </div>
  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

</x-layout>