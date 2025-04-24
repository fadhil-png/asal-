<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$file = fopen("pengguna.txt", "r");
$valid = false;

while (($line = fgets($file)) !== false) {
    list($user, $pass) = explode(",", trim($line));
    if ($user == $username && $pass == $password) {
        $valid = true;
        break;
    }
}
fclose($file);

if ($valid) {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
} else {
    echo "<script>alert('Username atau Password salah!');window.location.href='login.php';</script>";
}
?>