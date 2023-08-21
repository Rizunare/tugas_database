<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "datamahasiswa");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// tambah data

function tambah($data) {


    global $conn;
    
    $nama = htmlspecialchars($data["nama_siswa"]);
    $nis = htmlspecialchars($data["nis"]);
    $jeniskelamin = htmlspecialchars($data["jenis_kelamin"]);
    $tanggallahir = htmlspecialchars ($data["tanggal_lahir"]);
    $alamat = htmlspecialchars ($data["alamat"]);
    $agama = htmlspecialchars ($data["agama"]);
    $kelasjurusan = htmlspecialchars ($data["kelas_jurusan"]);

    // query insert data
     $query = "INSERT INTO siswaxii
     VALUES
     ('', '$nama','$nis', '$jeniskelamin', '$tanggallahir', '$alamat', '$agama', '$kelasjurusan' )
     ";
mysqli_query($conn, $query);
}

return mysqli_affected_rows($conn);
function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM siswaxii WHERE id = $id");
    return mysqli_affected_rows($conn);
}
// end tambah data

// ubah data

function ubah($data) {
    global $conn;
    $id = $data ["id"];
    $nama = htmlspecialchars($data["nama_siswa"]);
    $nis = htmlspecialchars($data["nis"]);
    $jeniskelamin = htmlspecialchars($data["jenis_kelamin"]);
    $tanggallahir = htmlspecialchars ($data["tanggal_lahir"]);
    $alamat = htmlspecialchars ($data["alamat"]);
    $agama = htmlspecialchars ($data["agama"]);
    $kelasjurusan = htmlspecialchars ($data["kelas_jurusan"]);

     $query = "UPDATE siswaxii SET
        nis = '$nis',
        nama = '$nama',
        jenis_kelamin = '$jeniskelamin',
        tanggal_lahir = '$tanggallahir',
        alamat = '$alamat'
        agama = '$agama'
        kelas_jurusan = '$kelasjurusan'
        WHERE id = $id;
     ";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}
// end ubah data

// cari data (untuk tombol search)

function cari($keyword) {
    $query = "SELECT * FROM siswaxii
                  WHERE
                nama_siswa LIKE '%$keyword%' OR
                nis LIKE '%$keyword%' OR
                tanggal_lahir LIKE '%$keyword%' OR
                kelas_jurusan LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%'
            ";
    return query($query);
}
// end cari data

?>