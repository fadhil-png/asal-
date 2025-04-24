<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Pegawai</h1>
        <form action="proses_tambah.php" method="post">
            <label for="nik">NIK:</label>
            <input type="number" id="nik" name="nik" required><br><br>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required><br><br>
            <label for="nama">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required><br><br>
            <label for="nama">Unit:</label>
            <input type="number" id="unit" name="unit" required><br><br>
            <label for="golongan" class="block text-lg font-medium text-gray-700">Golongan:</label>
            <select name="golongan" id="golongan" required class="border border-gray-300 rounded-lg p-3 mb-4 focus:outline-none focus:ring-2"><
                <option value="">Pilih Golongan</option>
                <option value="IV-A">IV-A</option>
                <option value="IV-B">IV-B</option>
                <option value="IV-C">IV-C</option>
                <option value="III-A">III-A</option>
                <option value="III-B">III-B</option>
                <option value="III-C">III-C</option>
            </select><br><br>
            <label for="nama">Jumlah Anak:</label>
            <input type="number" id="jumlah_anak" name="jumlah_anak" required><br><br>
            <label for="golongan">Jam Kerja:</label>
            <input type="number" id="jam_kerja" name="jam_kerja" required><br><br>
            <button type="submit" name="submit">Tambah Data</button>
        </form>
    </div>
</body>
</html>

