<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <span>Mahasiswa</span>
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
          <div class="card-header text-center">Data Mahasiswa</div>

          <!--Card content-->
          <div class="card-body">
            <a href="?p=pages/mahasiswa/add" class="btn btn-sm btn-primary">Tambah Data</a>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NPM</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>No Hp Orang Tua</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($db->getAllMahasiswa() as $no => $row) : ?>
                  <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->mahasiswa_npm ?></td>
                    <td><?= $row->mahasiswa_nama ?></td>
                    <td><?= ($row->mahasiswa_jenis_kelamin == 0) ? "Laki-Laki" : "Perempuan" ?></td>
                    <td><?= $row->mahasiswa_nohp_ortu ?></td>
                    <td width="220px">
                      <a href="?p=pages/mahasiswa/detail&id=<?= $row->mahasiswa_id ?>" class="btn btn-sm btn-success"><span class="fa fa-search"></span></a>
                      <a href="?p=pages/mahasiswa/edit&id=<?= $row->mahasiswa_id ?>" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></a>
                      <a onclick="return confirm('Anda Yakin Hapus ?')" href="?p=pages/mahasiswa/delete&id=<?= $row->mahasiswa_id ?>" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
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