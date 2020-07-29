<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <a href="?p=pages/absensi/index">Absensi</a>
          <span>/</span>
          <span>Tambah Absensi</span>
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
          <div class="card-header text-center">Tambah Data Absensi</div>

          <!--Card content-->
          <div class="card-body">
            <form method="POST">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="tgl">Tanggal</label>
                    <input name="tgl" value="<?= date('Y-m-d') ?>" id="tgl" type="date" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="comboKelas" class="form-control" required>
                      <option value="">Pilih</option>
                      <?php foreach ($db->getAllKelas() as $dKelas) : ?>
                        <option value="<?= $dKelas->kelas_id ?>"><?= $dKelas->kelas_nama ?> | <?= $dKelas->matakuliah_nama ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div id="matakuliahShow" class="form-group">

                  </div>
                </div>
              </div>
              <h6>Daftar Absensi Siswa</h6>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td>NPM</td>
                    <td>Nama Mahasiswa</td>
                    <td>Jenis Kelamin</td>
                    <td>Hadir</td>
                    <td>Izin</td>
                    <td>Alfa</td>
                    <td>Keterangan</td>
                  </tr>
                </thead>
                <tbody id="isi">

                </tbody>
              </table>
              <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                <button type="reset" class="btn btn-sm btn-warning">Celar</button>
                <a href="?p=pages/absensi/index" class="btn btn-sm btn-success">Back</a>
              </div>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
              if ($db->saveAbsensi($_POST, $_POST['kelas']) > 0) {
                echo "<script>
                location='index.php?p=pages/absensi/index';
                </script>";
              } else {
                echo "<script>
                location='index.php?p=pages/absensi/index';
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
<script>
  $(document).ready(function() {
    // $('#comboKelas').change(function(e) {
    //   e.preventDefault();
    //   var idKelas = $(this).val()
    //   $.ajax({
    //     url: "pages/absensi/ajaxLoadMatkul.php",
    //     type: "POST",
    //     dataType: "HTML",
    //     data: {
    //       id: idKelas
    //     },
    //     success: function(data) {
    //       $('#matakuliahShow').html(data);
    //     }
    //   });
    // });
    $('#comboKelas').change(function() {
      var kelas = $(this).val()
      $.ajax({
        url: 'pages/absensi/ajaxLoad.php',
        type: 'POST',
        dataType: 'HTML',
        data: {
          'id': kelas,
        },
        success: function(data) {
          $('#isi').html(data)
        }
      })
    })
  })
</script>