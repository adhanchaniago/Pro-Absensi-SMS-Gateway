<?php
if ($db->deleteMatakuliah($_GET['id']) > 0) {
    echo "<script>
    location = 'index.php?p=pages/matakuliah/index';
    </script>";
} else {
    echo "<script>
    location = 'index.php?p=pages/matakuliah/index';
    </script>";
}
