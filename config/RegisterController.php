<?php
session_start();
require 'connect.php';

// Ambil data dari form
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Periksa apakah email sudah terdaftar
$query = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['message'] = "Email sudah terdaftar!";
    header("Location: ../register.php"); // Arahkan kembali ke halaman registrasi
    exit();
}

// Jika email belum terdaftar, tambahkan ke database
$query = "INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssss", $name, $username, $email, $password);

if ($stmt->execute()) {
    $_SESSION['message'] = "Registrasi berhasil! Silakan login.";
    header("Location: ../views/login.php"); // Arahkan ke login.php di folder views
    exit();
} else {
    $_SESSION['message'] = "Registrasi gagal. Coba lagi.";
    header("Location: ../views/register.php"); // Arahkan kembali ke register.php di folder views
    exit();
}
