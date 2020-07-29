<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <a href="?p=pages/matakuliah/index">Data Matakuliah</a>
          <span>/</span>
          <span>Edit Data Matakuliah</span>
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

          <!-- Card header -->
          <div class="card-header text-center">Edit Data Matakuliah</div>

          <!--Card content-->
          <div class="card-body">
            <?php $row = $db->getOneMatakuliah($_GET['id']); ?>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
              if ($db->editMatakuliah($_POST) > 0) {
                echo "<script>
                location='index.php?p=pages/matakuliah/index';
                </script>";
              } else {
                echo "<script>
                location='index.php?p=pages/matakuliah/index';
                </script>";
              }
            }
            ?>
            <form method="POST">
              <div class="form-group">
                <label for="username">Dosen Pengajar</label>
                <select name="dosen" id="dosen" class="form-control" required>
                  <option value="">Pilih</option>
                  <?php foreach ($db->getAllDosen() as $dosen) : ?>
                    <option value="<?= $dosen->dosen_id ?>"><?= $dosen->dosen_nama ?></option>
                  <?php endforeach ?>
                  <script>
                    document.getElementById('dosen').value = <?= $row->dosen_id ?>
                  </script>
                </select>
              </div>
              <div class="form-group">
                <label for="nama">Nama Matakuliah</label>
                <input value="<?= $row->matakuliah_id ?>" name="id" id="id" type="hidden">
                <input value="<?= $row->matakuliah_nama ?>" name="nama" id="nama" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="sks">SKS</label>
                <input value="<?= $row->matakuliah_sks ?>" name="sks" id="sks" type="number" class="form-control" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                <button type="reset" class="btn btn-sm btn-warning">Celar</button>
                <a href="?p=pages/matakuliah/index" class="btn btn-sm btn-success">Back</a>
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