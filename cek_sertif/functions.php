<?php
// konek ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah_sertif($data) {
    global $conn;

    $nama = htmlspecialchars( $data["nama"] );
    $event = htmlspecialchars( $data["even"] );
    $ket = htmlspecialchars( $data["keterangan"] );
    // upload gambar
    $gambar = upload();
    if ( !$gambar ) {
        return false;
    } 

    $query = "INSERT INTO sertif
                    VALUES 
            ('' ,'$nama', '$ket', '$event', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek jika tidak ada gambar yang diupload
    if ($error=== 4) {
        echo"<script>
            alert('silahkan pilih gambar');
            </script>";
        return false;
    }

    //cek yang boleh diupload hanya gambar
    $extentionValidPicture = ['jpg', 'jpeg', 'png'];
    $extentionPicture = explode('.', $namaFile);
    $extentionPicture = strtolower(end($extentionPicture));
    if( !in_array($extentionPicture, $extentionValidPicture)) {
        echo"<script>
            alert('silahkan upload gambar dengan ekstensi jpg, jpeg, png !');
            </script>";
        return false;
    }

    //cek jika ukuran file terlalu besar
    if( $ukuranFile > 10048576 ) {
        echo"<script>
            alert('ukuran gambar tidak boleh lebih dari 1 MB');
            </script>";
        return false;
    }

    //lolos pengecekan gambar siap diupload
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extentionPicture;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}

function gulati($keywordd) {
    $query = "SELECT * FROM sertif
                WHERE
            nama LIKE '%$keywordd%' ";

    return query($query);
}

