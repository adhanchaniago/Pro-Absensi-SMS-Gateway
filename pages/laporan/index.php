<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="index.php">Home</a>
          <span>/</span>
          <span>Laporan</span>
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
          <div class="card-header text-center">Laporan</div>

          <!--Card content-->
          <div class="card-body">
            <p align="justify row">
              <form class="col-md-6" action="index.php?p=pages/laporan/perkelas" method="post">
                <div class="form-input">
                  <label>Pilih Matakuliah</label>
                  <select class="form-control" name="matakuliah" id="comboSMSMatakuliah">
                    <option value="">Pilih</option>
                    <?php foreach ($db->getAllMatakuliah() as $dMatakuliah) : ?>
                      <option value="<?= $dMatakuliah->matakuliah_id ?>"><?= $dMatakuliah->matakuliah_nama ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div id="matakuliah" class="form-input">

                </div>
                <div class="form-input">
                  <input type="submit" class="btn btn-sm btn-success" value="Cetak">
                </div>
              </form>
            </p>
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
    $('#comboSMSMatakuliah').change(function() {
      var kelas = $(this).val()
      $.ajax({
        url: 'pages/laporan/ajaxLoadKelas.php',
        type: 'POST',
        dataType: 'HTML',
        data: {
          'id': kelas,
        },
        success: function(data) {
          $('#matakuliah').html(data)
        }
      })
    })
  })
</script>