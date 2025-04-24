<?php
session_start();
$search_result = [];
if (isset($_POST['cari'])) {
    $nama = $_POST['nama'];

    // Membaca file pegawai.txt
    $file = file("pegawai.txt");

    // Mencari pegawai berdasarkan nama
    foreach ($file as $line) {
        if (strpos($line, $nama) !== false) { // Cek apakah nama ditemukan
            $search_result[] = $line;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Data Pegawai</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #3894a1;
            margin-top: 30px;
        }

        .form-container {
            width: 50%;
            margin: 0 auto;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .form-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .form-container input:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background-color: #2f404f;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #3894a1;
        }

        .form-container a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #3894a1;
            font-weight: 600;
            text-align: center;
            transition: color 0.3s ease;
        }

        .form-container a:hover {
            color: #45a049;
        }

        /* Style untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #3894a1;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        .table-container {
            margin: 0 auto;
            padding: 20px;
            width: 80%;
        }
    </style>
</head>
<body>

    <h2 class="animate__animated animate__fadeInDown">Cari Data Pegawai</h2>

    <div class="form-container animate__animated animate__fadeInUp">
        <form method="POST" action="">
            <label for="nama" class="block text-lg font-medium text-gray-700">Nama Pegawai:</label>
            <input type="text" id="nama" name="nama" required class="border border-gray-300 rounded-lg p-3 mb-4 focus:outline-none focus:ring-2">

            <button type="submit" name="cari" class="mt-4 p-3 bg-green-500 text-white rounded-lg w-full hover:bg-green-600 transition-colors duration-300">Cari</button>
        </form>
    </div>

    <!-- Hasil Pencarian -->
    <?php if (isset($search_result)): ?>
        <div class="table-container animate__animated animate__fadeIn">
            <h3 class="text-xl font-semibold text-center mt-6">Hasil Pencarian:</h3>
            <?php if (count($search_result) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Golongan</th>
                            <th>Unit</th>
                            <th>Jam Kerja</th>
                            <th>Jumlah Anak</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($search_result as $line): ?>
                            <?php $data = explode(", ", trim($line)); ?>
                            <tr>
                                <td><?php echo isset($data[0]) ? $data[0] : ''; ?></td>
                                <td><?php echo isset($data[1]) ? $data[1] : ''; ?></td>
                                <td><?php echo isset($data[2]) ? $data[2] : ''; ?></td>
                                <td><?php echo isset($data[3]) ? $data[3] : ''; ?></td>
                                <td><?php echo isset($data[4]) ? $data[4] : ''; ?></td>
                                <td><?php echo isset($data[5]) ? $data[5] : ''; ?></td>
                                <td><?php echo isset($data[6]) ? $data[6] : ''; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center text-red-500 mt-4">Data tidak ditemukan!</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="dashboard.php" style="color: #0e7490;" class="hover:text-green-600">Kembali ke Halaman Utama</a>
    </div>

</body>
</html>
