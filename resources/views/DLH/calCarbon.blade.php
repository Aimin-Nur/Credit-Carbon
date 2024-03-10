@include('layouts.header')
@include('DLH.navbar')

<div class="container mt-4">
    <div class="row rows-card">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Masukkan Data Tanaman Anda</h3>
              </div>
              <div class="card-body">
                <form action="/addPlantbyUser" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row row-cards">
                  <div class="mb-3 col-sm-8 col-md-9">
                    <label class="form-label required">Jenis Tanaman</label>
                    <select class="form-select" name="field_jenis">
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
                          <input name="field_umur" type="number" class="form-control">
                        </td>
                        <td>
                            <input name="field_tinggi" type="number" class="form-control" placeholder="tinggi tanaman">
                            {{-- <input name="field_idUser" type="hidden" value="{{$getUser->id}}" class="form-control"> --}}
                        <td>
                            <input name="field_diameter" type="number" class="form-control" placeholder="diameter batang">
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



@include('layouts.footer')
@include('layouts.script')
