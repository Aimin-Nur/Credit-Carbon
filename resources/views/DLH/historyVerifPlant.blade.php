@include('layouts.header')
@include('DLH.navbar')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              History Verifkasi Tanaman User
            </h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="card">
          <div class="table-responsive">
            <table class="table table-vcenter table-bordered table-nowrap card-table">
              <thead>
                <tr>
                  <td class="w-50">
                    <h2>Riwayat Tanaman yang sudah diverifikasi</h2>
                    <div class="text-secondary text-wrap">
                      Tanaman users yang telah diverifikasi oleh Dinas Lingkungan Hidup provinsi {{$getDlh->provinsi ?? ''}} berhak mendapatkan point credit carbon.
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="text-uppercase text-secondary font-weight-medium">Total Tanaman Terveriikasi</div>
                    <div class="display-6 fw-bold my-3">{{$getPlantUser}} Tanaman</div>
                  </td>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="page-body">
        <div class="container-xl mb-5">
          <div class="card">
            <div class="card-body">
              <div id="table-default" class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th><button class="table-sort" data-sort="sort-name">Perusahaan</button></th>
                      <th><button class="table-sort" data-sort="sort-city">Jenis Tanaman</button></th>
                      <th><button class="table-sort" data-sort="sort-type">Tinggi</button></th>
                      <th><button class="table-sort" data-sort="sort-score">Diameter</button></th>
                      <th><button class="table-sort" data-sort="sort-quantity">Usia Tanaman</button></th>
                      <th><button class="table-sort" data-sort="sort-date">Tanggal Verifikasi</button></th>
                      <th><button class="table-sort" data-sort="sort-progress">Poin Carbon</button></th>
                    </tr>
                  </thead>
                  <tbody class="table-tbody">
                    @foreach ($getPlant as $plant )
                    <tr>
                        <td class="sort-name">{{$plant->users->perusahaan}}</td>
                        <td class="sort-city">{{$plant->jenis}}</td>
                        <td class="sort-type">{{$plant->tinggi}} cm</td>
                        <td class="sort-score">{{$plant->diameter}} cm</td>
                        <td class="sort-quantity">{{$plant->umur}} Tahun</td>
                        <td class="sort-date" data-date="1628122643">{{$plant->created_at}}</td>
                        <td class="sort-progress" data-progress="30">
                          <div class="row align-items-center">
                            <div class="col-12 col-lg-auto">{{$plant->totalCarbon}}</div>
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




@include('layouts.footer')
@include('layouts.script')
