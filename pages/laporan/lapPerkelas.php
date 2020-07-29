<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <span>Laporan Absensi</span>
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
          <div class="card-header text-center">Data Laporan Absensi</div>

          <!--Card content-->
          <div class="card-body">
            <?php
            $dAbsensi = $db->getOneAbsensi($_GET['id']);
            // var_dump($dAbsensi);

            ?>
            <a href="pages/laporan/cetakLapKelas.php?id=<?= $_GET['id'] ?>" target="_blank" class="btn btn-sm btn-primary"> <span class="fa fa-print"></span> Cetak</a>
            <div class="row">

              <div class="col-md-6">
                <h6>Dosen Pengajar : <?= $dAbsensi->dosen_nama ?></h6>
                <h6>Kode Dosen : <?= $dAbsensi->dosen_kode ?></h6>
                <h6>No Hp : <?= $dAbsensi->dosen_nohp ?></h6>
                <h6>Email : <?= $dAbsensi->dosen_email ?></h6>
              </div>
              <div class="col-md-6">
                <h6>Mata Kuliah : <?= $dAbsensi->matakuliah_nama ?></h6>
                <h6>SKS : <?= $dAbsensi->matakuliah_sks ?></h6>
                <h6>Nama Kelas : <?= $dAbsensi->kelas_nama ?></h6>
                <h6>Tanggal : <?= tgl_indo($dAbsensi->absensi_tgl) ?></h6>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <h5><u>Mahasiswa</u></h5>
              </div>
              <div class="col-md-6">

              </div>
            </div>
            <table class=" table table-bordered">
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
        <!--/.Card-->


      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->


  </div>
</main>