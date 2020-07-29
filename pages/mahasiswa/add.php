<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <a href="index.php?p=pages/mahasiswa/index">Data Mahasiswa</a>
          <span>/</span>
          <span>Tambah Data Mahasiswa</span>
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
          <div class="card-header text-center">Tambah Data Mahasiswa</div>

          <!--Card content-->
          <div class="card-body">
            <form method="POST">
              <div class="row">
                <div class="col-md-6">
                  <!-- <div class="form-group">
                    <label for="npm">NPM</label>
                    <input name="npm" id="npm" type="number" class="form-control" required>
                  </div> -->
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input name="nama" id="nama" type="text" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="jekel">Jenis Kelamin</label>
                    <select name="jekel" id="jekel" class="form-control" required>
                      <option value="">Pilih</option>
                      <option value="0">Laki-Laki</option>
                      <option value="1">Perempuan</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="tmp">Tempat Lahir</label>
                    <input name="tmp" id="tmp" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="tgl">Tanggal Lahir</label>
                    <input name="tgl" id="tgl" type="date" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="agama">Agama</label>
                    <select name="agama" id="agama" class="form-control" required>
                      <option value="">Pilih</option>
                      <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Buddha">Buddha</option>
                      <option value="Hindu">Hindu</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nohp">No HP Orang Tua</label>
                    <input name="nohp" id="nohp" type="number" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="3"></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                <button type="reset" class="btn btn-sm btn-warning">Celar</button>
                <a href="?p=pages/mahasiswa/index" class="btn btn-sm btn-success">Back</a>
              </div>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
              if ($db->saveMahasiswa($_POST) > 0) {
                echo "<script>
                location='index.php?p=pages/mahasiswa/index';
                </script>";
              } else {
                echo "<script>
                location='index.php?p=pages/mahasiswa/index';
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