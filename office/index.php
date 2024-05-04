<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require '../functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SINA - Office</title>

    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>

<body class="bg-secondary-subtle">
    <?php include 'templates/navbar.php'; ?>

    <!-- BUTTON COUNTER -->
    <div class="container mt-5 pt-5 text-center">
        <br>
        <h1 class="text-secondary">PILIH LOKET</h1>
        <hr>
        <div class="row mt-5">

            <div class="col-3">
                <a href="loketPHU.php" class="btn btn-primary bg-gradient" style="font-size: 50px; width:100%; height:250%; display: flex; justify-content: center; align-items: center;">PHU</a>
            </div>
            <div class="col-3">
                <a href="loketSEKJEN.php" class="btn btn-primary bg-gradient" style="font-size: 50px; width:100%; height:250%; display: flex; justify-content: center; align-items: center;">SEKJEN</a>
            </div>
            <div class="col-3">
                <a href="loketBIMAS.php" class="btn btn-primary bg-gradient" style="font-size: 50px; width:100%; height:250%; display: flex; justify-content: center; align-items: center;">BIMAS</a>
            </div>
            <div class="col-3">
                <a href="loketPENDIS.php" class="btn btn-primary bg-gradient" style="font-size: 50px; width:100%; height:250%; display: flex; justify-content: center; align-items: center;">PENDIS</a>
            </div>

        </div>
    </div>

    <?php include 'templates/footer.php'; ?>

    <!-- BOOSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- WAKTU -->
    <script>
        function getTanggal() {
            const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

            const sekarang = new Date();
            const hariIni = hari[sekarang.getDay()];
            const tanggal = sekarang.getDate();
            const namaBulan = bulan[sekarang.getMonth()];
            const tahun = sekarang.getFullYear();

            return `${hariIni}, ${tanggal} ${namaBulan} ${tahun}`;
        }

        function getJam() {
            const sekarang = new Date();
            const jam = sekarang.getHours().toString().padStart(2, '0');
            const menit = sekarang.getMinutes().toString().padStart(2, '0');
            const detik = sekarang.getSeconds().toString().padStart(2, '0');

            return `${jam}:${menit}:${detik} WIB`;
        }

        function updateJam() {
            document.getElementById('jam').innerText = getJam();
        }

        document.getElementById('tanggal').innerText = getTanggal();
        setInterval(updateJam, 1000); // Update setiap detik
    </script>
</body>

</html>