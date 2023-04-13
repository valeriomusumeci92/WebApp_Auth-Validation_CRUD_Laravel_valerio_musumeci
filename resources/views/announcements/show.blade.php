<x-layout>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-5">
            <h1 class="display-2 text-main-color fw-bold py-2">Annuncio {{ $announcement->title }}</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row ">
        <div class="col-12">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              @if ($announcement->images)
              <div class="carousel-inner">
                @foreach ($announcement->images as $image)
                <div class="carousel-item @if($loop->first) active @endif">
                  <img src="{{ Storage::url($image->path) }}" class="img-fluid p-3 rounded" alt="...">
                </div>
                @endforeach
                @else
                <div class="carousel-item active">
                  <img src="https://picsum.photos/200" class="d-block w-100 img-fluid p-3" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="https://picsum.photos/200" class="d-block w-100 img-fluid p-3" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="https://picsum.photos/200" class="d-block w-100 img-fluid p-3" alt="...">
                </div>
                @endif
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        <div class="col-12 col-md-4 my-4 d-flex justify-content-center">
          <div class="card card-custom shadow" style="width: 18rem;">
              <img src="https://picsum.photos/200" class="card-img-top p-3 rounded" alt="...">
              <div class="card-body text-center">
              <h5 class="card-title">Titolo: {{$announcement->title}} </h5>
              <p class="card-text">Descrizione: {{$announcement->body}}  </p>
              <p class="card-text">Prezzo: {{$announcement->price}}</p>
              <a href="{{ route('categoryShow' , ['category'=>$announcement->category])}}" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success"> {{$announcement->category->name}}</a>
              <p class="card-footer">Pubblicato il: {{ $announcement->created_at->format('d/m/Y')}} - Autore  {{ $announcement->user->name ?? '' }}</p>
        </div>
    </div>
</div>


</x-layout>