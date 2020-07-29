<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <span>Dosen</span>
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
          <div class="card-header text-center">Data Dosen</div>

          <!--Card content-->
          <div class="card-body">
            <a href="?p=pages/dosen/add" class="btn btn-sm btn-primary">Tambah Data</a>
            <table class="table-responsive table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIDN</th>
                  <th>Kode Dosen</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Tmp/Tgl Lahir</th>
                  <th>Agama</th>
                  <th>Pendidikan Akhir</th>
                  <th>Status</th>
                  <th>Tgl Masuk</th>
                  <th>Email</th>
                  <th>No Hp</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($db->getAllDosen() as $no => $row) : ?>
                  <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->dosen_nidn ?></td>
                    <td><?= $row->dosen_kode ?></td>
                    <td><?= $row->dosen_nama ?></td>
                    <td><?= ($row->dosen_jenis_kelamin == 0) ? "Laki-Laki" : "Perempuan" ?></td>
                    <td><?= $row->dosen_alamat ?></td>
                    <td><?= $row->dosen_tmp_tgl_lahir ?></td>
                    <td><?= $row->dosen_agama ?></td>
                    <td><?= $row->dosen_jenjang_pendidikan ?></td>
                    <td><?= $row->dosen_status ?></td>
                    <td><?= $row->dosen_tgl_masuk ?></td>
                    <td><?= $row->dosen_email ?></td>
                    <td><?= $row->dosen_nohp ?></td>
                    <td width="155">
                      <a href="?p=pages/dosen/edit&id=<?= $row->dosen_id ?>" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></a>
                      <a onclick="return confirm('Anda Yakin Hapus ?')" href="?p=pages/dosen/delete&id=<?= $row->dosen_id ?>" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
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