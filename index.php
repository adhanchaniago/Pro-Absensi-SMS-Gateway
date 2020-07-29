<?php
session_start();
if (empty($_SESSION['akun'])) {
  echo "<script>
  alert('Anda harus login');
  window.location='login.php'
  </script>";
}
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
  <script src="assets/jquery.min.js"></script>

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <?php include('components/top-bar.php'); ?>
    <!-- Navbar -->

    <!-- Sidebar -->
    <?php include('components/side-bar.php'); ?>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <?php include('content.php'); ?>
  <!--Main layout-->

  <!--Footer-->
  <?php include('components/footer.php'); ?>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <?php include('components/scripts.php'); ?>
</body>

</html>