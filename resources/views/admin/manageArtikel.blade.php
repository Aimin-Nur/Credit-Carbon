@include('layouts.header')
@include('admin.navbar')

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-stamp">
                    <div class="card-stamp-icon bg-success">
                      <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                    </div>
                  </div>
                  <div class="card-body">
                    <h3 class="card-title">Artikel Publish</h3>
                    <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto at consectetur culpa ducimus eum fuga fugiat, ipsa iusto, modi nostrum recusandae reiciendis saepe.</p>
                  </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-stamp">
                    <div class="card-stamp-icon bg-red">
                      <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                    </div>
                  </div>
                  <div class="card-body">
                    <h3 class="card-title">Draft Artikel</h3>
                    <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto at consectetur culpa ducimus eum fuga fugiat, ipsa iusto, modi nostrum recusandae reiciendis saepe.</p>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            Artikel
          </h2>
        </div>
      </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-md-6 col-lg-6">
                @foreach ($getArtikel as $artikel)
                    <div class="card">
                        <!-- Photo -->
                        <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url({{asset('demo')}}/./static/photos/home-office-desk-with-macbook-iphone-calendar-watch-and-organizer.jpg)"></div>
                        <div class="card-body">
                        <h3 class="card-title">{{$artikel->kategori}}</h3>
                        <p class="text-secondary">{!! $artikel->isi !!}</p>
                        </div>
                        <div class="card-footer">
                        <div class="d-flex">
                            <a href="#" class="btn btn-link">Last Update 3 mins Ago</a>
                            <a href="/readArtikel" class="btn btn-info ms-auto">Baca Artikel</a>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>




@include('layouts.footer')
@include('layouts.script')
