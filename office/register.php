<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

require '../functions.php';

if (isset($_POST['REGISTER'])) {
    $result = register($_POST);
    if ($result === 200) {
        echo "<script>alert('Registrasi gagal! Pengguna telah didaftarkan.'); window.location.href = 'register.php';</script>";
    } elseif ($result === 300) {
        echo "<script>alert('Registrasi gagal! Kata sandi dan konfirmasi kata sandi tidak sama.'); window.location.href = 'register.php';</script>";
    } else {
        echo "<script>alert('Registrasi berhasil! Silahkan masuk.'); window.location.href = 'register.php';</script>";
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SINA - Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-primary">

    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="card" style="width: 35rem;">
            <div class="card-body py-4 px-5">
                <div class="text-center">
                    <h2>Registrasi</h2>
                    <hr>
                </div>
                <form method="post" action="">
                    <div class="mb-2">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off" required>
                    </div>
                    <div class="mb-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" autocomplete="off" required>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" name="password" id="password" autocomplete="off" required>
                    </div>
                    <div class="mb-2">
                        <label for="confirmPassword" class="form-label">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" autocomplete="off" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="REGISTER" class="btn btn-primary mb-2">REGISTRASI</button>
                        <br>
                        Sudah memiliki akun? Silahkan <a href="login.php" class="text-primary">Masuk!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>