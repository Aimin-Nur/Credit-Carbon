@include('layouts.header')
@include('DLH.navbar')
<!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card card-md">
                      <div class="card-stamp card-stamp-lg">
                        <div class="card-stamp-icon bg-green">
                          <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-hexagon" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" /><path d="M6.201 18.744a4 4 0 0 1 3.799 -2.744h4a4 4 0 0 1 3.798 2.741" /><path d="M19.875 6.27c.7 .398 1.13 1.143 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z" /></svg>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-10">
                            <h3 class="h1">Halo, Selamat Datang Admin DLH</h3>
                            <div class="markdown text-secondary">
                                Selamat datang di halaman Dinas Lingkungan Hidup (DLH). Mari bersama-sama berkontribusi dalam memastikan kelestarian alam melalui pengelolaan tanaman yang terverifikasi dan berkelanjutan.
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

            <div class="col-12">
                <div class="row row-cards">
                    {{-- <div class="col-sm-6 col-lg-6">
                        <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trees" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 5l3 3l-2 1l4 4l-3 1l4 4h-9" /><path d="M15 21l0 -3" /><path d="M8 13l-2 -2" /><path d="M8 12l2 -2" /><path d="M8 21v-13" /><path d="M5.824 16a3 3 0 0 1 -2.743 -3.69a3 3 0 0 1 .304 -4.833a3 3 0 0 1 4.615 -3.707a3 3 0 0 1 4.614 3.707a3 3 0 0 1 .305 4.833a3 3 0 0 1 -2.919 3.695h-4z" /></svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                {{$totalPengajuan}} Users
                                </div>
                                <div class="text-secondary">
                                <b>Mengajukan Claim Credit Carbon</b>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div> --}}
                    <div class="col-sm-6 col-lg-6">
                        <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-seeding" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 10a6 6 0 0 0 -6 -6h-3v2a6 6 0 0 0 6 6h3" /><path d="M12 14a6 6 0 0 1 6 -6h3v1a6 6 0 0 1 -6 6h-3" /><path d="M12 20l0 -10" /></svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                {{$getVerifPlant ?? ''}} Pengajuan
                                </div>
                                <div class="text-secondary">
                                <b>Telah Diverifikasi</b>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6">
                        <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-red text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" /><path d="M14 8h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5m2 0v1.5m0 -9v1.5" /></svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                {{$getNotVerifPlant ?? ''}} Pengajuan
                                </div>
                                <div class="text-secondary">
                                <b>Menunggu Untuk Diverifikasi</b>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-12">
                        <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-skyscraper" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l18 0" /><path d="M5 21v-14l8 -4v18" /><path d="M19 21v-10l-6 -4" /><path d="M9 9l0 .01" /><path d="M9 12l0 .01" /><path d="M9 15l0 .01" /><path d="M9 18l0 .01" /></svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                {{$getUnverifiedUsers ?? ''}} Perusahaan
                                </div>
                                <div class="text-secondary"><b>Menunggu untuk verifikasi akun</b>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <div class="card bg-green-lt card-sm">
                          <div class="ribbon ribbon-top ribbon-bookmark bg-green">

                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 21c.5 -4.5 2.5 -8 7 -10" /><path d="M9 18c6.218 0 10.5 -3.288 11 -12v-2h-4.014c-9 0 -11.986 4 -12 9c0 1 0 3 2 5h3z" /></svg>
                          </div>
                          <div class="card-body text-center">
                            <div class="text-uppercase text-secondary font-weight-medium">Total Carbon Yang Telah Diverifikasi</div>
                            <div class="display-5 fw-bold my-3">{{$totalKarbon}} Kg</div>
                            <ul class="list-unstyled lh-lg">
                              <li>dari total<strong> {{$countUser}}</strong> akun users</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-12">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">10 Perusahaan dengan Total Carbon terbanyak</h3>
                          </div>
                          <table class="table card-table table-vcenter">
                            <thead>
                              <tr>
                                <th>Perusahaan</th>
                                <th colspan="8">Provinsi</th>
                                <th colspan="2">Point</th>
                                <th colspan="2">Progress</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($topCompanies as $company)
                              <tr>
                                <td>{{$company->perusahaan}}</td>
                                <td colspan="8">{{$company->provinsi}}</td>
                                <td colspan="2">{{ number_format($company->totalCarbon, 0, ',', '.') }} Kg</td>
                                <td class="w-50">
                                    <div class="progress progress-xs">
                                        @php
                                            $maxTotalCarbon = max($topCompanies->pluck('totalCarbon')->toArray());
                                        @endphp
                                         @if($maxTotalCarbon != 0)
                                            <div class="progress-bar bg-primary" style="width: {{ ($company->totalCarbon / $maxTotalCarbon) * 100 }}%"></div>
                                         @else
                                            <div class="progress-bar bg-primary" style="width: 0%"></div>
                                         @endif
                                    </div>
                                </td>

                              </tr>
                              @endforeach

                            </tbody>
                          </table>
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
                                        <a href="/readArtikelbyDlh/{{$artikel->id}}" class="btn btn-md btn-primary btn-icon">
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
        








@include('layouts.footer')
@include('layouts.script')
