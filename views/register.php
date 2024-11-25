<?php
// Mulai session untuk menangani pesan error
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flowers aul</title>
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
</style>
<body class="bg-secondary">
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-lg-6">
                <div class="card px-5 py-5">
                    <h2 class="text-center mb-3">Register</h2>
                    
                    <!-- Alert untuk pesan error -->
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['message'] . '</div>';
                        unset($_SESSION['message']); // Hapus session message setelah ditampilkan
                    }
                    ?>

                    <!-- Form Registrasi -->
                    <form method="post" action="../config/RegisterController.php">
                        <label for="name" class="fw-bold">Name</label>
                        <input type="text" id="name" class="form-control mb-3" name="name" placeholder="Your Name" required>
                        
                        <label for="username" class="fw-bold">Username</label>
                        <input type="text" id="username" class="form-control mb-3" name="username" placeholder="Your Username" required>
                        
                        <label for="email" class="fw-bold">Email</label>
                        <input type="email" id="email" class="form-control mb-3" name="email" placeholder="Your Email" required>
                        
                        <label for="pass" class="fw-bold">Password</label>
                        <input type="password" id="pass" class="form-control mb-3" name="password" placeholder="Your Password" required>
                        
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary px-5 w-100">Daftar</button>
                        </div>
                    </form>
                    <div class="mt-3 text-center">
                        Sudah punya akun? <a href="login.php">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
