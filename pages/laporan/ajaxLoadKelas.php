<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_presensi_gateway');
$id = $_POST['id'];
$data = $conn->query("SELECT * FROM tb_kelas WHERE matakuliah_id = '$id'");
?>

<label class="mt-3">Pilih Kelas</label>
<select class="form-control" name="kelas" id="kelas">
    <?php
    foreach ($data as $row) : ?>
        <option value="<?= $row['kelas_id'] ?>"><?= $row['kelas_nama'] ?></option>
    <?php endforeach ?>
</select>