<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('login')}}/style.css">
    <title>Login | Heejau</title>
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
            <form action="/LoginAuth" method="POST">
            @csrf
                <div class="header-text mb-4 text-center text-white">
                     <h2>Login</h2>
                </div>
                <?php
                    $gagalLogin = Session::get('warning');
                    if ($gagalLogin) {
                        echo '<div class="alert alert-danger">' . $gagalLogin . '</div>';
                    }
                ?>
                <?php
                    $regis = Session::get('Accepted');
                    if ($regis) {
                        echo '<div class="alert alert-success">' . $regis . '</div>';
                    }
                ?>
                <?php
                $logout = Session::get('logout');
                if ($logout) {
                    echo '<div class="alert alert-info">' . $logout . '</div>';
                }
                ?>
                <div class="input-group mb-4">
                    <input name="name" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Useremail">
                </div>
                <div class="input-group mb-1">
                    <input name="password" type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Kata Sandi">
                </div>
                <div class="input-group mb-3 d-flex justify-content-between">
                    <div class="form-check">
                        <!-- <input type="checkbox" class="form-check-input" id="formCheck">
                        <label for="formCheck" class="form-check-label text-secondary"><small>Ingatkan Saya</small></label> -->
                    </div>
                    <div class="forgot">
                        <small><a href="#" class="text">Lupa Kata Sandi?</a></small>
                    </div>
                </div>

                <div class="input-group d-flex align-items-center justify-content-center">
                    <button type="submit" class="btn btn-lg btn-success w-50 fs-6 small" style="margin-left: -18px;">Masuk</button>
                </div>

            </form>
                <div class="row text-center mt-3 mb-3">
                    <small class="text">Belum Punya Akun?</small>
                </div>


                <div class="row text-center">
                    <div class="col-md-6 mb-2">
                        <a href="/regisDlh" class="btn btn-light fs-6 d-flex mx-auto ms-2">
                            <i class="fa-solid fa-seedling me-2"></i>
                            <span class="d-inline-block text-truncate small" style="color: green; " >Daftar DLH Provinsi</span>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="/regisUser" class="btn btn-primary fs-6 d-flex mx-auto ms-3">
                            <i class="fa-regular fa-building me-2"></i>
                            <span class="d-inline-block text-truncate small">Daftar Perusahaan</span>
                        </a>
                    </div>
                </div>

                    <small class="text-center text mt-3">
                        <span style="font-size: smaller;">Dengan bergabung dengan Discarbon, Anda
                            mengakui bahwa Anda telah membaca dan menyetujui
                    <p>
                        <strong>Syarat Penggunaan</strong> dan <strong>Kebijakan Pribadi</strong>
                    </p>
                </span>
                </small>



          </div>
       </div>


      </div>
    </div>

</body>
</html>
