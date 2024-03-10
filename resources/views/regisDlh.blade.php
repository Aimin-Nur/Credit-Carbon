
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('login')}}/style.css">
    <title> Registrasi | Heejau</title>
</head>
<body>


    <!----------------------- Main Container -------------------------->

    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">

        <!-- Teks Hijau di Atas Box Area -->
        <div class="text-center mb-2 textHeejau">
            <h2>Heejau</h2>
        </div>



    <!----------------------- Login Container -------------------------->

       <div class="rounded-3 p-2 shadow box-area ">


       <div class="right-box">
          <div class="row align-items-center">
                <div class="header-text mb-3 text-center text-white">
                     <h2>Sing In</h2>
                </div>

                <div class="row text-center mt-2 mb-2">
                    <small class="text"> Silahkan Isi Informasi Akun Anda </small>
                </div>


            <form action="/sendRegisDlh" method="POST">

            @csrf

                <div class="input-group mb-4">
                    <input type="text" name="username" class="form-control form-control-lg bg-light fs-6" placeholder="Dinas Lingkungan Hidup">
                </div>
                <div class="input-group mb-4">
                    <input type="Email" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email">
                </div>
                <div class="input-group mb-4">
                    <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Kata Sandi">
                </div>
                <div class="input-group mb-2">
                    <select name="provinsi" class="form-control">
                        <option value="">Pilih Provinsi</option>
                        <option value="Aceh">Aceh</option>
                        <option value="Sumatera Utara">Sumatera Utara</option>
                        <option value="Sumatera Barat">Sumatera Barat</option>
                        <option value="Riau">Riau</option>
                        <option value="Kepulauan Riau">Kepulauan Riau</option>
                        <option value="Jambi">Jambi</option>
                        <option value="Bengkulu">Bengkulu</option>
                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                        <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                        <option value="Lampung">Lampung</option>
                        <option value="DKI Jakarta">DKI Jakarta</option>
                        <option value="Banten">Banten</option>
                        <option value="Jawa Barat">Jawa Barat</option>
                        <option value="Jawa Tengah">Jawa Tengah</option>
                        <option value="DI Yogyakarta">DI Yogyakarta</option>
                        <option value="Jawa Timur">Jawa Timur</option>
                        <option value="Bali">Bali</option>
                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                        <option value="Gorontalo">Gorontalo</option>
                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                        <option value="Sulawesi Barat">Sulawesi Barat</option>
                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                        <option value="Maluku">Maluku</option>
                        <option value="Maluku Utara">Maluku Utara</option>
                        <option value="Papua Barat">Papua Barat</option>
                        <option value="Papua">Papua</option>
                    </select>
                </div>

                <div class="input-group d-flex justify-content-between mb-3">
                    <div class="form-check">
                        <!-- Elemen form-check jika Anda memerlukannya -->
                    </div>
                </div>

                <div class="input-group mb-1 d-flex align-items-center justify-content-center mb-5">
                    <button type="submit" class="btn btn-lg btn-success w-50 fs-6 small" style="margin-left: -18px;">Registrasi</button>
                </div>

                <div class="row text-center mt-1 ">
                    <small class="text">Tidak ada akun ?<a href="#" class="textDaftar"> Masuk </a></small>
                </div>

                <small class="text-center text mt-3">
                        <span style="font-size: smaller;">Dengan bergabung dengan Discarbon, Anda
                            mengakui bahwa Anda telah membaca dan menyetujui
                    <p>
                        <strong>Syarat Penggunaan</strong> dan <strong>Kebijakan Pribadi</strong>
                    </p>
                </span>
                </small>
            </form>

          </div>
       </div>


      </div>
    </div>

    <script>
        function searchProvinsi() {
            var input, filter, select, option, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            select = document.getElementById("provinsiDropdown");
            option = select.getElementsByTagName("option");
            for (var i = 0; i < option.length; i++) {
                txtValue = option[i].textContent || option[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    option[i].style.display = "";
                } else {
                    option[i].style.display = "none";
                }
            }
        }
        </script>

</body>
</html>
