@include('layouts.header')
@include('DJP.navbar')
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
                            <h3 class="h1">Halo, Selamat Datang Admin DJP</h3>
                            <div class="markdown text-secondary">
                              Setiap Users yang akan melakukan Claim Credit Carbon harus terlebih dahulu diverifikasi oleh Direktorat Jenderal Pajak, Silahkan lakukan verifikasi pengajuan Credit Carbon.
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
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-cash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" /><path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" /></svg>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                {{$totalValidasi}} Pengajuan
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
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-coin-off"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14.8 9a2 2 0 0 0 -1.8 -1h-1m-2.82 1.171a2 2 0 0 0 1.82 2.829h1m2.824 2.822a2 2 0 0 1 -1.824 1.178h-2a2 2 0 0 1 -1.8 -1" /><path d="M20.042 16.045a9 9 0 0 0 -12.087 -12.087m-2.318 1.677a9 9 0 1 0 12.725 12.73" /><path d="M12 6v2m0 8v2" /><path d="M3 3l18 18" /></svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                {{$totalPending}} Pengajuan
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
                                {{$totalUser}} Perusahaan
                                </div>
                                <div class="text-secondary"><b>Mengajukan Claim Credit Carbon</b>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
              {{-- chart --}}
              {{-- <div class="col-md-12 col-lg-8">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Most Visited Pages</h3>
                  </div>
                  <div class="card-table table-responsive">
                    <table class="table table-vcenter">
                      <thead>
                        <tr>
                          <th>Page name</th>
                          <th>Visitors</th>
                          <th>Unique</th>
                          <th colspan="2">Bounce rate</th>
                        </tr>
                      </thead>
                      <tr>
                        <td>
                          /
                          <a href="#" class="ms-1" aria-label="Open website"><!-- Download SVG icon from http://tabler-icons.io/i/link -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                          </a>
                        </td>
                        <td class="text-secondary">4,896</td>
                        <td class="text-secondary">3,654</td>
                        <td class="text-secondary">82.54%</td>
                        <td class="text-end w-1">
                          <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-1"></div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          /form-elements.html
                          <a href="#" class="ms-1" aria-label="Open website"><!-- Download SVG icon from http://tabler-icons.io/i/link -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                          </a>
                        </td>
                        <td class="text-secondary">3,652</td>
                        <td class="text-secondary">3,215</td>
                        <td class="text-secondary">76.29%</td>
                        <td class="text-end w-1">
                          <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-2"></div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          /index.html
                          <a href="#" class="ms-1" aria-label="Open website"><!-- Download SVG icon from http://tabler-icons.io/i/link -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                          </a>
                        </td>
                        <td class="text-secondary">3,256</td>
                        <td class="text-secondary">2,865</td>
                        <td class="text-secondary">72.65%</td>
                        <td class="text-end w-1">
                          <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-3"></div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          /icons.html
                          <a href="#" class="ms-1" aria-label="Open website"><!-- Download SVG icon from http://tabler-icons.io/i/link -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                          </a>
                        </td>
                        <td class="text-secondary">986</td>
                        <td class="text-secondary">865</td>
                        <td class="text-secondary">44.89%</td>
                        <td class="text-end w-1">
                          <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-4"></div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          /docs/
                          <a href="#" class="ms-1" aria-label="Open website"><!-- Download SVG icon from http://tabler-icons.io/i/link -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                          </a>
                        </td>
                        <td class="text-secondary">912</td>
                        <td class="text-secondary">822</td>
                        <td class="text-secondary">41.12%</td>
                        <td class="text-end w-1">
                          <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-5"></div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          /accordion.html
                          <a href="#" class="ms-1" aria-label="Open website"><!-- Download SVG icon from http://tabler-icons.io/i/link -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" /><path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" /></svg>
                          </a>
                        </td>
                        <td class="text-secondary">855</td>
                        <td class="text-secondary">798</td>
                        <td class="text-secondary">32.65%</td>
                        <td class="text-end w-1">
                          <div class="chart-sparkline chart-sparkline-sm" id="sparkline-bounce-rate-6"></div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <a href="https://github.com/sponsors/codecalm" class="card card-sponsor" target="_blank" rel="noopener" style="background-image: url(./static/sponsor-banner-homepage.svg)" aria-label="Sponsor Tabler!">
                  <div class="card-body"></div>
                </a>
              </div> --}}
              <div class="col-lg-12 col-md-12">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Traffic summary</h3>
                    <div id="chart-mentions" class="chart-"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Top 10 Perusahaan dengan total transaksi tertinggi</h3>
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
                        <td colspan="2">{{ number_format($company->totalPoint, 0, ',', '.') }} Kg</td>
                        <td class="w-50">
                            <div class="progress progress-xs">
                                @php
                                    $maxTotalPoint = max($topCompanies->pluck('totalPoint')->toArray());
                                @endphp
                                 @if($maxTotalPoint != 0)
                                    <div class="progress-bar bg-primary" style="width: {{ ($company->totalPoint / $maxTotalPoint) * 100 }}%"></div>
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
                                        <a href="/readArtikelbyDjp/{{$artikel->id}}" class="btn btn-md btn-primary btn-icon">
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


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-mentions'), {
                chart: {
                    type: "bar",
                    fontFamily: 'inherit',
                    height: 240,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: false
                    },
                    stacked: true,
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%',
                    }
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: 1,
                },
                series: {!! $seriesJson !!}, // Menyisipkan variabel seriesJson
                tooltip: {
                    theme: 'dark'
                },
                grid: {
                    padding: {
                        top: -20,
                        right: 0,
                        left: -4,
                        bottom: -4
                    },
                    strokeDashArray: 4,
                },
                xaxis: {
                    lines: {
                        show: true
                    },
                    categories: {!! $transactions->pluck('created_at')->toJson() !!}, // Menyisipkan variabel categories
                    labels: {
                        padding: 0,
                    },
                    tooltip: {
                        enabled: false
                    },
                    axisBorder: {
                        show: false,
                    },
                    type: 'datetime',
                },
                yaxis: {
                    labels: {
                        padding: 4
                    },
                },
                colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8), tabler.getColor("green", 0.8)],
                legend: {
                    show: true,
                    position: 'top',
                },
            })).render();
        });
    </script>



@include('layouts.footer')
@include('layouts.script')
