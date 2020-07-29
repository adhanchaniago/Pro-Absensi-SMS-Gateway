<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <span>Kelas</span>
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
          <?php $dKelas = $db->getOneKelas($_GET['id']);
          // var_dump($dKelas);
          ?>
          <div class="card-header text-center">Data Kelas <?= $dKelas->matakuliah_nama ?></div>
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
                    <td><?= ($data->mahasiswa_jenis_kelamin == 0) ? 'Laki-laki' : 'Perempuan' ?></td>
                    <td><?= $data->mahasiswa_nohp_ortu ?></td>
                    <td width="160px">
                      <a href="?p=pages/mahasiswa/detail&id=<?= $data->mahasiswa_id ?>" class="btn btn-sm btn-success"><span class="fa fa-search"></span></a>
                      <a onclick="return confirm('Anda Yakin Hapus ?')" href="?p=pages/kelas/deleteMhsFromKelas&idMhs=<?= $data->mahasiswa_id ?>&idKelas=<?= $dKelas->kelas_id ?>" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        </div>
        <!--/.Card-->


      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->


  </div>
</main>