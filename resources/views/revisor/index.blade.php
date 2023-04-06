<x-layout>

<div class="container-fluid p-5 bg-gradient bg-success p-5 shadow mb-4">
    <div class="row">
        <div class="col-12 p-5">
            <h1 class="display-2">
                {{$announcement_to_check ? "Ecco l'annuncio da revisionare" : "Non ci sono annunci da revisionare"}}
            </h1>

        </div>

    </div>

</div>
@if ($announcement_to_check)
<div class="container">
    <div class="row ">
        <div class="col-12">
            <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://picsum.photos/200" class="d-block w-100 img-fluid p-3" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://picsum.photos/200" class="d-block w-100 img-fluid p-3" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://picsum.photos/200" class="d-block w-100 img-fluid p-3" alt="...">
                  </div>
                </div>
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
          <div class="card shadow" style="width: 18rem;">
              <img src="https://picsum.photos/200" class="card-img-top p-3 rounded" alt="...">
              <div class="card-body text-center">
              <h5 class="card-title">Titolo: {{$announcement_to_check->title}} </h5>
              <p class="card-text">Descrizione: {{$announcement_to_check->body}}  </p>
              <p class="card-footer">Pubblicato il: {{$announcement_to_check->created_at->format('d/m/Y')}}
            </p>
              
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <form action="{{ route ('revisor.accept_announcement' , ['announcement' =>$announcement_to_check] )}}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-success shadow">Accetta</button>
        </form>
    </div>
<div class="col-12 col-md-6 text-end">
    <form action="{{ route ('revisor.reject_announcement' , ['announcement' =>$announcement_to_check] )}}" method="POST">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-danger shadow">Rifiuta</button>
    </form>
</div>
@endif
</x-layout>