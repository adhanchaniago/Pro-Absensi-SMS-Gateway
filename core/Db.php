<?php
// error_reporting(0);
include('core/Conn.php');
class Db extends Conn
{
    public function Login($data)
    {
        global $conn;
        $ambil = $conn->query("SELECT * FROM tb_administrator WHERE administrator_username='$data[username]' AND administrator_password='$data[password]'");
        $cek = $ambil->num_rows;
        if ($cek > 0) {
            $_SESSION['akun'] = $ambil->fetch_object();
            echo "<script>
            alert('Anda telah login')
            location='index.php'
            </script>";
        }
    }
    //==============================================================================================================
    public function getAllAdministrator()
    {
        $query = "SELECT * FROM tb_administrator";
        return $this->get($query);
    }

    public function saveAdministrator($data)
    {
        global $conn;
        return $conn->query("INSERT INTO `tb_administrator` 
                            (`administrator_username`, 
                            `administrator_password`, 
                            `administrator_nama`, 
                            `administrator_level`)
                            VALUES 
                            ('$data[username]', 
                            '$data[password]', 
                            '$data[nama]', 
                            '$data[level]')");
    }

    public function getOneAdministrator($id)
    {
        $query = "SELECT * FROM tb_administrator WHERE administrator_id = '$id'";
        return $this->get($query)[0];
    }

    public function editAdministrator($data)
    {
        global $conn;
        return $conn->query("UPDATE `tb_administrator` SET
                                    `administrator_username` = '$data[username]',
                                    `administrator_password` = '$data[password]',
                                    `administrator_nama`     = '$data[nama]',
                                    `administrator_level`    = '$data[level]'
                                    WHERE 
                                    `administrator_id`       = '$data[id]'");
    }

    public function deleteAdministrator($id)
    {
        global $conn;
        return $conn->query("DELETE FROM `tb_administrator` WHERE ((`administrator_id` = '$id'))");
    }

    // ================================================================================================

    public function getAllAbsensi()
    {
        $query = "  SELECT * 
                    FROM tb_absensi 
                    JOIN tb_kelas 
                    ON tb_absensi.kelas_id=tb_kelas.kelas_id 
                    JOIN tb_matakuliah
                    ON tb_kelas.matakuliah_id=tb_matakuliah.matakuliah_id
                    JOIN tb_dosen
                    ON tb_matakuliah.dosen_id=tb_dosen.dosen_id";

        return $this->get($query);
    }

    public function saveAbsensi($data, $id_kelas)
    {
        global $conn;
        $matakuliah = $this->getOneKelas($id_kelas)->matakuliah_id;
        $conn->query("INSERT INTO tb_absensi (kelas_id, matakuliah_id, absensi_tgl) VALUES ('$data[kelas]',$matakuliah,'$data[tgl]')");

        $absensi_id = $conn->insert_id;

        $data_mahasiswa = explode(",", $this->getOneKelas($id_kelas)->kelas_mahasiswa);
        foreach ($data_mahasiswa as $mahasiswa) {
            $conn->query("INSERT INTO tb_detail (absensi_id, 
                                                mahasiswa_id, 
                                                detail_status, 
                                                detail_ket) 
                                                VALUES 
                                                (" . $absensi_id . ", 
                                                '" . $data['idMhs' . $mahasiswa] . "', 
                                                '" . $data['status' . $mahasiswa] . "', 
                                                '" . $data['idMhs' . $mahasiswa] . "' )");
        }
        exit;
    }

    public function getOneAbsensiDetail($id)
    {
        $query = "  SELECT * 
                    FROM tb_detail 
                    JOIN tb_mahasiswa
                    ON tb_detail.mahasiswa_id = tb_mahasiswa.mahasiswa_id
                    WHERE tb_detail.detail_id = '$id'";
        return $this->get($query)[0];
    }

    public function getOneDetail($id, $mhs)
    {
        $query = "  SELECT * 
                    FROM tb_detail
                    JOIN tb_mahasiswa
                    ON tb_detail.mahasiswa_id=tb_mahasiswa.mahasiswa_id
                    WHERE tb_detail.absensi_id = '$id' AND tb_detail.mahasiswa_id = '$mhs'";
        return $this->get($query)[0];
    }

    public function getOneDetailAbsensi($id)
    {
        $query = "  SELECT * 
                    FROM tb_detail
                    WHERE absensi_id = '$id'";
        return $this->get($query);
    }

    public function getOneAbsensi($id)
    {
        $query = "  SELECT * 
                    FROM tb_absensi
                    JOIN tb_kelas
                    ON tb_absensi.kelas_id = tb_kelas.kelas_id
                    JOIN tb_matakuliah
                    ON tb_kelas.matakuliah_id=tb_matakuliah.matakuliah_id
                    JOIN tb_dosen
                    ON tb_matakuliah.dosen_id=tb_dosen.dosen_id 
                    WHERE absensi_id = '$id' ";
        return $this->get($query)[0];
    }

    public function editDetailAbsensi($data)
    {
        global $conn;
        return $conn->query("UPDATE `tb_detail` SET
                                    `detail_status`    = '$data[status]'
                                    WHERE 
                                    `detail_id`       = '$data[id]'");
    }

    public function editAbsensi($data)
    {
        global $conn;
        return $conn->query("UPDATE `tb_absensi` SET
                                    `absensi_tgl`    = '$data[tgl]'
                                    WHERE 
                                    `absensi_id`       = '$data[id]'");
    }

    public function deleteAbsensi($id)
    {
        global $conn;
        return $conn->query("DELETE FROM `tb_absensi` WHERE ((`absensi_id` = '$id'))");
    }

    public function deleteDetail($id)
    {
        global $conn;
        return $conn->query("DELETE FROM `tb_detail` WHERE ((`absensi_id` = '$id'))");
    }

    // ================================================================================================
    public function getKelasAndMatkul($kelas, $matakuliah)
    {
        $query = "Select
        db_presensi_gateway.tb_absensi.*,
        db_presensi_gateway.tb_matakuliah.*,
        db_presensi_gateway.tb_kelas.matakuliah_id As matakuliah_id1,
        db_presensi_gateway.tb_matakuliah.matakuliah_nama As matakuliah_nama1,
        db_presensi_gateway.tb_matakuliah.matakuliah_sks As matakuliah_sks1,
        db_presensi_gateway.tb_kelas.kelas_nama,
        db_presensi_gateway.tb_kelas.kelas_mahasiswa
        From
        db_presensi_gateway.tb_absensi Inner Join
        db_presensi_gateway.tb_kelas On db_presensi_gateway.tb_absensi.kelas_id = db_presensi_gateway.tb_kelas.kelas_id
        Inner Join
        db_presensi_gateway.tb_matakuliah On db_presensi_gateway.tb_absensi.matakuliah_id =
                db_presensi_gateway.tb_matakuliah.matakuliah_id
                And db_presensi_gateway.tb_kelas.matakuliah_id = db_presensi_gateway.tb_matakuliah.matakuliah_id
                Where 
                db_presensi_gateway.tb_kelas.matakuliah_id = '$matakuliah' AND db_presensi_gateway.tb_kelas.kelas_id = '$kelas'
                ";
        return $this->get($query);
    }

    public function getAllKelas()
    {
        $query = "SELECT * FROM tb_kelas JOIN tb_matakuliah ON tb_kelas.matakuliah_id = tb_matakuliah.matakuliah_id JOIN tb_dosen ON tb_matakuliah.dosen_id=tb_dosen.dosen_id";
        return $this->get($query);
    }

    public function getOneKelas($id)
    {
        $query = "SELECT * FROM tb_kelas JOIN tb_matakuliah ON tb_kelas.matakuliah_id = tb_matakuliah.matakuliah_id JOIN tb_dosen ON tb_matakuliah.dosen_id=tb_dosen.dosen_id WHERE tb_kelas.kelas_id = '$id'";
        return $this->get($query)[0];
    }

    public function saveKelas($data)
    {
        global $conn;
        $mhsArray = $data['mhs'];
        $mahasiswa = implode(",", $mhsArray);
        return $conn->query("INSERT INTO `tb_kelas` 
                                        (`kelas_nama`, 
                                        `matakuliah_id`, 
                                        `kelas_mahasiswa`)
                                        VALUES 
                                        ('$data[nama]', 
                                        '$data[matakuliah]', 
                                        '$mahasiswa')
                                        ");
    }

    public function editMahasiswaFromKelas($data)
    {

        $kelasLama = $this->getOneKelas($data['idKelas'])->kelas_mahasiswa;
        $mhsArray = $data['mhs'];
        $mahasiswa = $kelasLama . ',' . implode(",", $mhsArray);

        global $conn;
        return $conn->query("UPDATE `tb_kelas` SET
                                    `kelas_mahasiswa` = '$mahasiswa'
                                    WHERE 
                                    `kelas_id`       = '$data[idKelas]'");
    }

    public function editKelas($data)
    {
        global $conn;
        return $conn->query("UPDATE `tb_kelas` SET
                                    `kelas_nama` = '$data[nama]',
                                    `matakuliah_id` = '$data[matakuliah]'
                                    WHERE 
                                    `kelas_id`       = '$data[id]'");
    }

    public function deleteMahasiswaFromKelas($idMhs, $idKelas)
    {
        $Mhs = $this->getOneKelas($idKelas)->kelas_mahasiswa;
        $pecah = explode(',', $Mhs);
        $hasil = array();
        foreach ($pecah as $row) {
            if ($row == $idMhs) {
                $hasil[] = $row;
            }
        }
        $uMhs = implode(',', $hasil);

        global $conn;
        return $conn->query("UPDATE `tb_kelas` SET
                                    `kelas_mahasiswa` = '$uMhs'
                                    WHERE
                                    `kelas_id` = '$idKelas'");
    }

    public function deleteKelas($id)
    {
        global $conn;
        return $conn->query("DELETE FROM `tb_kelas` WHERE ((`kelas_id` = '$id'))");
    }

    // ================================================================================================

    public function getAllMatakuliah()
    {
        $query = "SELECT * FROM tb_matakuliah JOIN tb_dosen ON tb_matakuliah.dosen_id = tb_dosen.dosen_id";
        return $this->get($query);
    }

    public function saveMatakuliah($data)
    {
        global $conn;
        return $conn->query("INSERT INTO `tb_matakuliah` 
                                        (`dosen_id`, 
                                        `matakuliah_nama`, 
                                        `matakuliah_sks`)
                                        VALUES
                                        ('$data[dosen]', 
                                        '$data[nama]', 
                                        '$data[sks]')");
    }

    public function getOneMatakuliah($id)
    {
        $query = "SELECT * FROM tb_matakuliah WHERE matakuliah_id = '$id'";
        return $this->get($query)[0];
    }

    public function editMatakuliah($data)
    {
        global $conn;
        return $conn->query("UPDATE `tb_matakuliah` SET
                                    `dosen_id`        = '$data[dosen]',
                                    `matakuliah_nama` = '$data[nama]',
                                    `matakuliah_sks`  = '$data[sks]'
                                    WHERE 
                                    `matakuliah_id`   = '$data[id]';");
    }

    public function deleteMatakuliah($id)
    {
        global $conn;
        return $conn->query("DELETE FROM `tb_matakuliah` WHERE ((`matakuliah_id` = '$id'))");
    }

    // // ================================================================================================
    public function getAllDosen()
    {
        $query = "SELECT * FROM tb_dosen";
        return $this->get($query);
    }

    public function saveDosen($data)
    {
        global $conn;
        $tgl = $data['tmp'] . '/' . $data['tgl'];
        $random = abs(crc32(uniqid()));
        return $conn->query("INSERT INTO `tb_dosen` 
        (`dosen_nidn`, 
        `dosen_nama`, 
        `dosen_jenis_kelamin`, 
        `dosen_alamat`, 
        `dosen_tmp_tgl_lahir`, 
        `dosen_agama`, 
        `dosen_jenjang_pendidikan`, 
        `dosen_status`, 
        `dosen_tgl_masuk`, 
        `dosen_email`, 
        `dosen_nohp`, 
        `dosen_kode`)
        VALUES 
        ('$data[nidn]',
        '$data[nama]', 
        '$data[jekel]', 
        '$data[alamat]', 
        '$tgl', 
        '$data[agama]', 
        '$data[pdd]', 
        '$data[status]', 
        '$data[tglMasuk]', 
        '$data[email]', 
        '$data[nohp]', 
        'AMK-$random')
        ");
    }

    public function getOneDosen($id)
    {
        $query = "SELECT * FROM tb_dosen WHERE dosen_id = '$id'";
        return $this->get($query)[0];
    }

    public function editDosen($data)
    {
        global $conn;
        $tgl = $data['tmp'] . " / " . $data['tgl'];
        return $conn->query("UPDATE `tb_dosen` SET
                                    `dosen_nidn`               = '$data[nidn]',
                                    `dosen_nama`               = '$data[nama]',
                                    `dosen_jenis_kelamin`      = '$data[jekel]',
                                    `dosen_alamat`             = '$data[alamat]',
                                    `dosen_tmp_tgl_lahir`      = '$tgl',
                                    `dosen_agama`              = '$data[agama]',
                                    `dosen_jenjang_pendidikan` = '$data[pdd]',
                                    `dosen_status`             = '$data[status]',
                                    `dosen_tgl_masuk`          = '$data[tglMasuk]',
                                    `dosen_email`              = '$data[email]',
                                    `dosen_nohp`               = '$data[nohp]'
                                    WHERE 
                                    `dosen_id`                 = '$data[id]'");
    }

    public function deleteDosen($id)
    {
        global $conn;
        return $conn->query("DELETE FROM `tb_dosen` WHERE ((`dosen_id` = '$id'))");
    }

    // ================================================================================================
    public function getAllMahasiswa()
    {
        $query = "SELECT * FROM tb_mahasiswa";
        return $this->get($query);
    }

    public function saveMahasiswa($data)
    {
        global $conn;
        $tgl = $data['tmp'] . '/' . $data['tgl'];
        $npm = date('Ydmhis');
        return $conn->query("INSERT INTO `tb_mahasiswa` 
                                        (`mahasiswa_npm`, 
                                        `mahasiswa_nama`, 
                                        `mahasiswa_jenis_kelamin`, 
                                        `mahasiswa_alamat`, 
                                        `mahasiswa_tmp_tgl_lahir`, 
                                        `mahasiswa_agama`, 
                                        `mahasiswa_nohp_ortu`)
                                        VALUES 
                                        ('$npm', 
                                        '$data[nama]', 
                                        '$data[jekel]', 
                                        '$data[alamat]', 
                                        '$tgl', 
                                        '$data[agama]', 
                                        '$data[nohp]')");
    }

    public function getOneMahasiswa($id)
    {
        $query = "SELECT * FROM tb_mahasiswa WHERE mahasiswa_id = '$id'";
        return $this->get($query)[0];
    }

    public function editMahasiswa($data)
    {
        global $conn;
        $tgl = $data['tmp'] . " / " . $data['tgl'];
        return $conn->query("UPDATE `tb_mahasiswa` SET
                                    `mahasiswa_nama`          = '$data[nama]',
                                    `mahasiswa_jenis_kelamin` = '$data[jekel]',
                                    `mahasiswa_alamat`        = '$data[alamat]',
                                    `mahasiswa_tmp_tgl_lahir` = '$tgl',
                                    `mahasiswa_agama`         = '$data[agama]',
                                    `mahasiswa_nohp_ortu`     = '$data[nohp]'
                                    WHERE 
                                    `mahasiswa_id`            = '$data[id]'");
    }

    public function deleteMahasiswa($id)
    {
        global $conn;
        return $conn->query("DELETE FROM `tb_mahasiswa` WHERE ((`mahasiswa_id` = '$id'))");
    }
}
