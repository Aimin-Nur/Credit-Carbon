@include('layouts.header')
@include('DJP.navbar')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              Pengajuan Claim Credit Carbon
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
                    <h2>Pricing plans for teams of all sizes</h2>
                    <div class="text-secondary text-wrap">
                      Choose an affordable plan that comes with the best features to engage your audience, create customer loyalty and increase sales.
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="text-uppercase text-secondary font-weight-medium">Total Pengajuan</div>
                    <div class="display-6 fw-bold my-3">{{$sumOfTransaksi ?? '0'}}</div>

                  </td>
                  <td class="text-center">
                    <div class="text-uppercase text-secondary font-weight-medium">Menunggu Verifikasi</div>
                    <div class="display-6 fw-bold my-3">{{$sumOfWaiting ?? '0'}}</div>
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
                      <th><button class="table-sort" data-sort="sort-city">Provinsi</button></th>
                      <th><button class="table-sort" data-sort="sort-type">Total Point</button></th>
                      <th><button class="table-sort" data-sort="sort-date">Tanggal Ajuan</button></th>
                      <th><button class="table-sort" data-sort="sort-progress">Action</button></th>
                    </tr>
                  </thead>
                  <tbody class="table-tbody">
                    @foreach ($getData as $plant )
                    <tr>
                        <td class="sort-name">{{$plant->users->perusahaan}}</td>
                        <td class="sort-name">{{$plant->users->provinsi}}</td>
                        <td class="sort-name"><b>{{$plant->sumOfPoint}}</b></td>
                        <td class="sort-name">{{$plant->updated_at}}</td>
                        <td class="sort-progress" data-progress="30">
                          <div class="row align-items-center">
                            <div class="col-12 col-lg-auto"><a href="" data-bs-toggle="modal" data-bs-target="#modal-success{{$plant->idTransaksi}}">Verifikasi</a></div>
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
            <div class="ribbon badge bg-info-lt">Verifikasi DLH {{$plant->users->provinsi}}</div>
            <div class="modal-body text-center py-4 mt-3">
                <span class="avatar avatar-xl rounded mt-5" style="background-image: url('{{ asset('storage/uploads/Profil-User/' . $plant->users->foto) }}')"></span>
              <h3 class="mt-4">{{$plant->users->perusahaan}} {{$plant->users->provinsi}}</h3>
              <div class="text-secondary">Tindakan ini akan membuat {{$plant->users->perusahaan}} dapat menukarkan poin credit carbon menjadi potongan pajak sebesar Rp. {{$plant->sumOfCarbon*100}}</div>
            </div>
            <div class="modal-footer">
              <div class="w-100">
                <form action="/approvalCreditCarbon/{{$plant->idTransaksi}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                <input type="hidden" name="getIdUser" value="{{$plant->users->id}}">
                <input type="hidden" name="getCarbon" value="{{$plant->sumOfCarbon}}">
                  <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                      Cancel
                    </a></div>
                  <div class="col"><button type="submit" class="btn btn-success w-100">
                      Tukar Poin
                    </button></div>
                </form>
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
