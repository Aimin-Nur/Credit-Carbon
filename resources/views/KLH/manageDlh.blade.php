@include('layouts.header')
@include('KLH.navbar')

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 col-xl-6">
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
                      {{$verif}} DLH Terverifikasi
                    </div>
                    <div class="text-secondary">
                      {{$verif}} dari {{$sumOfDlh}} Akun DLH Terverifikasi
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="card card-sm">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="bg-red text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                    </span>
                  </div>
                  <div class="col">
                    <div class="font-weight-medium">
                        {{$notVerif}} DLH Belum Terverifikasi
                      </div>
                      <div class="text-secondary">
                        {{$notVerif}} dari {{$sumOfDlh}} Akun DLH Belum Terverifikasi
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3">
    <div class="col-12">
        <?php
            $berhasil = Session::get('berhasil');
                                if ($berhasil) {
                                    echo '<div class="alert alert-success alert-dismissible" role="alert">
                                    <div class="d-flex">
                                        <div>
                                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                                        </div>
                                        <div>'
                                            .$berhasil.
                                        '</div>
                                    </div>
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                    </div>';
                                    }
        ?>

        <div class="card">
          <div class="table-responsive">
            <table class="table table-vcenter table-mobile-md card-table">
               <thead>
                <tr>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Role</th>
                  <th class="w-1 text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($get as $data)
                <tr>
                    <td data-label="Name">
                      <div class="d-flex py-1 align-items-center">
                        <span class="avatar me-2" style="background-image: url(./static/avatars/010m.jpg)"></span>
                        <div class="flex-fill">
                          <div class="font-weight-medium">{{$data->username}}</div>
                          <div class="text-secondary"><a href="#" class="text-reset">{{$data->email}}</a></div>
                        </div>
                      </div>
                    </td>
                    <td data-label="Title" >
                      <div>{{$data->provinsi}}</div>
                    </td>
                    <td class="text-secondary" data-label="Role" >
                     <b>{{$data->status}}</b>
                    </td>
                    <td>
                      <div class="btn-list flex-nowrap">
                        @if ($data->status == "Terverifikasi")
                        <a class="btn btn-outline-info disabled" href="#">
                            Terverifikasi
                          </a>
                        @else
                        <a class="btn btn-outline-danger" href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-danger{{$data->id}}">
                          Menunggu verifikasi
                        </a>
                        @endif
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

@foreach ($get as $data )
<div class="modal modal-blur fade" id="modal-danger{{$data->id}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <form action="/sendVerifDlh/{{$data->id}}" method="POST">
        @csrf
      <div class="modal-status bg-danger"></div>
      <div class="modal-body text-center py-4">
        <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v4" /><path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z" /><path d="M12 16h.01" /></svg>
        <h3>DLH Provinsi {{$data->provinsi}} belum terverifikasi</h3>
        <input type="hidden" value="{{$data->id}}">
        <div class="text-secondary">Tindakan ini akan membuat akun DLH dapat terverifikasi dan menggunakan segala fitur sistem.</div>
      </div>
      <div class="modal-footer">
        <div class="w-100">
          <div class="row">
            <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                Cancel
              </a></div>
            <div class="col"><button type="submit" class="btn btn-danger w-100">
                Verifikasi Sekarang
              </button></div>
          </div>
        </div>
      </div>
    </div>
</form>
  </div>
</div>
@endforeach


@include('layouts.footer')
@include('layouts.script')
