<?php
require 'functions.php';
$siswaxii = query("SELECT * FROM siswaxii");

// tombol cari ditekan

if( isset($_POST["cari"]) ) {
  $siswaxii = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--css untuk bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
      body{
        width: 100%;
        background: -webkit-linear-gradient(left, #29BC49, #29BCA2);
      }
      .container{
        margin: 0px;
        padding:0;
      }

      nav{
        width: 1362px;
        height: 84px;
        background: -webkit-linear-gradient( bottom,#22223344, #29BC49);
      }

      h1{
        margin:0 0 0 10px;
        font-family: arial;
      }

      .gambar{
        position: absolute;
        left: 1275px;
        margin-bottom: -1px;
        width: 76px;
        
        
      }

      .sidebar{
        position: absolute;
        width: 20%;
        height: 85%;
        float: left;
        background: -webkit-linear-gradient( bottom ,#29BC49, #2FDFBF);
      }
      .sidebar button a{
        color: white;
        text-decoration: none;
        font-family: Times;
      }

      .sidebar ul li a{
        margin-top: 30px;
        text-align: center;
        
      }


      .datasiswa h2{
        position: relative;
        left: 225px;
        top: 20px;
        text-align: center;
        color: black;
        font-family: arial;

      }

      .kolom1{
        width: 80%;
        float: right;
        margin: 20px -160px 0 0;

      }

      .table-reponsive{
        max-height: 400px;
        overflow-y: auto;
        background: -webkit-linear-gradient(left, #29BC49, #29BCA2);
      }

      .table{
        border-color: black;
        background-color: #D9D9D9;

      }

      tr{
        text-align: center;
        max-height: 400px;
        overflow-y: auto;
      }

      .search{
        margin-left: 500px;
      }

      button a{
        color: black;
        text-decoration: none;
      }

      .btn.btn-dark {
        background-color: green; /* Warna latar belakang tombol yang sudah ditekan */
        padding: 7px 80px 7px 80px;
      }

      .btn.btn-dark.beranda{
        padding-right: 87px;
        padding-left: 87px;
      }

      .btn.btn-dark:hover{
        background-color: darkgreen; 
      }

      .btn.btn-dark:active{
        background-color: lime; 
      } 

     .tambah {
        display: inline-block;
        position: absolute;
      }
      .tambah a button{
        color:white;
      }
    </style>
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg">
        <h1>Smk Safi'i Akrom</h1>
        <img class="gambar" src="https://bkk.ponpes-smksa.sch.id/assets/img/logoSmksa.png" alt="">
    </nav>

    <div class="sidebar">
      <ul class="list-group">
        <li class="list-group">
            <a href="beranda.php">
              <button type="button" class="btn btn-dark beranda">
                Beranda
              </button>
            </a>
          
        </li>
        
        <li class="list-group">
            <a href="index.php">
              <button type="button" class="btn btn-dark">
                Data Siswa
              </button>
            </a>
          </li>

        <li class="list-group">
            <a href="#">
              <button type="button" class="btn btn-dark">
                Data Guru
              </button>
            </a>
        </li>
        </ul>
    </div>

    <div class="datasiswa">
      <h2>Data Siswa</h2>
    </div>
    <div class="kolom1">
      <div class="tambah">
      <a href="tambah.php">
        <button class="btn btn-success" >
        Tambah Data Siswa
        </button>
      </a>
      </div>

      <div class="search">
        <div class="input-group mb-3">
          <form action="" method="post">
            <input type="text" name="keyword" size="40"autofocus 
            placeholder="masukkan keyword pencarian.." autocomplete="off">
            <button type="submit" class="btn btn-success" name="cari">Cari!</button>
          </form>    
          <br>
        </div>
      </div>

      <div class="table-reponsive">
        <div class="table">
          <table class="table table-bordered">
            <tr>
             <th>No.</th>
              <th>Aksi</th>
              <th>Nama</th>
              <th>Nis</th>
              <th>Jenis Kelamin</th>
              <th>Tanggal Lahir</th>
              <th>Alamat</th>
              <th>Agama</th>
             <th>Kelas Jurusan</th>
            </tr>

            <?php $i= 1;?>
            <?php foreach( $siswaxii as $row):?>
              <tr>
                <td><?= $i; ?></td>
                
                <div class="aksi">
                  <td>
                    <button type="button" class="btn btn-warning"><a href="ubah.php?id=<?= $row["id"];?>" class="text-decoration-none">ubah</a></button>
                    <button type="button" class="btn btn-danger"><a href="hapus.php?id=<?= $row["id"];?>" class="text-decoration-none" onclick="return confirm('yakin?');">Hapus</a></button>
                  </td>
                </div>
           
                <td><?= $row["nama_siswa"]; ?></td>
                <td><?= $row["nis"]; ?></td>
                <td><?= $row["jenis_kelamin"]; ?></td>
                <td><?= $row["tanggal_lahir"]; ?></td>
                <td><?= $row["alamat"]; ?></td>
                <td><?= $row["agama"]; ?></td>
                <td><?= $row["kelas_jurusan"]; ?></td>

              </tr>
             <?php $i++; ?>
              <?php endforeach; ?>
         </table>
        </div>
      </div>
      </div>
    </div>

    <!--javascript untuk bootstrap-->
    <script src="js/bootstrap.js"></script>

    <!--popper dalam javascript-->
    <script src="js/popper.min.js"></script>
</body>
</html>