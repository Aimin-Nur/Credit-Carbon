@include('layouts.header')
@include('user.navbar')

<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              History Claim Credit Carbon
            </h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="card">
          <div class="card-body">
            <div id="table-default" class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th><button class="table-sort" data-sort="sort-name">Tanggal Pengajuan (DJP)</button></th>
                    <th><button class="table-sort" data-sort="sort-city">Total Carbon</button></th>
                    <th><button class="table-sort" data-sort="sort-type">Total Point</button></th>
                    <th><button class="table-sort" data-sort="sort-score">Tanggal Verifikasi (DJP)</button></th>
                    <th><button class="table-sort" data-sort="sort-date">Action</button></th>
                  </tr>
                </thead>
                <tbody class="table-tbody">
                    @foreach ($getHistoryUser as $history )
                  <tr>
                    <td class="sort-name">{{$history->created_at}}</td>
                    <td class="sort-city">{{$history->sumOfCarbon}} Kg</td>
                    <td class="sort-type">{{$history->sumOfPoint}}</td>
                    <td class="sort-score">{{$history->created_at}}</td>
                    <td class="sort-date"> <a href="/invoice/{{$history->idTransaksi}}">Lihat Invoice</a></td>
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
