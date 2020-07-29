<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <a href="?p=pages/dosen/index">Data Dosen</a>
          <span>/</span>
          <span>Edit Data Dosen</span>
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
          <div class="card-header text-center">Edit Data Dosen</div>

          <!--Card content-->
          <div class="card-body">
            <?php $row = $db->getOneDosen($_GET['id']); ?>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
              if ($db->editDosen($_POST) > 0) {
                echo "<script>
                location='index.php?p=pages/dosen/index';
                </script>";
              } else {
                echo "<script>
                location='index.php?p=pages/dosen/index';
                </script>";
              }
            }
            ?>
            <form method="POST">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nidn">NIDN</label>
                    <input value="<?= $row->dosen_id ?>" name="id" type="hidden">
                    <input value="<?= $row->dosen_nidn ?>" name="nidn" id="nidn" type="number" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="kode">Kode</label>
                    <input value="<?= $row->dosen_kode ?>" name="kode" value="Di Isi Otomatis" readonly id="kode" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input value="<?= $row->dosen_nama ?>" name="nama" id="nama" type="text" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="jekel">Jenis Kelamin</label>
                    <select name="jekel" id="jekel" class="form-control" required>
                      <option value="">Pilih</option>
                      <option value="0">Laki-Laki</option>
                      <option value="1">Perempuan</option>
                    </select>
                    <script>
                      document.getElementById('jekel').value = <?= $row->dosen_jenis_kelamin ?>
                    </script>
                  </div>
                  <?php $pecah = explode('/', $row->dosen_tmp_tgl_lahir); ?>
                  <div class="form-group">
                    <label for="tmp">Tempat Lahir</label>
                    <input value="<?= $pecah[0] ?>" name="tmp" id="tmp" type="text" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="tgl">Tanggal Lahir</label>
                    <input value="<?= $pecah[1] ?>" name="tgl" id="tgl" type="date" class="form-control" required>
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
                    <input value="<?= $row->dosen_tgl_masuk ?>" name="tglMasuk" id="tglMasuk" type="date" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input value="<?= $row->dosen_email ?>" name="email" id="email" type="email" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input value="<?= $row->dosen_nohp ?>" name="nohp" id="nohp" type="number" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="3"><?= $row->dosen_alamat ?></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                <button type="reset" class="btn btn-sm btn-warning">Celar</button>
                <a href="?p=pages/dosen/index" class="btn btn-sm btn-success">Back</a>
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