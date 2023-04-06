<x-layout>
    
    <div class="container padding-top-custom">
        <div class="row justify-content-evenly">
            <div class="col-12 text-center">
                <h1>Presto.it</h1>
                <p class="h2 my-2 fw-bold ">I nostri annunci</p>
                <div class="row align-content-center">
                @foreach($announcements as $announcement)
                    <div class="col-12 col-md-4 my-4 d-flex justify-content-center">
                        <div class="card" style="width: 17rem;">
                            <img src="https://picsum.photos/200" class="card-img-top p-3" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{ $announcement->title }}</h5>
                              <p class="card-text">{{ $announcement->body }}</p>
                              <p class="card-text">{{ $announcement->price }} €</p>
                              <a href="" class="btn btn-category-custom my-2 py-2" >Categoria {{ $announcement->category->name }} </a>
                              <a href="#" class="btn btn-go-to-custom my-2">Go somewhere</a>
                              <p>Pubblicato il : {{ $announcement->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
       
</x-layout>
