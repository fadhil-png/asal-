<?php
if (isset($_POST['register'])) {
    $username = $_POST['usn'];
    $password = $_POST['pwd'];

    // validasi input gak kosong
    if (empty($username) || empty($password)) {
        echo "<script type='text/javascript'>alert('Username dan password tidak boleh kosong!');</script>";
    } else {
        $file = fopen("pengguna.txt", "a");
        fwrite($file, $username . "," . $password . PHP_EOL);
        fclose($file);

        echo "<script type='text/javascript'>alert('Registrasi berhasil! Silahkan Login.');</script>";
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <title>Registrasi Pengguna</title>
    </head>
    <body>
        <?php
        if (isset($error_mssg)) echo "<p>$error_mssg</p>";
        if (isset($success_mssg)) echo "<p>$success_mssg</p>";
        ?>
        <div class="wrapper">
            <form method="POST" action="">
             <h1>Buat Akun</h1>   
             <div class="input-box">
            <input type="text" name="usn" placeholder="Username" required>
            <i class='bx bxs-user'></i>
             </div>
             <div class="input-box">
             <input type="password" name="pwd" placeholder="Password" required>
             <i class='bx bxs-lock-alt'></i>
             </div>
            <button class="btn" type="submit" name="register">Daftar</button>
        <div class="register-link">
        <p><a href="login.php">Kembali ke halaman Log in</a></p>
      </div>      
        </form>
        </div>
    </body>
</html>
