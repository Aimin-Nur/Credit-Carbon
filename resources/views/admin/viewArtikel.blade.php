@include('layouts.header')
@include('admin.navbar')

<div class="page-wrapper mb-5">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col text-center">
            <h1 class="page-title text-center">
              {{$getId->kategori}}
            </h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-cards">
          <div class="col-lg-12">
            <div class="card card-lg">
                <div class="card card-header">
                   <i class="me-auto"><span class="fw-bold">Dipublish oleh Admin</span> - {{ \Carbon\Carbon::parse($getId->created_at)->format('F d, Y') }}</i>
                </div>
                <div class="img-responsive img-responsive-21x9 card-img-top"style="background-image: url('{{ asset('storage/uploads/Artikel/' . $getId->gambar) }}')"></div>
              <div class="card-body">
                <div class="markdown">
                    {!! $getId->isi !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>


@include('layouts.footer')
@include('layouts.script')
