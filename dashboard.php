<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Selamat Datang, <?= $_SESSION['username']; ?></h1>
        <a href="tambah_pegawai.php"><button>Tambah Data Pegawai</button></a>
        <a href="cari_data.php"><button>Cari Pegawai</button></a>
        <a href="hitung_gaji.php"><button>Hitung Gaji</button></a>
        <a href="logout.php"><button>Logout</button></a>
    </div>
    <div class="container">
    <h2>Daftar Pegawai</h2>
    <table>
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Unit</th>
                <th>Golongan</th>
                <th>Jumlah Anak</th>
                <th>Edit</th>
                <th>Hapus Data</th>
               
            </tr>
        </thead>
        <tbody>
            <?php
            if (file_exists("pegawai.txt")) {
                $file = fopen("pegawai.txt", "r");
                while (($line = fgets($file)) !== false) {
                    list($nik, $nama, $golongan, $alamat, $unit, $jumlahanak, $jam_kerja) = explode(",", trim($line));
                    echo "<tr>
                            <td>$nik</td>
                            <td>$nama</td>
                            <td>$golongan</td>
                            <td>$alamat</td>
                            <td>$unit</td>
                            <td>$jumlahanak</td>
                            <td>
                                 <a href='ubah_data.php?nik'=$nik>edit</a>
                            </td>
                            <td>
                                <a href='hapus_pegawai.php?nik=$nik' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                            </td>
                          </tr>";
                }
                fclose($file);
            }
            ?>
        </tbody>
</body>
</html>