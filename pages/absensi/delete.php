<?php
if ($db->deleteAbsensi($_GET['id']) or $db->deleteDetail($_GET['id']) > 0) {
    echo "<script>
    location = 'index.php?p=pages/absensi/index';
    </script>";
} else {
    echo "<script>
    location = 'index.php?p=pages/absensi/index';
    </script>";
}
