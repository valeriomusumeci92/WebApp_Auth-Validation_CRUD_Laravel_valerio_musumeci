<x-layout>

    <div class="container-fluid padding-top-custom bg-gradient bg-succes shadow mb-4">
        <div class="row">
            <div class="col-12  p-5">
                <h1 class="display-2 text-main-color fw-bold">Ecco i nostri annunci</h1>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row align-content-center">
            @forealse ($announcements as $announcement)
            <div class="col-12 col-md-4 my-4 d-flex justify-content-center">
                <div class="card shadow" style="width: 18rem;">
                    <img src="https://picsum.photos/200" class="card-img-top p-3 rounded" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$announcement->title}} </h5>
                        <p class="card-text">{{$announcement->body}}  </p>
                        <p class="card-text">{{$announcement->price}}</p>
                        
                        <a href="{{route('categoryShow' , ['category'=>$announcement->category])}}" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-category-custom">Categoria: {{ $announcement->category->name }}</a>
                        <a href="{{ route('announcements.show' , compact('announcement'))}}" class="btn btn-go-to-custom border-dark shadow">Visualizza</a>
                        <p class="card-footer">Pubblicato il: {{ $announcement->created_at->format('d/m/Y')}}  Autore {{ $announcement->user->name ?? '' }}</p>
                    </div>
                </div>
            </div>
            @empy
            <div class="col-12">
                <div class="alert alert-warning py-3 shadow">
                    <p class="lead">Non ci sono annunci per questa ricerca. Prova a cambiare il nome del tuo annuncio</p>
                </div>
            </div>
            @endforelse
            {{$announcements->links()}}
        </div>
    </div>

</x-layout>