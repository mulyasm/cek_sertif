<?php
// halaman ini bisa diakses harus dengan login

// session_start();

// if ( !isset($_SESSION["login"])) {
//     header("Location: login.php");
//     exit;
// }

require 'functions.php';

// cek apakah tombol submit tambah data sudah ditekan atau belum
if (isset($_POST['submit'])) {

    //cek data berhasil ditambah atau belum
    if(tambah_sertif($_POST) > 0) {
        echo "<script>
            alert('berhasil');
            document.location.href = 'verify.php';
            </script>";
    } else {
        echo "gagal!";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sertifikat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <style>
    .jarak{
        height: 25vh;
    }
  </style>
  <body>
    <section>
        <div class="container">
            <span class="row jarak">.</span>
            <div class="row">
                <span class="col-md-3"></span>
                <div class="col-md-6 mt-3 mb-3">
                    <div class="shadow">
                        <div class="card">
                            <div class="card-header">
                                <div class="fs-5 fw-bold text-center">Tambah sertifikat</div>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="">
                                    <div class="col-md-12 mb-3">
                                        <input type="text" name="nama" class="form-control" placeholder="nama..." aria-label="First name">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <input type="text" name="keterangan" class="form-control" placeholder="keterangan: berpartisipasi dalam event" aria-label="First name">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <input type="text" name="even" class="form-control" placeholder="nama event..." aria-label="First name">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="gambar">sertifikat: </label>
                                        <input type="file" name="gambar" id="gambar">
                                    </div>
                                    <div class="col-md-3 d-grid gap-2 mt-3">
                                        <button type="submit" name="submit" class="btn btn-primary">Tambahkan!</button>
                                    </div>
                                </form>
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="col-md-3"></span>
            </div>
            <span class="row jarak">.</span>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>