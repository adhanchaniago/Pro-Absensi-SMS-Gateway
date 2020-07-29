<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">
      <?php
      $row = $db->getOneAbsensiDetail($_GET['id']);
      // var_dump($row);
      ?>
      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <a href="?p=pages/absensi/index">Data Absensi</a>
          <span>/</span>
          <span>Edit Data Absensi <span class="text-primary"><?= $row->mahasiswa_npm ?></span></span>
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
            if ($db->editDetailAbsensi($_POST) > 0) {
              echo "<script>
                location='index.php?p=pages/absensi/detail&id=$row->absensi_id';
                </script>";
            } else {
              echo "<script>
                location='index.php?p=pages/absensi/detail&id=$row->absensi_idF';
                </script>";
            }
          }
          ?>
          <!-- Card header -->
          <div class="card-header text-center">Edit Data Absensi <span class="text-primary"><?= $row->mahasiswa_nama ?></div>

          <!--Card content-->
          <div class="card-body">

            <form method="POST">
              <div class="form-group">
                <label for="username">NPM</label>
                <input value="<?= $row->detail_id ?>" name="id" type="hidden">
                <input readonly value="<?= $row->mahasiswa_npm ?>" name="username" id="username" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Nama Mahasiswa</label>
                <input readonly value="<?= $row->mahasiswa_nama ?>" name="password" id="password" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="nama">Jenis Kelamin</label>
                <input readonly value="<?= ($row->mahasiswa_jenis_kelamin == 0) ? "Laki-Laki" : "Perempuan" ?>" name="nama" id="nama" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="nama">Status Ke Hadiran</label>
                <select class="form-control" required name="status" id="status">
                  <option value="">Pilih</option>
                  <option value="0">Hadir</option>
                  <option value="1">Izin</option>
                  <option value="2">Alfa</option>
                </select>
              </div>
              <script>
                document.getElementById('status').value = '<?php echo $row->detail_status ?>';
              </script>
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