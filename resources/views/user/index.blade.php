@include('layouts.header')
@include('user.navbar')

    <div class="page-header d-print-none">
      <div class="container">
        <div class="row g-3 align-items-center">
          <div class="col-auto">
            <span class="status-indicator status-green status-indicator-animated">
              <span class="status-indicator-circle"></span>
              <span class="status-indicator-circle"></span>
              <span class="status-indicator-circle"></span>
            </span>
          </div>
          <div class="col">
            <h4 class="page-title">
              Akun Telah di Verifikasi
            </h4>
            <div class="text-secondary">
              <ul class="list-inline list-inline-dots mb-0">
                <li class="list-inline-item"><span class="text-green">update :</span></li>
                <li class="list-inline-item">{{$getUser->updated_at ?? ''}}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-cards">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="subheader">Jumlah Pengajuan Tanaman</div>
                <div class="h3 m-0">{{$sumOfPlant}} Tanaman</div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="subheader">Pengajuan Tanaman Terverifikasi DLH</div>
                <div class="h3 m-0">{{$sumOfPlantVerif}} Tanaman</div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="subheader">Jumlah Transaksi</div>
                <div class="h3 m-0">{{$sumOfTransaksi}} Transaksi</div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Trafic Transaction</h3>
                <div id="chart-uptime"></div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-lg-4">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card">
                  <div class="card-body p-4 py-5 text-center">
                    <span class="avatar avatar-xl rounded mb-5" style="background-image: url({{asset('demo')}}/./static/avatars/carbon.jpeg)"></span>
                    <h3 class="mb-0">Total Carbon</h3>
                    <p class="text-secondary"> Verifikasi Dinas Lingkungan Hidup</p>
                    <p class="mb-3">
                      <span class="badge bg-red-lt">{{$formattedSumOfCarbon ?? ''}} Kg</span> ->
                      <span class="badge bg-info-lt">Rp.{{$formattedSumOfCarbon ?? ''}}</span>
                    </p>
                    <div>
                    </div>
                  </div>
                  <div class="progress card-progress">
                    <div class="progress-bar" style="width: 38%" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" aria-label="38% Complete">
                      <span class="visually-hidden">38% Complete</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-table table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Jenis Tanaman</th>
                      <th>Tinggi Batang</th>
                      <th>Diamater Batang</th>
                      <th>Usia Tanaman</th>
                      <th>Warna Daun</th>
                      <th>Total Carbon</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($topFive as $five )
                    <tr>
                      <td>{{$five->jenis}}</td>
                      <td>{{$five->tinggi}} Cm</td>
                      <td>{{$five->diameter}} Cm</td>
                      <td>{{$five->umur}} Tahun</td>
                      <td>{{$five->warna_daun}}</td>
                      <td>{{$five->transactionCarbon ?? $five->totalCarbon}} Kg</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-uptime'), {
                chart: {
                    type: "area",
                    fontFamily: 'inherit',
                    height: 240,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: .16,
                    type: 'solid'
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                    curve: "smooth",
                },
                series: [{
                    name: "Total Carbon",
                    data: {!! $seriesData !!}
                }],
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
                    categories: {!! $categories !!},
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
                legend: {
                    show: false,
                },
            })).render();
        });
        // @formatter:on
    </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-uptime-incidents'), {
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
            series: [{
                name: "Uptime incidents",
                data: [1, 2, 6, 3, 1, 1, 2, 5, 2, 5, 6, 2, 4, 3, 4, 5, 4, 3, 2, 1, 2, 0, 2, 1, 1]
            }],
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
                max: 20,
            },
            labels: [
                '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15'
            ],
            colors: [tabler.getColor("success")],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
  </script>

@include('layouts.footer')
@include('layouts.script')
