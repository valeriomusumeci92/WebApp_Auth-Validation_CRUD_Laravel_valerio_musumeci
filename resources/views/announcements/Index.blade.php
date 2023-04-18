<x-layout>

    <div class="container-fluid padding-top-custom bg-gradient bg-succes shadow mb-4">
        <div class="row">
            <div class="col-12  p-5">
                <h1 class="display-2 text-main-color fw-bold">{{__('ui.allAnnouncements')}}</h1>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row align-content-center">
            @forelse ($announcements as $announcement)
            <div class="col-12 col-md-4 my-4 d-flex justify-content-center">
                <div class="card card-custom shadow">
                    <img src="{{ !$announcement->images()->get()->isEmpty() ? Storage::url ($announcement->images()->first()->path) : 'https://picsum.photos/200'}}" class="card-img-top p-3 rounded test" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$announcement->title}} </h5>
                        <p class="card-text">{{$announcement->body}}  </p>
                        <a href="{{route('categoryShow' , ['category'=>$announcement->category])}}" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-category-custom">{{ $announcement->category->name }}</a>
                        <a href="{{ route('announcements.show' , compact ('announcement'))}}" class="btn btn-go-to-custom shadow">Visualizza</a>
                        <p class="card-footer">Pubblicato il: {{ $announcement->created_at->format('d/m/Y')}}</p>
                    </div>
                </div>
            </div>
            @empty
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