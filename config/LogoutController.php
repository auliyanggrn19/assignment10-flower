<?php
// Mulai session
session_start();

// Hapus cookie dengan key user_id jika ada
if (isset($_COOKIE['user_id'])) {
    setcookie('user_id', '', time() - 3600, '/'); // Hapus cookie dengan waktu kadaluarsa negatif
}

// Hapus semua session yang aktif
session_unset();
session_destroy();

// Redirect ke halaman login
header("Location: ../views/login.php");
exit();
?>
