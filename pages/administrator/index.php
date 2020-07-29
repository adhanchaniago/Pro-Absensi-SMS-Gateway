<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <span>Administrator</span>
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
          <div class="card-header text-center">Data Administrator</div>

          <!--Card content-->
          <div class="card-body">
            <a href="?p=pages/administrator/add" class="btn btn-sm btn-primary">Tambah Data</a>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Nama</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($db->getAllAdministrator() as $no => $row) :   ?>
                  <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->administrator_username ?></td>
                    <td><?= $row->administrator_password ?></td>
                    <td><?= $row->administrator_nama ?></td>
                    <td width="155px">
                      <a href="?p=pages/administrator/edit&id=<?= $row->administrator_id ?>" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></a>
                      <a onclick="return confirm('Anda Yakin Hapus ?')" href="?p=pages/administrator/delete&id=<?= $row->administrator_id ?>" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
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