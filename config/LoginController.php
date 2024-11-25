<?php
require 'connect.php';

function login($input)
{
    global $conn;

    $email = $input['email'];
    $password = $input['password'];

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user['id'];

            if (isset($input['remember'])) {
                setcookie("user_id", $user['id'], time() + (86400 * 30), "/");
            }

            // Arahkan ke home.php
            header("Location: home.php");
            exit();
        } else {
            session_start();
            $_SESSION['message'] = "Password salah!";
            header("Location: login.php");
            exit();
        }
    } else {
        session_start();
        $_SESSION['message'] = "Email tidak ditemukan!";
        header("Location: login.php");
        exit();
    }
}

function rememberMe($cookie)
{
    global $conn;

    if (isset($cookie['user_id'])) {
        $user_id = $cookie['user_id'];

        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user['id'];

            // Arahkan ke home.php
            header("Location: home.php");
            exit();
        }
    }
}
?>
