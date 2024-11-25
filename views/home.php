<?php

session_start();

require '../config/connect.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}


$id = $_SESSION['id'];


$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows == 1) {
    
    $data = $result->fetch_assoc();
} else {
    
    header("Location: login.php");
    exit();
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>flowers aul</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(120deg, #f7cac9, #ffe6e6); /* Gradient background */
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #ff3366 !important; /* Pink navbar */
        }

        .nav-link.text-white {
            color: #ffffff !important; /* Ensure text in navbar remains white */
        }

        .btn-danger {
            background-color: #ff3366; /* Pink logout button */
            border: none;
        }

        .btn-danger:hover {
            background-color: #ff6699; /* Lighter pink on hover */
        }

        .logo {
            max-width: 300px; /* Besarkan ukuran logo */
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg py-3" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav w-100 me-auto mb-2 mb-lg-0 justify-content-between">
                    <div class="d-md-inline-flex">
                    </div>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $data["username"] ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="../config/LogoutController.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container d-flex min-vh-100 justify-content-center align-items-center">
        <div class="text-center">
            <!-- Logo -->
            <img src="../assets/flower.png" alt="Logo Flower" class="logo">

            <!-- Selamat Datang -->
            <h1 class="mb-3">👋 Hello, <?= $data["name"] ?></h1>
            <h1 class="mb-5">Selamat datang di toko bunga!💐🌷🌹🌸🌺</h1>

            <!-- Logout Button -->
            <form action="../config/LogoutController.php" method="post">
                <button type="submit" class="btn btn-danger px-5" name="logout">Logout</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
