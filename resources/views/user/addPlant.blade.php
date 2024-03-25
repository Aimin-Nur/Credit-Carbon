@include('layouts.header')
@include('user.navbar')

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
                            <input name="field_idUser" type="hidden" value="{{$getUser->id}}" class="form-control">
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

                <div class="row row-cards mt-3">
                    <div class="mb-3 col-sm-8 col-md-9">
                        <label class="form-label required">Foto Tanaman</label>
                        <input name="lokasi" type="hidden" id="lokasi">
                        <div class="webcam" id="webcam-container"></div> <!-- Tambahkan id untuk div webcam -->
                    </div>
                </div>
                <div id="buttons-container">
                    <!-- Tombol "Pilih File" untuk memilih file jpeg -->
                    <button class="btn btn-info" id="choose-file-button" type="button" onclick="document.getElementById('file-input').click()">Pilih File</button>
                    <!-- Tombol "Buka Kamera" untuk membuka frame webcam -->
                    <button class="btn btn-outline-success" id="open-camera-button" type="button" onclick="openCamera()">Buka Kamera</button>
                </div>


                <input class="form-control" name="field_foto" type="file" accept="image/jpeg" onchange="previewImage(event)" id="file-input" style="display: none;">

                <div class="row row-cards mt-3">
                    <div class="mb-3 col-sm-12 col-md-12">
                        <label class="form-label required">Lokasi Tanaman</label>
                        <input type="hidden" id="lokasi" name="field_lokasi">
                        <div id="map"></div>
                    </div>
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

<style>
    .webcam,
    .webcam video{
        position: relative;
        width : 100% !important;
        margin : auto;
        height : auto !important;
        border-radius : 15px;
    }
    .captured-image {
            position: absolute; /* Tambahkan properti position */
            top: 0; /* Geser gambar ke bagian atas frame */
            left: 0; /* Geser gambar ke bagian kiri frame */
            width: 100%; /* Gambarkan gambar dengan lebar penuh frame */
            height: auto; /* Gambarkan gambar dengan tinggi yang sesuai proporsi */
            display: none; /* Mulai dengan menampilkan gambar yang diambil */
        }
    #map {
        height: 350px;
        border-radius: 15px;
        }
</style>

{{-- lokasi --}}
<script>
    // Mengambil koordinat lokasi users (longitude dan latitude)
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

{{-- kamera --}}
<script>
    // Ambil referensi ke elemen div webcam
    const webcamContainer = document.getElementById('webcam-container');
    let stream;
    let videoElement;
    let capturedImageElement;

    // Fungsi untuk menampilkan form input file dan menyembunyikan tombol lainnya
    function showFileInput() {
        document.getElementById('buttons-container').style.display = 'none';
        document.getElementById('file-input').style.display = 'block';
    }

    // Fungsi untuk menampilkan gambar yang dipilih oleh pengguna
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const img = document.createElement('img');
                img.src = event.target.result;
                webcamContainer.innerHTML = ''; // Bersihkan konten sebelumnya
                webcamContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    }

    async function openCamera() {
        try {

            webcamContainer.innerHTML = '';
            stream = await navigator.mediaDevices.getUserMedia({ video: true });
            videoElement = document.createElement('video');


            videoElement.autoplay = true;
            videoElement.width = webcamContainer.clientWidth;
            videoElement.height = webcamContainer.clientHeight;


            videoElement.srcObject = stream;


            await videoElement.play();
            webcamContainer.appendChild(videoElement);


            capturedImageElement = document.createElement('img');
            capturedImageElement.classList.add('captured-image');
            webcamContainer.appendChild(capturedImageElement);


            const captureButton = document.createElement('button');
            captureButton.textContent = 'Ambil Gambar';
            captureButton.onclick = capture;
            webcamContainer.appendChild(captureButton);
        } catch (error) {
            console.error('Error accessing the camera:', error);
        }
    }

    // Fungsi untuk mengambil gambar dari frame kamera dan menampilkannya di bawahnya
    function capture() {
        if (!stream) {
            console.error('No camera stream available.');
            return;
        }

        const canvas = document.createElement('canvas');
        canvas.width = videoElement.videoWidth;
        canvas.height = videoElement.videoHeight;
        const ctx = canvas.getContext('2d');
        ctx.drawImage(videoElement, 0, 0, canvas.width, canvas.height);
        const imgData = canvas.toDataURL('image/jpeg');

        capturedImageElement.src = imgData;
        capturedImageElement.style.display = 'block';
    }
</script>




@include('layouts.footer')
@include('layouts.script')
