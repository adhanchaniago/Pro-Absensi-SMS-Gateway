<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">
      <?php
      $row = $db->getOneAbsensi($_GET['id']);
      // var_dump($row);
      ?>
      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <a href="?p=pages/absensi/index">Data Absensi</a>
          <span>/</span>
          <span>Edit Data Absensi <span class="text-primary"><?= $row->kelas_nama ?></span></span>
        </h4>
      </div>

    </div>
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

      <!--Grid column-->
      <div class="col-md-6 mb-4">

        <!--Card-->
        <div class="card mb-4">

          <?php
          if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($db->editAbsensi($_POST) > 0) {
              echo "<script>
                location='index.php?p=pages/absensi/index';
                </script>";
            } else {
              echo "<script>
                location='index.php?p=pages/absensi/index';
                </script>";
            }
          }
          ?>
          <!-- Card header -->
          <div class="card-header text-center">Edit Data Absensi <span class="text-primary"><?= $row->kelas_nama ?></div>

          <!--Card content-->
          <div class="card-body">

            <form method="POST">
              <div class="form-group">
                <label for="username">Matakuliah</label>
                <input value="<?= $_GET['id'] ?>" name="id" type="hidden">
                <input readonly value="<?= $row->matakuliah_nama ?>" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Nama Kelas</label>
                <input readonly value="<?= $row->kelas_nama ?>" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Nama Matakuliah</label>
                <input readonly value="<?= $row->matakuliah_nama ?>" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="nama">Tanggal</label>
                <input value="<?= $row->absensi_tgl ?>" name="tgl" id="tgl" type="date" class="form-control" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                <button type="reset" class="btn btn-sm btn-warning">Celar</button>
                <a href="?p=pages/absensi/index" class="btn btn-sm btn-success">Back</a>
              </div>
            </form>
          </div>

        </div>
        <!--/.Card-->


      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->


  </div>
</main>