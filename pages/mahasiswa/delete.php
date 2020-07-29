<?php
if ($db->deleteMahasiswa($_GET['id']) > 0) {
    echo "<script>
    location = 'index.php?p=pages/mahasiswa/index';
    </script>";
} else {
    echo "<script>
    location = 'index.php?p=pages/mahasiswa/index';
    </script>";
}
