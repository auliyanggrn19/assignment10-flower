<?php
session_start();
require '../config/LoginController.php';

if (isset($_COOKIE['id'])) {
    rememberMe($_COOKIE);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    login($_POST);
}

if (isset($_SESSION['login'])) {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowers Aul</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <style>
        /* Styling tambahan */
        body {
            background: linear-gradient(120deg, #f7cac9, #ffe6e6);
            font-family: 'Arial', sans-serif;
        }
        .card {
            border-radius: 20px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #ff6699;
            border: none;
        }
        .btn-primary:hover {
            background-color: #ff3366;
        }
        .text-primary {
            color: #ff3366 !important;
        }
        .form-check-label {
            font-size: 14px;
            color: #333;
        }
        .logo {
            width: 150px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-lg-6">
                <div class="card px-5 py-5">
                    <div class="w-100 text-center mb-4">
                        <img src="../assets/flower.png" alt="Logo" class="logo">
                    </div>

                    <!-- Alert untuk message -->
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['message'] . '</div>';
                        unset($_SESSION['message']);
                    }
                    ?>

                    <!-- Form Login -->
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="email" class="fw-bold">Email</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="Email" required>
                        </div>

                        <div class="mb-3">
                            <label for="pass" class="fw-bold">Password</label>
                            <input type="password" id="pass" class="form-control" name="password" placeholder="Password" required>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" id="check" class="form-check-input" name="remember">
                            <label class="form-check-label" for="check">Remember me</label>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary px-5 w-100">Login</button>
                        </div>
                    </form>

                    <div class="mt-3 text-center">
                        Belum punya akun? <a href="register.php" class="text-primary">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
