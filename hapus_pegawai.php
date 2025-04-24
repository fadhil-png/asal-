<?php
if (isset($_GET['nik'])) {
    $nik_hapus = $_GET['nik'];

    // Baca file, simpan data yang tidak dihapus
    $data_baru = "";
    $file = fopen("pegawai.txt", "r");
    while (($line = fgets($file)) !== false) {
        list($nik, $nama, $golongan) = explode(",", trim($line));
        if ($nik != $nik_hapus) {
            $data_baru .= $line;
        }
    }
    fclose($file);

    // Tulis ulang data ke file
    $file = fopen("pegawai.txt", "w");
    fwrite($file, $data_baru);
    fclose($file);

    echo "<script>alert('Data pegawai berhasil dihapus!');window.location.href='dashboard.php';</script>";
}
?>