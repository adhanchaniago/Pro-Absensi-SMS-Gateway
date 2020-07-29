<?php
$dMhs = $db->getOneMahasiswa($_GET['id']);
// var_dump($dMhs);
?>
<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <a href="?p=pages/mahasiswa/index">Mahasiswa</a>
          <span>/</span>
          <span>Detail Mahasiswa <?= $dMhs->mahasiswa_npm ?></span>
        </h4>
      </div>

    </div>
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

      <!--Grid column-->
      <div class="col-md-12 mb-4">

        <!--Card-->
        <div class="card mb-4">

          <!-- Card header -->
          <div class="card-header text-center">Detail Data Mahasiswa <?= $dMhs->mahasiswa_npm ?></div>

          <!--Card content-->
          <div class="card-body">
            <a href="?p=pages/mahasiswa/add" class="btn btn-sm btn-primary">Tambah Data</a>
            <a href="?p=pages/mahasiswa/edit&id=<?= $dMhs->mahasiswa_id ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="?p=pages/mahasiswa/index" class="btn btn-sm btn-success">Kembali</a>
            <div class="row mt-3">
              <div class="col-md-6">
                <h6>NPM : <?= $dMhs->mahasiswa_npm ?></h6>
                <h6>Nama : <?= $dMhs->mahasiswa_nama ?></h6>
                <h6>Jenis Kelamin : <?= ($dMhs->mahasiswa_jenis_kelamin == "0") ? "Laki-laki" : "Perempuan" ?></h6>
                <h6>No HP Orang tua : <?= $dMhs->mahasiswa_nohp_ortu ?></h6>
              </div>
              <div class="col-md-6">
                <h6>Alamat : <?= $dMhs->mahasiswa_alamat ?></h6>
                <h6>Tmp/Tgl Lahir : <?= $dMhs->mahasiswa_tmp_tgl_lahir ?></h6>
                <h6>Agama : <?= $dMhs->mahasiswa_alamat ?></h6>
              </div>
            </div>
          </div>

        </div>
        <!--/.Card-->


      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->


  </div>
</main>