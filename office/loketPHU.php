<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require '../functions.php';

$antrian = getAntrianPHU();
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

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

</head>

<body class="bg-secondary-subtle">
    <?php include 'templates/navbar.php'; ?>

    <!-- BUTTON COUNTER -->
    <div class="container my-5 pt-5 text-center">
        <br>
        <h1 class="text-secondary">LOKET PHU</h1>
        <hr>

        <div class="card px-5 py-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">Nomor Antrian</th>
                                <th scope="col">Loket</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tanggal Pendaftaran</th>
                                <th scope="col">Tindak Lanjut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $isFirst = true; ?>
                            <?php foreach ($antrian as $a) { ?>
                                <tr>
                                    <td class="fw-bold"><?= $a['nomor'] ?></td>
                                    <td><?= $a['loket'] ?></td>
                                    <td><?= $a['status'] ?></td>
                                    <td><?= $a['terdaftar_pada'] ?></td>
                                    <td>
                                        <?php if ($isFirst) { ?>
                                            <?php if ($a['status'] == "Pending") { ?>
                                                <a href="calling.php?id=<?= $a['id'] ?>" class="btn btn-primary">Panggil</a>
                                            <?php } else { ?>
                                                <?php if ($a['status'] == "Process") { ?>
                                                    <a href="done.php?id=<?= $a['id'] ?>" class="btn btn-success">Selesai</a>
                                                <?php } else { ?>
                                                    <a href="calling.php?id=<?= $a['id'] ?>" class="btn btn-primary">Panggil</a>
                                                    <a href="process.php?id=<?= $a['id'] ?>" class="btn btn-success">Proses</a>
                                                <?php } ?>
                                            <?php } ?>
                                            <a href="skip.php?id=<?= $a['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin melewati antrian ini?');" class="btn btn-secondary">Lewati</a>
                                            <?php $isFirst = false; ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include 'templates/footer.php'; ?>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- BOOSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DATATABLES -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

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

        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</body>

</html>