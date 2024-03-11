@include('layouts.header')
@include('DLH.navbar')


<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info" id="hasilKarbonAlert" role="alert" style="display: none;">
                <div class="d-flex">
                  <div>
                    <!-- Download SVG icon from http://tabler-icons.io/i/info-circle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 9h.01" /><path d="M11 12h1v4h1" /></svg>
                  </div>
                  <div id="hasilKarbonText">
                    Karbon yang diserap sebanyak
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row rows-card">
        <div class="col-12">
            <div class="card">
                <form id="carbonCalcForm" method="POST" enctype="multipart/form-data">
              <div class="card-header">
                <h3 class="card-title">Masukkan Data Tanaman Anda</h3>
              </div>
              <div class="card-body">
                    @csrf
                <div class="row row-cards">
                  <div class="mb-3 col-sm-8 col-md-12">
                    <label class="form-label required">Jenis Tanaman</label>
                    <select class="form-select" name="field_jenis" id="jenisTanaman">
                        <i><option value=""> - Pilih Tanaman -</option></i>
                        <option value="Bunga Kupu-kupu">Bunga Kupu-kupu</option>
                        <option value="Bunga Kupu-kupu ungu">Bunga Kupu-kupu ungu</option>
                        <option value="Trengguli">Trengguli</option>
                        <option value="Kayu manis">Kayu manis</option>
                        <option value="Tanjung">Tanjung</option>
                        <option value="Salam">Salam</option>
                        <option value="Melinjo">Melinjo</option>
                        <option value="Bungur">Bungur</option>
                        <option value="Cempaka">Cempaka</option>
                        <option value="Canna">Canna</option>
                        <option value="Soka Jepang">Soka Jepang</option>
                        <option value="Pedang-pedangan">Pedang-pedangan</option>
                        <option value="Lili pita">Lili pita</option>
                        <option value="Sikat botol">Sikat botol</option>
                        <option value="Kamboja merah">Kamboja merah</option>
                        <option value="Kersen">Kersen</option>
                        <option value="Kendal">Kendal</option>
                        <option value="Kesumba">Kesumba</option>
                        <option value="Jambu batu">Jambu batu</option>
                        <option value="Bungur sakura">Bungur sakura</option>
                        <option value="Bunga saputangan">Bunga saputangan</option>
                        <option value="Lengkeng">Lengkeng</option>
                        <option value="Bunga lampion">Bunga lampion</option>
                        <option value="Kenanga">Kenanga</option>
                        <option value="Sawo kecik">Sawo kecik</option>
                        <option value="Akasia mangium">Akasia mangium</option>
                        <option value="Jambu air">Jambu air</option>
                        <option value="Kenari">Kenari</option>
                        <option value="Akalipa merah">Akalipa merah</option>
                        <option value="Nusa Indah merah">Nusa Indah merah</option>
                        <option value="Daun Mangkokan">Daun Mangkokan</option>
                        <option value="Bongenvil merah">Bongenvil merah</option>
                        <option value="Azalea">Azalea</option>
                        <option value="Soka daun besar">Soka daun besar</option>
                        <option value="Bakung">Bakung</option>
                        <option value="Oleander">Oleander</option>
                        <option value="Palem Kuning">Palem Kuning</option>
                        <option value="Sikas">Sikas</option>
                        <option value="Alamanda">Alamanda</option>
                        <option value="Kembang Merak">Kembang Merak</option>
                        <option value="Puring">Puring</option>
                        <option value="Rumput Gajah">Rumput Gajah</option>
                        <option value="Lantana ungu">Lantana ungu</option>
                        <option value="Rumput kawat">Rumput kawat</option>
                        <option value="Mahoni">Mahoni</option>
                        <option value="Jati Putih">Jati Putih</option>
                        <option value="Kayu Hitam">Kayu Hitam</option>
                    </select>
                  </div>
                </div>
                <div class="form-label">Spesifikasi Tanaman</div>
                    <div class="table-responsive">
                  <table class="table mb-0">
                    <thead>
                      <tr>
                        <th>Umur Tanaman</th>
                        <th>Tinggi (cm)</th>
                        <th>Diameter Batang (cm)</th>
                        <th>Warna Daun</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <input id="umurTanaman" name="field_umur" type="number" class="form-control">
                        </td>
                        <td>
                            <input id="tinggiTanaman" name="field_tinggi" type="number" class="form-control" placeholder="tinggi tanaman">
                            {{-- <input name="field_idUser" type="hidden" value="{{$getUser->id}}" class="form-control"> --}}
                        <td>
                            <input id="diameterTanaman" name="field_diameter" type="number" class="form-control" placeholder="diameter batang">
                        </td>
                        <td>
                            <input name="field_warna" type="text" class="form-control" placeholder="hijau, coklat, etc">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer text-end">
                <button type="submit" class="btn btn-success">Simpan Tanaman</button>
              </div>
            </div>
        </div>
    </form>
    </div>
</div>


<script>
    document.getElementById('carbonCalcForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var jenisTanaman = document.getElementById('jenisTanaman').value;
        var tinggiTanaman = parseFloat(document.getElementById('tinggiTanaman').value);
        var diameterTanaman = parseFloat(document.getElementById('diameterTanaman').value);
        var umurTanaman = parseFloat(document.getElementById('umurTanaman').value);


        // kalkulasi perhitungan karbon
        var hasilPerhitungan = hitungPenyerapanKarbon(jenisTanaman, tinggiTanaman, diameterTanaman, umurTanaman);

        document.getElementById('hasilKarbonText').textContent = 'Karbon yang diserap sebanyak ' + hasilPerhitungan.toFixed(2) + ' kg CO2.';
        document.getElementById('hasilKarbonAlert').style.display = 'block';
    });

    function hitungPenyerapanKarbon(jenisTanaman, tinggiTanaman, diameterTanaman, umurTanaman) {

        var AGB; // Biomassa Di Atas Tanah
        var BGB; // Biomassa Bawah Tanah
        var TB; // Total Biomassa
        var TDW; // Total Berat Kering
        var TC; // Total Karbon
        var beratCO2; // Berat CO2

        // Rumus penyerapan karbon pohon
        var faktorDiameter;
        if (diameterTanaman < 11) {
            faktorDiameter = 0.25;
        } else {
            faktorDiameter = 0.15;
        }

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

        // // Poin Credit
        // totalPoin = seraoanTahunan*100

        // Adjust for tree tahun
        var serapanTahunanCO2 = beratCO2 / umurTanaman;

        return serapanTahunanCO2;
    }
</script>


@include('layouts.footer')
@include('layouts.script')
