
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('login')}}/style.css">
    <title> Registrasi User | Heejau</title>
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


            <form action="/sendRegisUser" method="POST">

            @csrf

                <div class="input-group mb-4">
                    <input type="text" name="perusahaan" class="form-control form-control-lg bg-light fs-6" placeholder="Instansi Perusahaan">
                </div>
                <div class="input-group mb-4">
                    <input type="text" name="username" class="form-control form-control-lg bg-light fs-6" placeholder="Username">
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
                        @foreach ($getProv as $prov )
                            <option value="{{$prov->provinsi}}">{{$prov->provinsi}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group d-flex justify-content-between mb-2">
                    <div class="form-check">
                        <!-- Elemen form-check jika Anda memerlukannya -->
                    </div>
                </div>

                <div class="input-group d-flex align-items-center justify-content-center mb-3">
                    <button type="submit" class="btn btn-lg btn-success w-50 fs-6 small" style="margin-left: -18px;">Registrasi</button>
                </div>

                <div class="text-center">
                    <small class="text">
                        <span style="font-size: smaller;">Jika Provinsi Perusahaan Anda belum tersedia, segera hubungi Dinas Lingkungan Hidup setempat untuk segera mendaftar akun.</span>
                    </small>
                </div>

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
