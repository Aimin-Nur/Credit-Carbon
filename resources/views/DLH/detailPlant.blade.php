@include('layouts.header')
@include('DLH.navbar')

<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              Detail Plant
            </h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="card">
            <div class="ribbon bg-red">Menunggu Verifikasi</div>
          <div class="card-header">
            <h3 class="card-title">Plant info</h3>
          </div>
          <div class="card-body">
            <div class="datagrid">
              <div class="datagrid-item">
                <div class="datagrid-title">Jenis Tanaman</div>
                {{-- @foreach ($getDetailPlant as )

                @endforeach --}}
                <div class="datagrid-content">{{$getDetailPlant->jenis}}</div>


              </div>
              <div class="datagrid-item">
                <div class="datagrid-title">Tinggi Batang</div>
                <div class="datagrid-content">{{$getDetailPlant->tinggi}} cm</div>
              </div>
              <div class="datagrid-item">
                <div class="datagrid-title">Diameter Batang</div>
                <div class="datagrid-content">{{$getDetailPlant->diameter}} cm</div>
              </div>
              <div class="datagrid-item">
                <div class="datagrid-title">Warna Daun</div>
                <div class="datagrid-content">{{$getDetailPlant->warna_daun}}</div>
              </div>
              <div class="datagrid-item">
                <div class="datagrid-title">Perusahaan</div>
                <div class="datagrid-content">
                  <div class="d-flex align-items-center">
                    @if($getDetailPlant->users->foto)
                        <span class="avatar avatar-sm me-2" style="background-image: url('{{ asset('storage/uploads/Profil-User/' . $getDetailPlant->users->foto) }}')"></span>
                    @else
                        <span class="avatar avatar-sm me-2" style="background-image: url('{{ asset('storage/uploads/Profil-User/default.png') }}')"></span>
                    @endif
                    {{$getDetailPlant->users->perusahaan}}
                  </div>
                </div>
              </div>
              <div class="datagrid-item">
                <div class="datagrid-title">Umur Tanaman</div>
                <div class="datagrid-content">{{$getDetailPlant->umur}} Tahun</div>
              </div>
              <div class="datagrid-item">
                <div class="datagrid-title">Status</div>
                <div class="datagrid-content">
                    @if ($getDetailPlant->status == 1)
                        <span class="status status-green">
                            Terverifikasi
                        </span>
                        <input type="hidden" id="lokasi">
                    @else
                    <span class="status status-danger">
                        Belum Terverifikasi
                      </span>
                    @endif
                </div>
              </div>

              <div class="datagrid-item">
                <div class="datagrid-title">Foto Tanaman</div>
                <div class="datagrid-content">
                  <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                  Checked
                </div>
              </div>
                <div class="row row-cards mt-3">
                    <div class="mb-3 col-sm-12 col-lg-12">
                        <label class="form-label required">Lokasi Tanaman</label>
                        <input type="hidden" id="lokasi" name="field_lokasi">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-12">
            <div class="card card-sm">
                <div class="card-status-top bg-danger"></div>
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <h2 class="h3">Tanaman Belum Diverifikasi</h2>
                    <p class="m-0 text-secondary">Pastikan Anda melakukan verifikasi tanaman user sesuia dengan ketentuan regulasi yang berlaku.</p>
                  </div>
                  <div class="col-auto">
                    <a href="#" class="btn" id="bookDemoBtn" data-bs-toggle="modal" data-bs-target="#modal-danger">
                      Verifikasi Tanaman
                    </a>
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>



    <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-warning"></div>
          <div class="modal-body text-center py-4">
            <form id="carbonCalcForm" action="/hitungCarbonTanaman" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v4" /><path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z" /><path d="M12 16h.01" /></svg>
            <h3>Are you sure?</h3>
            <input type="hidden" name="field_id" value="{{$getDetailPlant->idPlant}}" /readonly>
            <input type="hidden" name="field_idUser" value="{{$getDetailPlant->users->id}}" /readonly>
            <input type="hidden" name="tinggi" value="{{$getDetailPlant->tinggi}}" /readonly>
            <input type="hidden" name="diameter" value="{{$getDetailPlant->diameter}}" /readonly>
            <input type="hidden" name="usia" value="{{$getDetailPlant->umur}}" /readonly>
            <input type="hidden" name="hasilPerhitungan" id="totalCarbon" readonly>
            <div class="text-secondary">Tindakan ini akan membuat tanaman terverifikasi dan secara otomatis menghitung jumlah karbon yang telah diserap oleh tanaman</div>
          </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                    Cancel
                  </a></div>
                <div class="col"><button type="submit" href="#" class="btn btn-warning w-100">
                    Verifikasi Sekarang
                  </button></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    </div>


    <style>
        #map {
        height: 350px;
        border-radius: 15px;
        }
    </style>

    <script>
        var lokasi = document.getElementById('lokasi');
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(successCallback, errorsCallback);
        }

        function successCallback(position){
            lokasi.value = position.coords.latitude+","+position.coords.longitude;
            var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 13);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
            var circle = L.circle([-5.183721, 119.422279], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 50
            }).addTo(map);

        }

        function errorsCallback(){
        }
    </script>

<script>
    // Fungsi untuk menghitung penyerapan karbon
    function hitungPenyerapanKarbon(jenisTanaman, tinggiTanaman, diameterTanaman, umurTanaman) {
        var AGB, BGB, TB, TDW, TC, beratCO2;

        // Rumus penyerapan karbon pohon
        var faktorDiameter = diameterTanaman < 11 ? 0.25 : 0.15;

        // Calculate Biomassa Di Atas Tanah (AGB)
        AGB = faktorDiameter * Math.pow(diameterTanaman, 2) * tinggiTanaman;

        // Calculate Biomassa Bawah Tanah (BGB)
        BGB = 0.2 * AGB;

        // Calculate Total Biomassa (TB)
        TB = AGB + BGB;

        // Calculate Total Berat Kering (TDW)
        TDW = TB * 0.725;

        // Calculate Total Karbon (TC)
        TC = TDW * 0.5;

        // Calculate Berat CO2
        beratCO2 = TC * 3.67;

        // Adjust for tree tahun
        var serapanTahunanCO2 = beratCO2 / umurTanaman;

        return serapanTahunanCO2;
    }

    // Event listener untuk menangani submit formulir
    document.getElementById('bookDemoBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah default action dari link

        // Lakukan perhitungan karbon
        var jenisTanaman = "{{$getDetailPlant->jenis}}";
        var tinggiTanaman = parseFloat("{{$getDetailPlant->tinggi}}");
        var diameterTanaman = parseFloat("{{$getDetailPlant->diameter}}");
        var umurTanaman = parseFloat("{{$getDetailPlant->umur}}");

        // kalkulasi perhitungan karbon
        var hasilPerhitungan = hitungPenyerapanKarbon(jenisTanaman, tinggiTanaman, diameterTanaman, umurTanaman);

        // Menetapkan hasil perhitungan ke input totalCarbon
        document.getElementById('totalCarbon').value = hasilPerhitungan.toFixed(2);
    });

</script>




@include('layouts.footer')
@include('layouts.script')
