@include('layouts.header')
@include('user.navbar')

<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              Invoice
            </h2>
          </div>
          <!-- Page title actions -->
          <div class="col-auto ms-auto d-print-none">
            <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
              <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>
              Print Invoice
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="card card-lg">
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <p class="h3">{{$getUser->perusahaan}}</p>
                <address>
                  {{$getUser->name}}<br>
                  Provinsi {{$getUser->provinsi}}<br>
                  {{$getUser->email}}
                </address>
              </div>
              <div class="col-6 text-end">
                <p class="h3">Direktorat Jenderal Pajak</p>
                <address>
                  Admin DPJ<br>
                  Kemayoran, jakarta pusat<br>
                 djp@gmail.com
                </address>
              </div>
              <div class="col-12 my-5">
                <i><h4>Tanggal Verifikasi DJP : {{$getSumPoint->updated_at}}</h4></i>
              </div>
            </div>
            <table class="table table-transparent table-responsive">
              <thead>
                <tr>
                  <th class="text-center" style="width: 1%">Gambar</th>
                  <th>Jenis Tanaman</th>
                  <th class="text-center" style="width: 1%">Tinngi Batang</th>
                  <th class="text-center" style="width: 1%">Diameter Batabng</th>
                  <th class="text-center" style="width: 1%">Umur Tannaman</th>
                  <th class="text-center" style="width: 1%">Total Carbon</th>
                  <th class="text-end" style="width: 1%">Total Point</th>
                </tr>
              </thead>
              @foreach ($transactions as $t )
              <tr>
                <td class="text-center"><span class="avatar me-2" style="background-image: url('{{ asset('storage/uploads/Plant-User/' . $t->plant->foto) }}')"></span></td>
                <td>
                    @if ($t->plant)

                    <p class="strong mb-1">{{ $t->plant->jenis}}</p>
                @else
                    <p class="text-danger">Data tanaman tidak ditemukan</p>
                @endif
                  <div class="text-secondary">Warna Daun : {{$t->plant->warna_daun}}</div>
                </td>
                <td class="text-center">
                    {{$t->plant->tinggi}} cm
                </td>
                <td class="text-center">
                    {{$t->plant->diameter}} cm
                </td>
                <td class="text-center">
                    {{$t->plant->umur}} Tahun
                </td>
                <td class="text-center">
                  @if ($t->plant->totalCarbon == 0)
                    {{$t->plant->transactionCarbon}}
                  @else
                     {{$t->plant->totalCarbon}}
                  @endif
                </td>

                <td class="text-center">
                    @if ($t->plant->totalCarbon == 0)
                      {{$t->plant->transactionCarbon*100}}
                    @else
                       {{$t->plant->totalCarbon*100}}
                    @endif
                  </td>
              </tr>
              @endforeach

            </table>
            <p class="text-secondary text-center mt-5">Anda menukarkan point credit carbon Anda dengan potongan pajak senilai <b>Rp. {{$getSumPoint->sumOfPoint}}</b</p>
          </div>
        </div>
      </div>
    </div>

@include('layouts.script')
@include('layouts.footer')
