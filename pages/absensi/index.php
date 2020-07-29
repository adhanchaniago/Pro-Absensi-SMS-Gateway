<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <span>Absensi</span>
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
          <div class="card-header text-center">Data Absensi</div>

          <!--Card content-->
          <div class="card-body">
            <a href="?p=pages/absensi/add" class="btn btn-sm btn-primary">Tambah Data</a>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kelas</th>
                  <th>Tanggal</th>
                  <th>Matakuliah</th>
                  <th>Kode Dosen</th>
                  <th>Dosen</th>
                  <th>SKS</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($db->getAllAbsensi() as $no => $row) :  ?>
                  <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->kelas_nama ?></td>
                    <td><?= tgl_indo($row->absensi_tgl) ?></td>
                    <td><?= $row->matakuliah_nama ?></td>
                    <td><?= $row->dosen_kode ?></td>
                    <td><?= $row->dosen_nama ?></td>
                    <td><?= $row->matakuliah_sks ?></td>
                    <td width="220px">
                      <a href="?p=pages/absensi/detail&id=<?= $row->absensi_id ?>" class="btn btn-sm btn-success"><span class="fa fa-search"></span></a>
                      <a href="?p=pages/absensi/edit&id=<?= $row->absensi_id ?>" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></a>
                      <a onclick="return confirm('Anda Yakin Hapus ?')" href="?p=pages/absensi/delete&id=<?= $row->absensi_id ?>" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
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