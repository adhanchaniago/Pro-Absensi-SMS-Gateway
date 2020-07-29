<?php
if ($db->deleteDosen($_GET['id']) > 0) {
    echo "<script>
    location = 'index.php?p=pages/dosen/index';
    </script>";
} else {
    echo "<script>
    location = 'index.php?p=pages/dosen/index';
    </script>";
}
