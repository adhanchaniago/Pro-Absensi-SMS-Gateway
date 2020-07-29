<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <a href="?p=pages/administrator/index">Administrator</a>
          <span>/</span>
          <span>Tambah Administrator</span>
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
          <div class="card-header text-center">Tambah Data Administrator</div>

          <!--Card content-->
          <div class="card-body">
            <form method="POST">
              <div class="form-group">
                <label for="username">Username</label>
                <input name="username" id="username" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input name="password" id="password" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input name="nama" id="nama" type="text" class="form-control" required>
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
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                <button type="reset" class="btn btn-sm btn-warning">Celar</button>
                <a href="?p=pages/administrator/index" class="btn btn-sm btn-success">Back</a>
              </div>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
              if ($db->saveAdministrator($_POST) > 0) {
                echo "<script>
                location='index.php?p=pages/administrator/index';
                </script>";
              } else {
                echo "<script>
                location='index.php?p=pages/administrator/index';
                </script>";
              };
            }
            ?>
          </div>

        </div>
        <!--/.Card-->


      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->


  </div>
</main>