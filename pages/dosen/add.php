<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <a href="index.php?p=pages/dosen/index">Data Dosen</a>
          <span>/</span>
          <span>Tambah Data Dosen</span>
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
          <div class="card-header text-center">Tambah Data Dosen</div>

          <!--Card content-->
          <div class="card-body">
            <form method="POST">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nidn">NIDN</label>
                    <input name="nidn" id="nidn" type="number" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="kode">Kode</label>
                    <input name="kode" value="Di Isi Otomatis" readonly id="kode" type="text" class="form-control">
                  </div>
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
                  <div class="form-group">
                    <label for="tgl">Tanggal Lahir</label>
                    <input name="tgl" id="tgl" type="date" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6">
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
                    <label for="pdd">Jenjang Pendidikan</label>
                    <select name="pdd" id="pdd" class="form-control" required>
                      <option value="">Pilih</option>
                      <option value="S2">S2</option>
                      <option value="S3">S3</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="status">Status Dosen</label>
                    <select name="status" id="status" class="form-control" required>
                      <option value="">Pilih</option>
                      <option value="Dosen Tetap">Dosen Tetap</option>
                      <option value="Dosen Tidak Tetap">Dosen Tidak Tetap</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tglMasuk">Tgl Masuk</label>
                    <input name="tglMasuk" id="tglMasuk" type="date" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="email" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="nohp">No HP</label>
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
                <a href="?p=pages/dosen/index" class="btn btn-sm btn-success">Back</a>
              </div>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
              if ($db->saveDosen($_POST) > 0) {
                echo "<script>
                location='index.php?p=pages/dosen/index';
                </script>";
              } else {
                echo "<script>
                location='index.php?p=pages/dosen/index';
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