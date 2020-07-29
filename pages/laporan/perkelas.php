<main class="pt-5 mx-lg-5">
     <div class="container-fluid mt-5">

          <!-- Heading -->
          <div class="card mb-4 wow fadeIn">
               <?php
               $kelas = $db->getKelasAndMatkul($_POST['kelas'], $_POST['matakuliah']);
               ?>
               <!--Card content-->
               <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                         <a href="index.php">Home</a>
                         <span>/</span>
                         <span>Laporan Absensi</span>
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
                         <div class="card-header text-center">Data Laporan Absensi</div>

                         <!--Card content-->
                         <div class="card-body">

                              <table class="table table-bordered">
                                   <thead>
                                        <tr>
                                             <th>No</th>
                                             <th>Tgl Absensi</th>
                                             <th>Kelas</th>
                                             <th>Matakuliah</th>
                                             <th>SKS</th>
                                             <th>Aksi</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php foreach ($kelas as $no => $row) : ?>
                                             <tr>
                                                  <td><?= ++$no ?></td>
                                                  <td><?= tgl_indo($row->absensi_tgl) ?></td>
                                                  <td><?= $row->kelas_nama ?></td>
                                                  <td><?= $row->matakuliah_nama ?></td>
                                                  <td><?= $row->matakuliah_sks ?></td>
                                                  <td width="70">
                                                       <a target="_blank" href="?p=pages/laporan/lapPerkelas&id=<?= $row->absensi_id ?>" class="btn btn-sm btn-success"><span class="fa fa-book"></span></a>
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