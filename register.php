<?php
session_start();
require 'load/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $phone = $_POST['no_hp'];
    $password = $_POST['password'];
    $role = "Karyawan";

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO tbl_karyawan (username, no_hp, password, role) VALUES ('$username', '$phone', '$hashedPassword', '$role')";

    if (mysqli_query($koneksi, $query)) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bintang Resik</title>

    <link rel="shortcut icon" href="asset/img/favicon.png" type="image/x-icon">

    <!-- Boostrap 4 -->
    <link rel="stylesheet" href="asset/vendor/bootstrap-4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/login.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="asset/vendor/fontawesome/css/all.min.css">
</head>

<body>
    <div class="container">
        <form class="form-signin" action="" method="post">
            <div class="text-center mb-4">
                <img class="mb-4" src="asset/img/laundryku.png" alt="" width="100" height="100">
                <h1 class="h3 mb-3 font-weight-normal">Registrasi</h1>
                <h1 class="h3 mb-3 font-weight-normal">Bintang Resik Laundry</h1>
                <?php if (isset($error)): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Username atau Password salah...
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-label-group">
                <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder=""
                    required="" autofocus="">
                <label for="username">Username</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="no_hp" name="no_hp" class="form-control form-control-lg" placeholder=""
                    required="" autofocus="">
                <label for="no_hp">No HP</label>
            </div>


            <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder=""
                    required>
                <label for="password">Password</label>
                <span class="show-hide"><i class="fa fa-eye"></i></span>
            </div>

            <script>
                const password = document.querySelector("#password");
                const btnShowHide = document.querySelector(".show-hide i");

                btnShowHide.addEventListener("click", function () {
                    if (password.type === "password") {
                        password.type = "text";
                        btnShowHide.classList.add("fa-eye-slash");
                    } else {
                        password.type = "password";
                        btnShowHide.classList.remove("fa-eye-slash");
                    }
                });
            </script>

            <style>
                .show-hide {
                    position: absolute;
                    top: 50%;
                    right: 10px;
                    transform: translateY(-50%);
                    cursor: pointer;
                }
            </style>


            <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Sign Up</button>
            <button class="btn btn-lg btn-secondary btn-block" type="submit" name="login"
                onclick="redirectToRegister()">Sign
                In</button>
            <script>
                function redirectToRegister() {
                    window.location.href = "login.php";
                }
            </script>
            <p class="mt-5 mb-3 text-muted text-center">Kziunaaa - 2023</p>
        </form>

</body>
<script src="asset/vendor/jquery-3.5.1/jquery-3.5.1.min.js"></script>
<script src="asset/vendor/bootstrap-4.5.3/js/bootstrap.min.js"></script>
<script src="asset/js/login.js"></script>

</html>