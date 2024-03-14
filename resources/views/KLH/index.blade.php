@include('layouts.header')
@include('KLH.navbar')


<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-12">
          <div class="row row-cards">
            <div class="col-sm-6 col-lg-12">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plant-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M2 9a10 10 0 1 0 20 0" /><path d="M12 19a10 10 0 0 1 10 -10" /><path d="M2 9a10 10 0 0 1 10 10" /><path d="M12 4a9.7 9.7 0 0 1 2.99 7.5" /><path d="M9.01 11.5a9.7 9.7 0 0 1 2.99 -7.5" /></svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        {{$getCount}} Akun
                      </div>
                      <div class="text-secondary">
                        <b>Dinas Lingkungan Hidup telah terdaftar</b>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
         <div class="col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">10 Provinsi dengan total Carbon terbanyak</h3>
                  </div>
                  <table class="table card-table table-vcenter">
                    <thead>
                        <tr>
                            <th>Provinsi</th>
                            <th>Point</th>
                            <th>Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($topProvinces as $province)
                        <tr>
                            <td>{{ $province->provinsi }}</td>
                            <td>{{ number_format($province->totalCarbon) }} Kg</td>
                            <td class="w-50">
                                <div class="progress progress-xs">
                                    @php
                                    $maxTotalCarbon = $topProvinces->max('totalCarbon');
                                    $progressPercentage = ($maxTotalCarbon != 0) ? ($province->totalCarbon / $maxTotalCarbon) * 100 : 0;
                                    @endphp
                                    <div class="progress-bar bg-primary" style="width: {{ $progressPercentage }}%"></div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>
        </div>
        <div class="col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dinas Lingkungan Hidup yang telah verifikasi akun</h3>
                </div>
                <div class="card-body">
                    <div id="chart-demo-pie"></div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>



<div class="container-xl mt-4">
    <div class="row mt-5">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle text-center">
              Postingan Admin
            </div>
            <h1 class="text-center">
              Artikel Publish
            </h1>
          </div>
        </div>
        <div class="row row-cards mt-1">
            @foreach ($getArtikel as $artikel)
            <div class="col-md-4 col-lg-4">
                    <div class="card">
                        <!-- Photo -->
                        <div class="img-responsive img-responsive-21x9 card-img-top"style="background-image: url('{{ asset('storage/uploads/Artikel/' . $artikel->gambar) }}')"></div>
                        <div class="card-body">
                        <h3 class="card-title">{{\Illuminate\Support\Str::words($artikel->kategori, 5, '...')}}</h3>
                        <p class="text-secondary">{!! \Illuminate\Support\Str::words($artikel->isi, 15, '...') !!}</p>
                        </div>
                        <div class="card-footer">
                        <div class="d-flex">
                            <a class="btn btn-link me-auto">{{ \Carbon\Carbon::parse($artikel->created_at)->format('F d, Y') }}
                            <div class="btn-group ms-auto">
                                <a href="/readArtikelbyKlh/{{$artikel->id}}" class="btn btn-md btn-primary btn-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><path d="M3 6l0 13" /><path d="M12 6l0 13" /><path d="M21 6l0 13" /></svg>
                                </a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</div>



@include('layouts.footer')
@include('layouts.script')
