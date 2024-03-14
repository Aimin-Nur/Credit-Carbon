@include('layouts.header')
@include('KLH.navbar')


<div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="row row-cards">
              <div class="col-sm-12 col-lg-12">
                <div class="card card-sm">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="bg-green-lt text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-seeding" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 10a6 6 0 0 0 -6 -6h-3v2a6 6 0 0 0 6 6h3" /><path d="M12 14a6 6 0 0 1 6 -6h3v1a6 6 0 0 1 -6 6h-3" /><path d="M12 20l0 -10" /></svg>
                        </span>
                      </div>
                      <div class="col">
                        <div class="font-weight-medium">
                         Credit Carbon Users
                        </div>
                        <div class="text-secondary">
                          Jumlah credit carbon users telah diverifikasi oleh Dinas Lingkungan Hidup setempat
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Tanaman</h3>
              </div>
              <div class="card-body border-bottom py-3">
                <div class="d-flex">
                  <div class="text-secondary">
                    Show
                    <div class="mx-2 d-inline-block">
                      <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                    </div>
                    entries
                  </div>
                  <div class="ms-auto text-secondary">
                    Search:
                    <div class="ms-2 d-inline-block">
                      <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                  <thead>
                    <tr  class="text-center">
                    <th>Perusahaan</th>
                      <th>Nama Perusahaan</th>
                      <th>Jumlah Tanaman)</th>
                      <th>Provinsi</th>
                      <th>Total Carbon</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($userCarbon as $plant)
                    <tr class="text-center">
                        <td>
                            @if($plant->foto)
                            <span href="/" data-bs-toggle="modal" data-bs-target="#modal-large{{$plant->id}}" class="flag flag-sm" style="background-image: url('{{ asset('storage/uploads/Profil-User/' . $plant->foto) }}')"></span>
                        @else
                            <span class="flag flag-sm" style="background-image: url({{asset('storage/uploads/Profil-User/job-1.jpg')}})"></span>
                        @endif
                        </td>
                      <td>
                       {{$plant->nama_perusahaan}}
                      </td>
                      <td>
                        {{$plant->jumlah_tanaman}} Qty
                      </td>
                      <td>
                       {{$plant->provinsi}}
                      </td>
                      <td>
                        {{$plant->total_carbon}} Kg
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-secondary">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
                <ul class="pagination m-0 ms-auto">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                      <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
                      prev
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item active"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">4</a></li>
                  <li class="page-item"><a class="page-link" href="#">5</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

{{--
@foreach ($getPlant as $plant )
<div class="modal modal-blur fade" id="modal-large{{$plant->idPlant}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Recent Plant</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-xl">
                <div class="row row-cards">
                  <div class="col-lg-12">
                    <div class="card mb-3">
                        <div class="card-status-top bg-green"></div>
                      <div class="card-body">
                        <ul class="steps steps-green steps-counter my-4">
                          <li class="step-item ">Save Data Plant</li>
                            @if ($plant->status == 0)
                                <li class="step-item active">Verifikasi DLH</li>
                                <li class="step-item ">Get Poin Carbon</li>
                            @else
                            <li class="step-item ">Verifikasi DLH</li>
                                <li class="step-item active">Get Poin Carbon</li>
                            @endif
                        </ul>
                      </div>
                      <div class="card-footer">
                        <div class="card-status-top bg-green"></div>
                        <ol class="breadcrumb breadcrumb-arrows">

                            @if ($plant->status == 0)
                                <li class="text-center breadcrumb-item active"><a href="#">Data Tanaman Anda berhasil disimpan, saat ini Dinas Lingkungan Hidup setempat akan melakukan verifikasi tanaman Anda, silahkan cek secara berkala informasi poin carbon akun Anda melalui halaman ini</a></li>
                            @else
                                <li class="text-center breadcrumb-item active"><a href="#">Tanaman Anda telah diverifikasi oleh DLH. Anda mendapatkan poin carbon sebesar 815.019 Kg</a></li>
                            @endif
                        </ol>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
        </div>
      </div>
    </div>
</div>
@endforeach --}}





@include('layouts.footer')
@include('layouts.script')
