
 <nav class="navbar navbar-expand-lg bg-custom-navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Presto.it</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            {{-- fortyfi ha una rotta home definita nella sua config nell'HREF QUA indico solo / questo slash,uri, si rifà alla rotta presente in fotyfi che trovo in cartella Providers -> RouteServiceProviders e lasciare solo / --}}
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('announcements.index') }}">Annunci</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categorie
            </a>
            <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
              @foreach($categories as $category)
              <li><a class="dropdown-item" href="{{ route('categoryShow' , compact('category')) }}">{{ $category->name }}</a></li>
              <li><hr class="dropdown-divider"></li>
              @endforeach
            </ul>
          </li>
           @guest
           
           <li class="nav-item">
            <a class="nav-link" href="{{ route ('register')}}">Registrati</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-warning" href="{{ route ('login')}}">Login</a>
          </li>
           {{-- logica di visualizzazione se l'utente è loggato --}}
         @else
         <li class="nav-item">
          <a class="nav-link" href="{{ route ('announcements.create') }}">Crea Annuncio</a>
        </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{-- tramite auth::user ci fa accedere i dati dell'utente in qualsiasi punto del nostro applicativo, dico di accedere ai dati dell'utente e con ->name dico di quei dati dammi
              il campo name --}}
                {{Auth::user()->name}} 
            </a>
            
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              
              <li>
              <form action="{{ route ('logout') }}"  method="POST">
              @csrf
                <button class="btn dropdown-item" type="submit">Logout</button>
              </form>
              {{-- per sloggare da laravel tramite prima una richiesta di tipo GET che è quella che si verifica per far scattare il form devo DICHIARARE LA ROTTA LOGOUT creandola in WEB.PHP --}}
              
            </ul>
          </li>
          
        @endguest
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>




