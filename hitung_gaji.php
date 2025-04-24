<?php
function hitungGaji($golongan, $jam_kerja, $anak){
    // Gaji pokok berdasarkan golongan
    $gaji_pokok=0;
    switch ($golongan){
        case 'IV-A':
            $gaji_pokok= 3250000;
            break;
        case 'IV-B':
            $gaji_pokok= 3000000;
            break;
        case 'IV-C':
            $gaji_pokok= 2750000;
            break;
        case 'III-A':
            $gaji_pokok= 2500000;
            break;
        case 'III-B':
            $gaji_pokok= 2250000;
            break;
        case 'III-C';
            $gaji_pokok= 2000000;
            break;
        default:
            return "Golongan tidak valid";
    }

    // Uang makan
    $uang_makan= 25000 * 5; // 5 hari kerja dalam seminggu
    //Tunjangan anak
    $tunjangan_anak= min(2, $anak) * 250000;
    // min: Mengambil nilai yang lebih kecil antara 2 (batas maksimal anak yang diberi tunjangan) dan $anak (jumlah anak sebenarnya).
    //Lembur
    $lembur= ($jam_kerja > 40) ? ($jam_kerja - 40) * 35000 : 0;

    //Gaji total
    $total_gaji= $gaji_pokok + $tunjangan_anak + $uang_makan + $lembur;
    return [
        'gaji_pokok' => $gaji_pokok,
        'uang_makan' => $uang_makan,
        'tunjangan_anak' => $tunjangan_anak,
        'lembur' => $lembur,
        'total_gaji' => $total_gaji
    ];
}

// variabel untuk hasil
$gaji_total = null;

// ambil input dari form
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nama = $_POST['nama'];
    $golongan = $_POST['golongan'] ?? '';
    $jam_kerja = intval(($_POST['jam_kerja'] ?? 0));
    $anak = intval($_POST['anak'] ?? 0);

    // validasi input
    if (!empty($golongan) && $jam_kerja >= 0 && $anak >= 0){
        $gaji_total = hitungGaji($golongan, $jam_kerja, $anak);
    } else {
        $gaji_total = "Input tidak valid!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menghitung Gaji</title>
    <link rel="stylesheet" href="gaji.css">
</head>
<body>

    <h2 class="animate__animated animate__fadeInDown">Form Menghitung Gaji Pegawai</h2>

    <div class="form-container animate__animated animate__fadeInUp">
        <form method="POST" action="">
            <label for="nama">Nama Pegawai:</label>
            <input type="text" id="nama" name="nama" required><br><br>
            <label for="golongan" class="block text-lg font-medium text-gray-700">Golongan:</label>
            <select name="golongan" id="golongan" required class="border border-gray-300 rounded-lg p-3 mb-4 focus:outline-none focus:ring-2">
                <option value="">Pilih Golongan</option>
                <option value="IV-A">IV-A</option>
                <option value="IV-B">IV-B</option>
                <option value="IV-C">IV-C</option>
                <option value="III-A">III-A</option>
                <option value="III-B">III-B</option>
                <option value="III-C">III-C</option>
            </select><br><br>

            <label for="jam_kerja" class="block text-lg font-medium text-gray-700">Jam Kerja (per minggu):</label>
            <input type="number" name="jam_kerja" id="jam_kerja" min="0" required class="border border-gray-300 rounded-lg p-3 mb-4 focus:outline-none focus:ring-2"><br><br>

            <label for="anak" class="block text-lg font-medium text-gray-700">Jumlah Anak:</label>
            <input type="number" name="anak" id="anak" min="0" required class="border border-gray-300 rounded-lg p-3 mb-4 focus:outline-none focus:ring-2"><br><br>

            <button type="submit" class="mt-4 p-3 bg-green-500 text-white rounded-lg w-full hover:bg-green-600 transition-colors duration-300">Hitung Gaji</button>
        </form>
    </div>

    <!-- Hasil Perhitungan -->
    <?php if (isset($gaji_total) && is_array($gaji_total)): ?>
        <div class="result-container animate__animated animate__fadeIn">
            <h3 class="text-xl font-semibold">Hasil Perhitungan:</h3>
            <?php
echo "<p>Nama: $nama</p>";
?>

            <p>Gaji Pokok: Rp <?= number_format($gaji_total['gaji_pokok'], 0, ',', '.') ?></p>
            <p>Uang Makan: Rp <?= number_format($gaji_total['uang_makan'], 0, ',', '.') ?></p>
            <p>Tunjangan Anak: Rp <?= number_format($gaji_total['tunjangan_anak'], 0, ',', '.') ?></p>
            <p>Lembur: Rp <?= number_format($gaji_total['lembur'], 0, ',', '.') ?></p>
            <p><strong>Total Gaji: Rp <?= number_format($gaji_total['total_gaji'], 0, ',', '.') ?></strong></p>
        </div>
    <?php elseif (isset($gaji_total) && $gaji_total !== null): ?>
        <p><?= $gaji_total ?></p>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="dashboard.php" style="color:rgb(13, 203, 10);">Kembali ke Halaman Utama</a>
    </div>

</body>
</html>
