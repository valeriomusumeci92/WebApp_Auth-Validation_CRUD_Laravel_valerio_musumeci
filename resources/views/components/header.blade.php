<header>
  <div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-caption">
                    <h1 class="page-title">Presto.it</h1>
                    <form action="{{ route('announcements.search')}}" method="GET" class="d-flex pt-2" role="search">
                        <input name="searched" class="form-control me-2 searchbar-custom" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-searchbar-custom" type="submit"><i class="fa-solid fa-magnifying-glass d-md-none"></i> <span class="d-none d-md-inline">Search</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="card-section">
    <div class="container">
        <div class="card-block bg-light-color mb30">
            <div class="row">
                <div class="col-12">
                    <div class="section-title mb-0">
                        <h2>{{__('ui.sell')}}</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti esse, expedita repudiandae sequi veritatis, laudantium sit ad dolor voluptatum, voluptatibus qui nihil! Ullam, praesentium modi quia voluptatibus ratione vitae illo? </p>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</header>