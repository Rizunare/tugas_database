<?php
require 'functions.php';

// ambil data di URL
$id = $_GET["id"];
// var_dump($id);

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM siswaxii WHERE id = $id") ["0"];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
 
    // cek apakah data berhasil diubah atau tidak
    if(ubah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubah!');
            document.location.href = 'index.php'; 
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diubah!');
            document.location.href = 'index.php'; 
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        body{
            width: 100%;
            background: -webkit-linear-gradient(left, #29BC49, #29BCA2);
        }

        .container{
            width:450px;
            height:520px;
            margin-top: 40px;
            background-color: #FFFFFF;
        }

        form > *  {
            position: relative;
        }

        img{ 
            position: absolute;
            width: 380px;
            margin-left: 20px;
            margin-top: 60px;
        }

        h2{
            color:black;
            text-align: center;
            padding-bottom:20px;
        }

        .row.g-3{
            margin-right:20px;
        }

        .col-10 input{
            background-color: white;
        }

        .col-10 input:hover{
            background-color: transparent;
        }

        .col-10{
            width: 400px;
        }

        .button{
            margin:45px 0 0 185px;
        }

        .btn.btn-success{
            background-color: #2CCE1E;
            color: black;
        }

        .btn.btn-success:hover{
            background-color: darkgreen;
        }

        .btn.btn-info a{
            text-decoration:none;
            color: black;
        }

        .btn.btn-info:hover{
            background-color: cyan;
        }

    </style>
</head>
<body>
    <div class="container">
    <img src="https://i.ibb.co/5Mhd8Tp/lgsmk-8.png" alt="lgsmk-8" border="0">
        <h2>Ubah Data Mahasiswa</h2>
        <form action="" method="post">

            <ul>
                <div class="row g-3">
                    <div class="col-10" for="nama_siswa">
                        <input type="text" name="nama_siswa" id="nama_siswa"class="form-control" value="<?= $mhs["nama_siswa"];?>" required>
                    </div>
                    <div class="col-10" for="nis">
                        <input type="text" name="nis" id="nis"class="form-control" value="<?= $mhs["nis"];?>"aria-label="nis" required>
                    </div>
                    <div class="col-10" for="jenis_kelamin">
                        <input type="text" name="jenis_kelamin" id="nis"class="form-control" value="<?= $mhs["jenis_kelamin"];?>" aria-label="jenis_kelamin" required>
                    </div>
                    <div class="col-10" for="tanggal_lahir">
                        <input type="text" name="tanggal_lahir" id="tanggal_lahir"class="form-control" value="<?= $mhs["tanggal_lahir"];?>" aria-label="tanggal_lahir" required>
                    </div>
                    <div class="col-10" for="alamat">
                        <input type="text" name="alamat" id="alamat"class="form-control" value="<?= $mhs["alamat"];?>" aria-label="alamat">
                    </div>
                    <div class="col-10" for="agama">
                        <input type="text" name="agama" id="agama"class="form-control" value="<?= $mhs["agama"];?>" aria-label="agama" required>
                    </div>
                    <div class="col-10" for="kelas_jurusan">
                        <input type="text" name="kelas_jurusan" id="kelas_jurusan"class="form-control" value="<?= $mhs["kelas_jurusan"];?>" aria-label="kelas_jurusan" required>
                    </div>
                </div>
                <div class="button">
                    <button type="submit" name="submit" class="btn btn-info"><a href="index.php">Kembali</a>
                </button>
                    <button type="submit" name="submit" class="btn btn-success">Tambah Data</button>
                </div>
            </ul>
        </form>
    </div>
    <!--javascript untuk bootstrap-->
    <script src="js/bootstrap.js"></script>

    <!--popper dalam javascript-->
    <script src="js/popper.min.js"></script>
</body>
</html>