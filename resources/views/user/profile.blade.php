@include('layouts.header')
@include('user.navbar')

<div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="row g-0">

<div class="col-12 col-md-12 d-flex flex-column">
    <div class="card-body">
      <form action="/updateProfil/{{$getUser->id}}" method="POST" enctype="multipart/form-data">
        @csrf
      <h2 class="mb-4">My Account</h2>
      <h3 class="card-title">Profile Details</h3>
      <div class="row align-items-center">
      <div class="col-auto">
        @if($getUser->foto)
            <span class="avatar avatar-xl" style="background-image: url('{{ asset('storage/uploads/Profil-User/' . $getUser->foto) }}')"></span>
        @else
            <span class="avatar avatar-xl" style="background-image: url('{{ asset('storage/uploads/Profil-User/default.png') }}')"></span>
        @endif
      </div>
        <div class="col-auto"><input name="field_foto" class="form-control" type="file"></div>
      </div>
      <h3 class="card-title mt-4">Business Profile</h3>
      <div class="row g-3">
        <div class="col-md">
          <div class="form-label">Admin Username</div>
          <input type="text" name="field_username" class="form-control" placeholder="{{$getUser->name}}">
        </div>
        <div class="col-md">
          <div class="form-label">Alamat Perusahaan</div>
          <input type="text" name="field_alamat"  class="form-control" placeholder="Jl. Urip Sumoharjo, etc">
        </div>
      </div>
      <h3 class="card-title mt-4">Email</h3>
      <p class="card-subtitle">This contact will be shown to others publicly, so choose it carefully.</p>
      <div>
        <div class="row g-3">
          <div class="col-lg-12">
            <input type="text" name="field_email" class="form-control w-auto" placeholder="{{$getUser->email}}">
          </div>
        </div>
      </div>
      <h3 class="card-title mt-4">Password</h3>
      <p class="card-subtitle">You can set a permanent password if you don't want to use temporary login codes.</p>
      <div>
        <div class="row">
          <div class="col-lg-6">
            <input type="text" class="form-control">
          </div>
          <div class="col-lg-6">
            <input type="text" class="form-control">
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer bg-transparent mt-auto">
      <div class="btn-list justify-content-end">
        <a href="#" class="btn">
          Cancel
        </a>
        <button type="submit" class="btn btn-primary">
          Submit
        </button>
      </div>
    </form>
    </div>
  </div>

</div>
</div>
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var berhasil = "{{ Session::get('berhasil') }}";
        if (berhasil) {
            const alertContainer = document.createElement('div');
            alertContainer.classList.add('position-fixed', 'top-0', 'end-0', 'm-4', 'toast-container');
            alertContainer.innerHTML = `
            <div class="toast">
            <div class="alert alert-success d-flex">
                    <div class="alert-icon me-3">
                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                    </div>
                    <div>${berhasil}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>`;
            document.body.appendChild(alertContainer);

            var toast = new bootstrap.Toast(alertContainer.querySelector('.toast'));
            toast.show();
        }
    });
</script>

@include('layouts.footer')
@include('layouts.script')
