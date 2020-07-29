<?php
session_start();
include('core/Db.php');
$db = new Db();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>SMS Gateway Presensi AMIK</title>
  <?php include('components/head.php'); ?>
</head>

<body class="grey lighten-3">


  <!-- Heading -->
  <!--Grid row-->
  <div class="contanier " style="margin:120px">

    <!--Grid column-->
    <div class="col-md-2 mb-4">
    </div>
    <div class="col-md-8 mb-4">

      <!--Card-->
      <div class="card mb-4">

        <!-- Card header -->
        <div class="card-header text-left">AMIK Dapernas</div>

        <!--Card content-->
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="text" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" name="login" id="login" class="btn btn-primary" value="Login">
            </div>
          </form>
          <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $db->Login($_POST);
          }
          ?>
        </div>

      </div>
      <!--/.Card-->


    </div>
    <div class="col-md-2 mb-4">
    </div>
    <!--Grid column-->

  </div>



  <!--Footer-->
  <footer class="mt-5 text-center font-small primary-color-dark darken-2 wow fadeIn">
    <!--Copyright-->
    <div class="footer-copyright py-3">
      © <?= date('Y') ?> Copyright:
      <a href="" target="_blank"> AMIK</a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <?php include('components/scripts.php'); ?>
</body>

</html>