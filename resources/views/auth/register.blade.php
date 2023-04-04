<x-layout>
    <div class="container">
        <div class="row">
          <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
              <div class="card-img-left d-none d-md-flex">
                <!-- Background image for card set in CSS! -->
              </div>
              <div class="card-body p-4 p-sm-5">
                <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5>
                <form method="POST" action="{{ route ('register') }}">
                   @csrf
                <div class="form-floating mb-3">
                    <input name="username" type="text" class="form-control" id="floatingInputUsername"placeholder="myusername" required autofocus>
                    <label for="floatingInputUsername">Username</label>
                </div>

                <div class="form-floating mb-3">
                    <input name="email" type="email" class="form-control" id="floatingInputEmail" placeholder="your@email.com">
                    <label for="floatingInputEmail">Email address</label>
                  </div>

                  <hr>

                  <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                  </div>

                  <div class="d-grid mb-2">
                    <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Register</button>
                  </div>

                  <a class="d-block text-center mt-2 small" href="#">Have an account? Sign In</a>







                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


</x-layout>