<?php
$id = $_POST['id'];
$conn = mysqli_connect('localhost', 'root', '', 'db_presensi_gateway');
$data = $conn->query("SELECT * FROM tb_kelas WHERE kelas_id = '$id'")->fetch_assoc();
?>
<label for="matakuliah">Matakuliah</label>
<select name="matakuliah" id="comboMatakuliah" class="form-control" required>
     <option value="">Pilih</option>
     <?php foreach ($db->getAllMatakuliah() as $dMatakuliah) : ?>
          <option value="<?= $dmatakuliah->matakuliah_id ?>"><?= $dmatakuliah->matakuliah_nama ?></option>
     <?php endforeach ?>
</select>