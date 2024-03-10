@include('layouts.header')
@include('user.navbar')

<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              History Tukar Poin Carbon
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
                    <h2>Riwayat Claim Credit Carbon Anda</h2>
                    <div class="text-secondary text-wrap">
                      Direktoat Jenderal Pajak telah menyetujui claim credit carbon Anda, pajak Anda Akan terpotong sesuai dengan Credit Carbon yang Anda claim.
                    </div>
                  </td>

                  <td class="text-center">
                    <div class="text-uppercase text-secondary font-weight-medium">Total Claim Credit Carbon</div>

                        <div class="display-6 fw-bold my-3">{{$getHistoryCount ?? '0'}} Transaksi</div>
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
                      <th><button class="table-sort" data-sort="sort-name">Tanggal Pengajuan</button></th>
                      <th><button class="table-sort" data-sort="sort-city">Total Kredit Carbon</button></th>
                      <th><button class="table-sort" data-sort="sort-type">Total Point Point</button></th>
                      <th><button class="table-sort text-center" data-sort="sort-date">Tanggal Persetujuan (DJP)</button></th>
                      <th><button class="table-sort text-center" data-sort="sort-progress">Status</button></th>
                    </tr>
                  </thead>
                  @if ($getHistoryCount == 0)
                  <tbody class="table-tbody">
                    <tr style="w-100">
                        <td class="sort-name">Anda Belum Memiliki History Pengajuan Point Credit Carbon kepada Direktorat Jenderal Pajak</td>
                    </tr>
                  @endif
                  <tbody class="table-tbody">
                    @foreach ($getHistory as $plant)
                    <tr>
                        <td class="sort-name">{{$plant->created_at ?? ''}}</td>
                        <td class="sort-name">{{$plant->sumOfCarbon ?? ''}} Kg</td>
                        <td class="sort-name">Rp. {{$plant->sumOfPoint*100 ?? ''}}</td>
                        @if ($plant->status == 0)
                            <td class="sort-name text-center">-</td>
                        @else
                            <td class="sort-name">{{$plant->updated_at ?? ''}}</td>
                        @endif
                        <td class="sort-progress text-center">
                            <span class="badge bg-success-lt">Berhasil Claim Potongan Pajak</span>
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
