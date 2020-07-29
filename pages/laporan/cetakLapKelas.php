<?php
include('Db.php');
$db = new Db();

?>
<!DOCTYPE html>
<html lang="en">

<head>
     <title>SMS Gateway Presensi AMIK</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta http-equiv="x-ua-compatible" content="ie=edge">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
     <!-- Bootstrap core CSS -->
     <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
     <!-- Material Design Bootstrap -->
     <link href="../../assets/css/mdb.min.css" rel="stylesheet">
     <!-- Your custom styles (optional) -->
     <link href="../../assets/css/style.min.css" rel="stylesheet">
     <style>
          .map-container {
               overflow: hidden;
               padding-bottom: 56.25%;
               position: relative;
               height: 0;
          }

          .map-container iframe {
               left: 0;
               top: 0;
               height: 100%;
               width: 100%;
               position: absolute;
          }
     </style>
</head>

<body onload="print()">
     <script src="../../assets/jquery.min.js"></script>

     <div class="container mt-5">
          <div class="row">
               <div class="col-md-4">
                    <center>
                         <img src="../../assets/img/logo.jpg" style="width: 200px; height: 150px;">
                    </center>
               </div>
               <div class="col-md-8">
                    <h2>AMIK DAPARNAS</h2>
                    <h5>Sistem Informasi Presensi Dan SMS Gateway</h5>
                    <h6>
                         Alamat: Jl. Patimura No.1c, Kp. Jao, Kec. Padang Bar., Kota Padang, Sumatera Barat 25116 <br>
                         Website: https://amikdaparnas-lp3i.ac.id <br>
                         No Tlp.: (0627) 5137388
                    </h6>
               </div>
          </div>
          <hr>
          <div id="isi" class="mt-5">
               <center>
                    <h4>Daftar Hadir Mahasiswa</h4>
               </center>
               <div class="row mt-5">
                    <?php
                    $dAbsensi = $db->getOneAbsensi($_GET['id']);
                    $_GET['id']
                    ?>
                    <div class="col-md-4">
                         <h6>Dosen Pengajar : <?= $dAbsensi->dosen_nama ?></h6>
                         <h6>Kode Dosen : <?= $dAbsensi->dosen_kode ?></h6>
                         <h6>No Hp : <?= $dAbsensi->dosen_nohp ?></h6>
                         <h6>Email : <?= $dAbsensi->dosen_email ?></h6>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                         <h6>Mata Kuliah : <?= $dAbsensi->matakuliah_nama ?></h6>
                         <h6>SKS : <?= $dAbsensi->matakuliah_sks ?></h6>
                         <h6>Nama Kelas : <?= $dAbsensi->kelas_nama ?></h6>
                         <h6>Tanggal : <?= tgl_indo($dAbsensi->absensi_tgl) ?></h6>
                    </div>
               </div>
               <div class="row mt-3">
                    <div class="col-md-6">
                         <h5><u>Mahasiswa</u></h5>
                    </div>
                    <div class="col-md-6">

                    </div>
               </div>
               <table class="mt-3 table table-bordered">
                    <thead>
                         <tr>
                              <th>No</th>
                              <th>NPM</th>
                              <th>Nama</th>
                              <th>Jenis Kelamin</th>
                              <th>No HP Ortu</th>
                              <th>Status</th>
                              <th>Ket</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                         $dMhs = explode(',', $dAbsensi->kelas_mahasiswa);
                         foreach ($dMhs as $no => $row) :
                              $Mhs = $db->getOneDetail($_GET['id'], $row);
                              // var_dump($Mhs);
                         ?>
                              <tr>
                                   <td><?= ++$no ?></td>
                                   <td><?= $Mhs->mahasiswa_npm ?></td>
                                   <td><?= $Mhs->mahasiswa_nama ?></td>
                                   <td><?= ($Mhs->mahasiswa_jenis_kelamin == 0) ? "Laki-Laki" : "Perempuan" ?></td>
                                   <td><?= $Mhs->mahasiswa_nohp_ortu ?></td>
                                   <td><?= ($Mhs->detail_status == 0) ? "Hadir" : ($Mhs->detail_status == 1 ? "Izin" : "Alfa") ?></td>
                                   <td><?= $Mhs->detail_ket ?></td>
                              </tr>
                         <?php endforeach; ?>
                    </tbody>
               </table>
          </div>
     </div>

     <!-- SCRIPTS -->
     <?php include('../../components/scripts.php'); ?>
</body>

</html>