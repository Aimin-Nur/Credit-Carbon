@include('layouts.header')
@include('user.navbar')

    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="card">
          <div class="table-responsive">
            <table class="table table-vcenter table-bordered table-nowrap card-table">
              <thead>
                <tr>
                  <td class="w-50">
                    <h2>Claim Credit Carbon Anda</h2>
                    <div class="text-secondary text-wrap">
                      Dapatkan potongan pajak sesuai dengan point credit carbon yang Anda dapatkan. Ajukan claim credit carbon Anda ke Direktorat Jenderal pajak.
                    </div>
                  </td>

                  <td class="text-center">

                    <div class="text-uppercase text-secondary font-weight-medium">Total Carbon</div>
                    @if ($cekHistory > 0)
                        <div class="display-6 fw-bold my-3">{{$formattedSumOfCarbon ?? '0' }} Kg</div>

                    @endif
                  </td>
                  <td class="text-center">
                    <div class="text-uppercase text-secondary font-weight-medium">Total Point</div>
                    @if ($cekHistory > 0)
                        <div class="display-6 fw-bold my-3">Rp. {{$formattedSumOfCarbon*100 ?? '0'}}</div>
                    @endif
                    {{-- @if ($cekHistory > 0)
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-success" class="btn btn-green w-100">Claim Point</a>
                    @elseif ($cekHistory > 0)
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-not" class="btn btn-outline-success w-100">Claim Carbon</a>
                    @endif --}}
                    @if ($formattedSumOfCarbon < 0)
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-not" class="btn btn-outline-success w-100">Claim Carbon</a>
                    @elseif ($formattedSumOfCarbon > 0)
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-success" class="btn btn-green w-100">Claim Point</a>
                    @elseif ($countHistory > 0)
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-success" class="btn btn-outline-warning disabled w-100">Menunggu Verifikasi DJP</a>
                    @endif

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
                  @if ($countHistory == 0)
                  <tr>
                    <td colspan="5" class="text-center">Anda Belum Memiliki History Pengajuan Point Credit Carbon kepada Direktorat Jenderal Pajak</td>
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
                            <td class="sort-name">{{$plant->updated_at ?? 'Sedang Diproses'}}</td>
                        @endif
                        <td class="sort-progress text-center">
                            <span class="badge bg-blue-lt">Belum Terverifikasi DJP</span>
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


<form action="/claimToDjp" id="claimForm" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal modal-blur fade" id="modal-success" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
          <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-success"></div>
            <div class="modal-body text-center py-4">
              <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M9 12l2 2l4 -4" /></svg>
              <input type="hidden" name="sumOfCarbon" value="{{$sumOfCarbon}}">
              <input type="hidden" name="idUser" value="{{$getUser->id}}">
              <h3>Payment succedeed</h3>
              <div class="text-secondary">Your payment of $290 has been successfully submitted. Your invoice has been sent to support@tabler.io.</div>
            </div>
            <div class="modal-footer">
              <div class="w-100">
                <div class="row">
                  <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                      Go to dashboard
                    </a></div>
                  <div class="col"><button href="#" type="submit" id="claimButton" class="btn btn-success w-100" data-bs-dismiss="modal">
                      View invoice
                    </button></div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </form>


    <div class="modal modal-blur fade" id="modal-not" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <div class="modal-title">Anda Belum memiliki Total Poin</div>
              <div>Pastikan Anda sudah mengajukan data tanaman Anda dan telah diverifikasi oleh DLH setempat.</div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Oke Terima Kasih</button>
            </div>
          </div>
        </div>
      </div>

      <script>
       var claimForm = document.getElementById('claimForm');
        var claimButton = document.getElementById('claimButton');
        var countHistory = {{ $countHistory }};

        claimForm.addEventListener('submit', function(event) {
            if (countHistory > 0) {
                event.preventDefault(); // Mencegah pengiriman formulir
                alert('Transaksi Anda masih dalam proses verifikasi. Tidak dapat melakukan klaim poin saat ini.');
            } else {
                // Lanjutkan pengiriman formulir
            }
        });
    </script>

@include('layouts.footer')
@include('layouts.script')
