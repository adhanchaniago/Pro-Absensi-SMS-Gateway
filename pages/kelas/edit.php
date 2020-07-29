<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <a href="?p=pages/kelas/index">Data kelas</a>
          <span>/</span>
          <span>Edit Data kelas</span>
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
          <div class="card-header text-center">Edit Data Kelas</div>

          <!--Card content-->
          <div class="card-body">
            <?php $row = $db->getOnekelas($_GET['id']); ?>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
              if ($db->editKelas($_POST) > 0) {
                echo "<script>
                location='index.php?p=pages/kelas/index';
                </script>";
              } else {
                echo "<script>
                location='index.php?p=pages/kelas/index';
                </script>";
              }
            }
            ?>
            <?php $dKelas = $db->getOneKelas($_GET['id']);
            // var_dump($dKelas);
            ?>
            <form method="POST">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nama">Nama Kelas</label>
                    <input value="<?= $dKelas->kelas_id ?>" name="id" id="id" type="hidden">
                    <input value="<?= $dKelas->kelas_nama ?>" name="nama" id="nama" type="text" class="form-control" required>
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
                    <script>
                      document.getElementById('matakuliah').value = <?= $dKelas->matakuliah_id  ?>
                    </script>
                  </div>
                </div>
              </div>
              <h6>List Mahasiswa</h6>
              <a href="?p=pages/kelas/add&id=<?= $dKelas->kelas_id ?>" class="btn btn-sm btn-primary">Tambah Mahasiswa</a>
              <table class="table table-bordered ">
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
              <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                <button type="reset" class="btn btn-sm btn-warning">Celar</button>
                <a href="?p=pages/kelas/index" class="btn btn-sm btn-success">Back</a>
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