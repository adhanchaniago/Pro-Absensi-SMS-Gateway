<?php if (isset($_GET['id'])) : ?>
  <?php $dKelas = $db->getOneKelas($_GET['id']);
  // var_dump($dKelas);
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
            <a href="?p=pages/kelas/index">Kelas</a>
            <span>/</span>
            <span>Tambah Mahasiswa ke Dalam Kelas</span>
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
            <div class="card-header text-center">Data Kelas</div>

            <!--Card content-->
            <div class="card-body">

              <div class="row">
                <div class="col-md-6">
                  <h6>Dosen Pengajar : <?= $dKelas->dosen_nama ?></h6>
                  <h6>Kode Dosen : <?= $dKelas->dosen_kode ?></h6>
                  <h6>No Hp : <?= $dKelas->dosen_nohp ?></h6>
                  <h6>Email : <?= $dKelas->dosen_email ?></h6>
                </div>
                <div class="col-md-6">
                  <h6>Mata Kuliah : <?= $dKelas->matakuliah_nama ?></h6>
                  <h6>SKS : <?= $dKelas->matakuliah_sks ?></h6>
                  <h6>Nama Kelas : <?= $dKelas->kelas_nama ?></h6>
                </div>
              </div>
              <h5>Mahasiswa dalam kelas <span class="text-primary"><?= $dKelas->kelas_nama ?></span></h5>
              <table id="myTable" class="table table-bordered ">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No HP Orang Tua</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $pecahMhs = explode(',', $dKelas->kelas_mahasiswa); ?>
                  <?php foreach ($pecahMhs as $no => $row) :
                    $data = $db->getOneMahasiswa($row);
                  ?>
                    <tr>
                      <td><?= ++$no ?></td>
                      <td><?= $data->mahasiswa_npm ?></td>
                      <td><?= $data->mahasiswa_nama ?></td>
                      <td><?= ($data->mahasiswa_jenis_kelamin == 0) ? "Laki-Laki" : "Perempuan" ?></td>
                      <td><?= $data->mahasiswa_nohp_ortu ?></td>
                      <td width="160px">
                        <a href="?p=pages/mahasiswa/detail&id=<?= $data->mahasiswa_id ?>" class="btn btn-sm btn-success"><span class="fa fa-search"></span></a>
                        <a onclick="return confirm('Anda Yakin Hapus ?')" href="?p=pages/kelas/deleteMhsFromKelas&idMhs=<?= $data->mahasiswa_id ?>&idKelas=<?= $dKelas->kelas_id ?>" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <form method="POST">
                <input type="hidden" name="idKelas" value="<?= $dKelas->kelas_id ?>">
                <h5>List Mahasiswa</h5>
                <table class="table table-bordered">
                  <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tambah</th>
                  </tr>
                  <?php foreach ($db->getAllMahasiswa() as $no => $dMhs) : ?>
                    <tr>
                      <td><?= ++$no ?></td>
                      <td><?= $dMhs->mahasiswa_npm ?></td>
                      <td><?= $dMhs->mahasiswa_nama ?></td>
                      <td><?= ($dMhs->mahasiswa_jenis_kelamin == 0) ? "Laki-Laki" : "Perempuan" ?></td>
                      <td>
                        <input type="checkbox" name="mhs[]" value="<?= $dMhs->mahasiswa_id ?>">
                      </td>
                    </tr>
                  <?php endforeach ?>
                </table>
                <div class="form-group">
                  <button type="submit" class="btn btn-sm btn-primary">Save</button>
                  <button type="reset" class="btn btn-sm btn-warning">Celar</button>
                  <a href="?p=pages/kelas/index" class="btn btn-sm btn-success">Back</a>
                </div>
              </form>
              <?php
              if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if ($db->saveKelas($_POST) > 0) {
                  echo "<script>
                location='index.php?p=pages/kelas/add&id=$dKelas->kelas_id';
                </script>";
                } else {
                  echo "<script>
                location='index.php?p=pages/kelas/add&id=$dKelas->kelas_id';
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
<?php else : ?>
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="index.php">Home</a>
            <span>/</span>
            <a href="?p=pages/kelas/index">Kelas</a>
            <span>/</span>
            <span>Tambah Kelas</span>
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
            <div class="card-header text-center">Data Kelas</div>

            <!--Card content-->
            <div class="card-body">
              <form method="POST">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nama">Nama Kelas</label>
                      <input name="nama" id="nama" type="text" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="matakuliah">Mata Kuliah</label>
                      <select name="matakuliah" id="matakuliah" class="form-control" required>
                        <option value="">Pilih</option>
                        <?php foreach ($db->getAllMatakuliah() as $row) : ?>
                          <option value="<?= $row->matakuliah_id ?>"><?= $row->matakuliah_nama ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                </div>
                <h6>List Mahasiswa</h6>
                <table id="table_id" class="display table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NPM</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Tambah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($db->getAllMahasiswa() as $no => $dMhs) : ?>
                      <tr>
                        <td><?= ++$no ?></td>
                        <td><?= $dMhs->mahasiswa_npm ?></td>
                        <td><?= $dMhs->mahasiswa_nama ?></td>
                        <td><?= ($dMhs->mahasiswa_jenis_kelamin == 0) ? "Laki-Laki" : "Perempuan" ?></td>
                        <td>
                          <input type="checkbox" name="mhs[]" value="<?= $dMhs->mahasiswa_id ?>">
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
                <div class="form-group">
                  <button type="submit" class="btn btn-sm btn-primary">Save</button>
                  <button type="reset" class="btn btn-sm btn-warning">Celar</button>
                  <a href="?p=pages/kelas/index" class="btn btn-sm btn-success">Back</a>
                </div>
              </form>
              <?php
              if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if ($db->saveKelas($_POST) > 0) {
                  echo "<script>
                location='index.php?p=pages/kelas/index';
                </script>";
                } else {
                  echo "<script>
                location='index.php?p=pages/kelas/index';
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
<?php endif; ?>