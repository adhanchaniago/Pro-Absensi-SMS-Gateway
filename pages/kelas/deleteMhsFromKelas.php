<?php
if ($db->deleteMahasiswaFromKelas($_GET['idMhs'], $_GET['idKelas']) > 0) {
    echo "<script>
    location='index.php?p=pages/kelas/detail&id=$_GET[idKelas]';
    </script>";
} else {
    echo "<script>
    location='index.php?p=pages/kelas/index&id=$_GET[idKelas]';
    </script>";
}
