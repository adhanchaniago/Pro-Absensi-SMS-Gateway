<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <a href="?p=pages/administrator/index">Data Administrator</a>
          <span>/</span>
          <span>Edit Data Administrator</span>
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
          <div class="card-header text-center">Edit Data Administrator</div>

          <!--Card content-->
          <div class="card-body">
            <?php $row = $db->getOneAdministrator($_GET['id']); ?>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
              if ($db->editAdministrator($_POST) > 0) {
                echo "<script>
                location='index.php?p=pages/administrator/index';
                </script>";
              } else {
                echo "<script>
                location='index.php?p=pages/administrator/index';
                </script>";
              }
            }
            ?>
            <form method="POST">
              <div class="form-group">
                <label for="username">Username</label>
                <input value="<?= $row->administrator_id ?>" name="id" type="hidden">
                <input value="<?= $row->administrator_username ?>" name="username" id="username" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input value="<?= $row->administrator_password ?>" name="password" id="password" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input value="<?= $row->administrator_nama ?>" name="nama" id="nama" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <!-- <label for="level">Level</label> -->
                <input type="hidden" name="level" value="0">
                <!-- <select name="level" id="level" class="form-control" required>
                  <option value="">Pilih</option>
                  <option value="0">Administrator</option>
                  <option value="1">Dosen</option>
                  <option value="2">Tata Usaha</option>
                </select> -->
                <script>
                  document.getElementById('level').value = '<?php echo $row->administrator_level ?>';
                </script>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                <button type="reset" class="btn btn-sm btn-warning">Celar</button>
                <a href="?p=pages/administrator/index" class="btn btn-sm btn-success">Back</a>
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