<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrian PTSP</title>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-secondary-subtle">
    <nav class="navbar navbar-expand-lg bg-primary bg-gradient fixed-top rounded-bottom">
        <div class="container">
            <a class="navbar-brand text-light" href="">
                <h3>SINA</h3>
            </a>
            <div id="tanggal" class="text-light"></div>
            <div id="jam" class="text-light"></div>
        </div>
    </nav>

    <div class="container mt-5 pt-5">
        <div class="row mt-5">

            <div class="col-3">
                <div class="card text-center">
                    <div class="card-header bg-primary fw-bold text-light">PHU</div>
                    <div class="card-body py-5 bg-primary bg-gradient text-light">
                        <p style="font-size: 75px;" id="phu-info"></p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-center">
                    <div class="card-header bg-primary fw-bold text-light">SEKJEN</div>
                    <div class="card-body py-5 bg-primary bg-gradient text-light">
                        <p style="font-size: 75px;" id="sekjen-info"></p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-center">
                    <div class="card-header bg-primary fw-bold text-light">BIMAS</div>
                    <div class="card-body py-5 bg-primary bg-gradient text-light">
                        <p style="font-size: 75px;" id="bimas-info"></p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-center">
                    <div class="card-header bg-primary fw-bold text-light">PENDIS</div>
                    <div class="card-body py-5 bg-primary bg-gradient text-light">
                        <p style="font-size: 75px;" id="pendis-info"></p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="fixed-bottom bg-primary py-2 rounded-top">
        <div class="fw-bold text-light text-center">
            ©SINA 2024
        </div>
    </footer>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- BOOSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- INTERNAL JS -->
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

        // Fungsi untuk memperbarui nomor secara realtime
        function updatePhuInfo() {
            // Menggunakan AJAX untuk mengambil data dari server
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Mengupdate nilai phu-info dengan data yang diterima dari server
                    document.getElementById("phu-info").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../functions.php?action=getInfoPHU", true);
            xhttp.send();
        }

        function updateSekjenInfo() {
            // Menggunakan AJAX untuk mengambil data dari server
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Mengupdate nilai sekjen-info dengan data yang diterima dari server
                    document.getElementById("sekjen-info").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../functions.php?action=getInfoSEKJEN", true);
            xhttp.send();
        }

        function updateBimasInfo() {
            // Menggunakan AJAX untuk mengambil data dari server
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Mengupdate nilai bimas-info dengan data yang diterima dari server
                    document.getElementById("bimas-info").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../functions.php?action=getInfoBIMAS", true);
            xhttp.send();
        }

        function updatePendisInfo() {
            // Menggunakan AJAX untuk mengambil data dari server
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Mengupdate nilai pendis-info dengan data yang diterima dari server
                    document.getElementById("pendis-info").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../functions.php?action=getInfoPENDIS", true);
            xhttp.send();
        }

        // Memanggil fungsi 1 detik
        setInterval(updatePhuInfo, 1000);
        setInterval(updateSekjenInfo, 1000);
        setInterval(updateBimasInfo, 1000);
        setInterval(updatePendisInfo, 1000);
    </script>
</body>

</html>