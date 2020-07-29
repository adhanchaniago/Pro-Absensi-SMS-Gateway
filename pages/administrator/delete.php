<?php
if ($db->deleteAdministrator($_GET['id']) > 0) {
    echo "<script>
    location = 'index.php?p=pages/administrator/index';
    </script>";
} else {
    echo "<script>
    location = 'index.php?p=pages/administrator/index';
    </script>";
}
