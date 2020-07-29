<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_presensi_gateway');
$id = $_POST['id'];
$data = $conn->query("SELECT * FROM tb_kelas WHERE kelas_id = '$id'")->fetch_assoc();
$pecah = $data['kelas_mahasiswa'];
$hasilPecah = explode(',', $pecah);
foreach ($hasilPecah as $i => $row) {
    $dMahasiswa = $conn->query("SELECT * FROM tb_mahasiswa WHERE mahasiswa_id='$hasilPecah[$i]'");
    foreach ($dMahasiswa as $a) {
?>
        <tr>
            <td><?= $a['mahasiswa_npm'] ?></td>
            <td>
                <input value="<?= $a['mahasiswa_id'] ?>" type="hidden" name="idMhs<?= $a['mahasiswa_id'] ?>" id="idMhs">
                <span><?= $a['mahasiswa_nama'] ?></span>
            </td>
            <td><?= ($a['mahasiswa_jenis_kelamin'] == '0') ? "Laki-laki" : "Perempuan" ?></td>
            <td><input type="radio" value="0" name="status<?= $a['mahasiswa_id'] ?>"></td>
            <td><input type="radio" value="1" name="status<?= $a['mahasiswa_id'] ?>"></td>
            <td><input type="radio" value="2" name="status<?= $a['mahasiswa_id'] ?>"></td>
            <td width=" 150"><textarea name="ket<?= $a['mahasiswa_id'] ?>" id="ket" cols="30" rows="2"></textarea></td>
        </tr>
<?php }
} ?>