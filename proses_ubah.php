<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $nik_update = trim($_POST['nik']); // NIK pegawai yang ingin diubah
    $nama = trim($_POST['nama']);
    $alamat = trim($_POST['alamat']);
    $unit = trim($_POST['unit']);
    $golongan = trim($_POST['golongan']);
    $jumlah_anak = trim($_POST['jumlah_anak']);
    $jam_kerja = trim($_POST['jam_kerja']);

    // Validasi input
    if (empty($nik_update) || empty($nama) || empty($alamat) || empty($unit) || empty($golongan) || empty($jumlah_anak) || empty($jam_kerja)) {
        echo "<script>alert('Semua field harus diisi!');window.history.back();</script>";
        exit;
    }

    // Baca file dan simpan data yang telah diubah
    $data_baru = "";
    $file_path = "pegawai.txt";

    if (!file_exists($file_path)) {
        echo "<script>alert('File pegawai.txt tidak ditemukan!');window.location.href='dashboard.php';</script>";
        exit;
    }

    $file = fopen($file_path, "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            list($nik, $nama_lama, $alamat_lama, $unit_lama, $golongan_lama, $jumlah_anak_lama, $jam_kerja_lama) = explode(",", trim($line));
            if ($nik == $nik_update) {
                // Jika NIK sama, ganti data dengan data baru
                $data_baru .= "$nik_update, $nama, $alamat, $unit, $golongan, $jumlah_anak, $jam_kerja\n";
            } else {
                // Jika tidak, simpan data lama
                $data_baru .= $line;
            }
        }
        fclose($file);
    } else {
        echo "<script>alert('Gagal membuka file pegawai.txt!');window.location.href='dashboard.php';</script>";
        exit;
    }

    // Tulis ulang data ke file
    $file = fopen($file_path, "w");
    if ($file) {
        fwrite($file, $data_baru);
        fclose($file);
        echo "<script>alert('Data pegawai berhasil diubah!');window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal menulis ke file pegawai.txt!');window.location.href='dashboard.php';</script>";
    }
}
?>