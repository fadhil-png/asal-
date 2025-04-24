<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $unit = $_POST['unit'];
    $golongan = $_POST['golongan'];
    $jumlah_anak = $_POST['jumlah_anak'];
    $jam_kerja = $_POST['jam_kerja'];

    // Tambahkan data ke file
    $data="$nik, $nama, $alamat, $unit, $golongan, $jumlah_anak, $jam_kerja\n";

    $file= fopen("pegawai.txt","a");
    if ($file){
        fwrite($file,$data);
        fclose($file);
        echo "Data pegawai berhasil ditambahkan!";
    } else{
        echo "Gagal membuka file untuk menulis data.";
    }
}

    echo "<script>alert('Data pegawai berhasil ditambahkan!');window.location.href='dashboard.php';</script>";

?>