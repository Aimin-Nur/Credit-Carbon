@include('layouts.header')
@include('DJP.navbar')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              History Pengajuan Claim Credit Carbon
            </h2>
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
                      <th><button class="table-sort" data-sort="sort-city">Provinsi</button></th>
                      <th><button class="table-sort" data-sort="sort-type">Total Point</button></th>
                      <th><button class="table-sort" data-sort="sort-date">Tanggal Ajuan</button></th>
                      <th><button class="table-sort ms-4" data-sort="sort-progress">Status</button></th>
                    </tr>
                  </thead>
                  <tbody class="table-tbody">
                    @foreach ($getData as $plant )
                    <tr>
                        <td class="sort-name">{{$plant->users->perusahaan}}</td>
                        <td class="sort-name">{{$plant->users->provinsi}}</td>
                        <td class="sort-name"><b>{{$plant->sumOfPoint}}</b></td>
                        <td class="sort-name">{{ \Carbon\Carbon::parse($plant->updated_at)->format('F d, Y') }}</td>
                        <td class="sort-progress" data-progress="30">
                          <div class="row align-items-center">
                            <div class="col-12 col-lg-auto"><a><span class="badge bg-blue-lt">Sudah Terverifikasi</span></a></div>
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

      @foreach ($getData as $plant)
      {{-- <form action="/approvalClaimPoint{{$plant->idTransaksi}}" method="POST" enctype="multipart/form-data">
        @csrf --}}
      <div class="modal modal-blur fade" id="modal-success{{$plant->idTransaksi}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-status bg-success"></div>
            <div class="ribbon badge bg-green-lt">Verifikasi DLH {{$plant->users->provinsi}}</div>
            <div class="modal-body text-center py-4 mt-3">
                <span class="avatar avatar-xl rounded mt-5" style="background-image: url('{{ asset('storage/uploads/Profil-User/' . $plant->users->foto) }}')"></span>
              <h3 class="mt-4">{{$plant->users->perusahaan}} {{$plant->users->provinsi}}</h3>
              <div class="text-secondary">Tindakan ini akan membuat {{$plant->users->perusahaan}} dapat menukarkan poin credit carbon menjadi potongan pajak sebesar Rp. {{$plant->sumOfCarbon*100}}</div>
            </div>
            <div class="modal-footer">
              <div class="w-100">
                <div class="row">
                  <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                      Cancel
                    </a></div>
                  <div class="col"><a href="/approvalCreditCarbon/{{$plant->idTransaksi}}" class="btn btn-success w-100" data-bs-dismiss="modal">
                      Tukar Poin
                    </a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- </form> --}}
      @endforeach


@include('layouts.footer')
@include('layouts.script')
