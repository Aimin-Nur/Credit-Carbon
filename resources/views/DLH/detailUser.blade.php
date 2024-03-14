@include('layouts.header')
@include('DLH.navbar')

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card card-sm">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="bg-success text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                      </span>
                  </div>
                  <div class="col">
                    <div class="font-weight-medium">
                      Total Akun
                    </div>
                    <div class="text-secondary">
                      2 dari 2 Akun User Terverifikasi
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-body">
          <div class="accordion" id="accordion-example">
            @foreach ($getUser as $user )
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading-1">
                  <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1{{$user->id}}" aria-expanded="true">
                    {{$user->perusahaan}}
                  </button>
                </h2>
                <div id="collapse-1{{$user->id}}" class="accordion-collapse collapse show" data-bs-parent="#accordion-example">
                  <div class="accordion-body pt-0">
                      <div class="card-body">
                          <div class="datagrid">
                              <div class="datagrid-item">
                                  <div class="datagrid-title">Logo Perusahaan</div>
                                  <div class="datagrid-content">
                                    <div class="d-flex align-items-center">
                                    @if($user->foto)
                                        <span class="avatar avatar-sm" style="background-image: url('{{ asset('storage/uploads/Profil-User/' . $user->foto) }}')"></span>
                                    @else
                                        <span class="avatar avatar-sm" style="background-image: url('{{ asset('storage/uploads/Profil-User/default.png') }}')"></span>
                                    @endif
                                    </div>
                                  </div>
                                </div>
                            <div class="datagrid-item">
                              <div class="datagrid-title">Instansi/Perusahaan</div>
                              <div class="datagrid-content">{{$user->perusahaan}}</div>
                            </div>
                            <div class="datagrid-item">
                              <div class="datagrid-title">Username</div>
                              <div class="datagrid-content">{{$user->name}}</div>
                            </div>
                            <div class="datagrid-item">
                              <div class="datagrid-title">Tanggal Daftar Akun</div>
                              <div class="datagrid-content">{{ \Carbon\Carbon::parse($user->created_at)->format('F d, Y') }}</div>
                            </div>
                            <div class="datagrid-item">
                              <div class="datagrid-title">Status Akun</div>
                              <div class="datagrid-content">
                                <span class="status status-green">
                                  {{$user->status}}
                                </span>
                              </div>
                            </div>
                            <div class="datagrid-item">
                              <div class="datagrid-title">Tanggal Akun diverifkasi</div>
                              <div class="datagrid-content">{{ \Carbon\Carbon::parse($user->updated_at)->format('F d, Y') }}</div>
                            </div>
                            <div class="datagrid-item">
                              <div class="datagrid-title">Email User</div>
                              <div class="datagrid-content">
                                {{$user->email}}
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

@include('layouts.footer')
@include('layouts.script')
