<!-- halaman ini bisa di akses tanpa login -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>verify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-3 mb-3">
                    <div class="shadow">
                        <div class="card">
                            <div class="card-header">
                                <div class="fs-5 fw-bold text-center">Cari sertifikat</div>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post">
                                    <div class="col-md-12 mb-3">
                                        <input type="text" name="nama" class="form-control" placeholder="Risky Mulya" aria-label="First name">
                                    </div>
                                    <div class="col-md-3 d-grid gap-2">
                                        <button type="submit" name="cari" class="btn btn-primary">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3 mb-3">
                <div class="row">
                    <div class="col-md-12">
                    <?php
                        require 'functions.php';
                        // Proses input nama dan pencarian data
                        if (isset($_POST['cari'])) {
                            $nama = $_POST['nama'];
                            $query = "SELECT * FROM sertif WHERE nama = '$nama' ";
                            $result = mysqli_query($conn, $query);

                            // Tampilkan hasil pencarian
                            if (mysqli_num_rows($result) > 0) {
                                echo "<h2>Hasil Pencarian:</h2>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<b>" . $row['nama'] . "</b> " . $row['keterangan'] . "<b> " . $row['even'] . "</b><br><br> " . '<img src="img/' . $row['gambar'] . '" class="img-fluid">';
                                    ;
                                }
                            } else {
                                echo "Data tidak ditemukan!";
                            }
                        }
                    ?>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>