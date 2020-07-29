<?php
if ($db->deleteKelas($_GET['id']) > 0) {
    echo "<script>
    location = 'index.php?p=pages/kelas/index';
    </script>";
} else {
    echo "<script>
    location = 'index.php?p=pages/kelas/index';
    </script>";
}
