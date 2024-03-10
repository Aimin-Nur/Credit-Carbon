<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <title>Kalkulator Karbon</title>
  </head>

  <body class="container bg-light">
    <!-- Start Header form -->
    <div class="text-center pt-5">
      <h2>Perhitungan Penyerapan Karbon Pohon</h2>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore ab vel cum dolor ex enim.
      </p>
    </div>
    <!-- End Header form -->

    <!-- Start Card -->
    <div class="card">
      <!-- Start Card Body -->
      <div class="card-body">
        <!-- Start Form -->
        <form id="carbonCalcForm" action="#" method="post" class="needs-validation" novalidate>
          <!-- Start Input Name -->
          <div class="form-group">
            <label for="inputName">Jenis Tanaman</label>
            <select name="field_jenis" class="form-control" id="jenisTanaman">
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
          <!-- End Input Name -->

          <!-- Start Input Email -->
          <div class="form-group">
            <label for="inputEmail">Tinggi Tanaman</label>
            <input type="number" class="form-control" id="tinggiTanaman" name="field_tinggi" placeholder="100 cm" required />
            <small class="text-muted">satuan sentimeter (cm)</small>
        </div>
          <!-- End Input Email -->

          <div class="form-group">
            <label for="inputEmail">Umur Tanaman</label>
            <input type="number" class="form-control" id="umurTanaman" name="field_umur" placeholder="10 tahun" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
          </div>
          <!-- Start Input Telephone -->
          <div class="form-group">
            <label for="inputPhone">Diameter Tanaman</label>
            <input type="number" class="form-control" id="diameterTanaman" name="field_diameter" placeholder="100 cm" pattern="\d{3}\d{3}\d{4}" required />
            <small class="text-muted">satuan sentimeter (cm)</small>
        </div>
          <!-- End Input Telephone -->
          <!-- Start Submit Button -->
          <button class="btn btn-primary btn-block col-lg-2" type="submit">Submit</button>
          <!-- End Submit Button -->
        </form>
        <!-- End Form -->
      </div>
      <!-- End Card Body -->
    </div>
    <!-- End Card -->
    <footer>
    </footer>

    <script>
        document.getElementById('carbonCalcForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var jenisTanaman = document.getElementById('jenisTanaman').value;
            var tinggiTanaman = parseFloat(document.getElementById('tinggiTanaman').value);
            var diameterTanaman = parseFloat(document.getElementById('diameterTanaman').value);
            var umurTanaman = parseFloat(document.getElementById('umurTanaman').value);

            // kalkulasi perhitungan karbon
            var hasilPerhitungan = hitungPenyerapanKarbon(jenisTanaman, tinggiTanaman, diameterTanaman, umurTanaman);
            alert('Jumlah CO2 yang diserap oleh ' + jenisTanaman + ' adalah: ' + hasilPerhitungan.toFixed(2) + ' kg CO2.');
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


    <!-- Start Scritp for Form -->
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    <!-- End Scritp for Form -->

  </body>

   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>







