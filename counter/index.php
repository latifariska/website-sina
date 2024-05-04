<?php

require '../functions.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SINA</title>

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

    <!-- MODAL SUCCESS -->
    <div class="modal fade" id="successModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Berhasil!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row">Nomor Antrian</th>
                                <th scope="row">:</th>
                                <th id="nomorAntrian"></th>
                            </tr>
                            <tr>
                                <th scope="row">Loket</th>
                                <th scope="row">:</th>
                                <td id="loket"></td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <th scope="row">:</th>
                                <td id="status"></td>
                            </tr>
                            <tr>
                                <th scope="row">Terdaftar Pada</th>
                                <th scope="row">:</th>
                                <td id="terdaftar_pada"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL FAIL -->
    <div class="modal fade" id="errorModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Oops...</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="errorMessage"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- BUTTON COUNTER -->
    <div class="container mt-5 pt-5 text-center">
        <br>
        <h1 class="text-secondary">PILIH ANTRIAN</h1>
        <hr>
        <div class="row mt-5">

            <div class="col-3">
                <button type="button" id="btnPHU" class="btn btn-primary bg-gradient" style="font-size: 50px; width:100%; height:250%;">PHU</button>
            </div>
            <div class="col-3">
                <button type="button" id="btnSEKJEN" class="btn btn-primary bg-gradient" style="font-size: 50px; width:100%; height:250%;">SEKJEN</button>
            </div>
            <div class="col-3">
                <button type="button" id="btnBIMAS" class="btn btn-primary bg-gradient" style="font-size: 50px; width:100%; height:250%;">BIMAS</button>
            </div>
            <div class="col-3">
                <button type="button" id="btnPENDIS" class="btn btn-primary bg-gradient" style="font-size: 50px; width:100%; height:250%;">PENDIS</button>
            </div>

        </div>
    </div>

    <footer class="fixed-bottom bg-primary py-2 rounded-top">
        <div class="fw-bold text-light text-center">
            ©SINA 2024
        </div>
    </footer>
    <!-- BOOSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ANTRIAN BARU -->
    <script>
        document.getElementById('btnPHU').addEventListener('click', function() {
            // Kirim permintaan AJAX ke server
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../functions.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Tampilkan modal jika berhasil
                        document.getElementById('nomorAntrian').innerText = response.data.nomor;
                        document.getElementById('loket').innerText = response.data.loket;
                        document.getElementById('status').innerText = response.data.status;
                        document.getElementById('terdaftar_pada').innerText = response.data.terdaftar_pada;
                        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                        successModal.show();

                        // Cek koneksi dengan printer thermal
                        if (navigator.serial) {
                            navigator.serial.requestPort().then(async (port) => {
                                await port.open({
                                    baudRate: 9600
                                });
                                const writer = port.writable.getWriter();
                                const text = `Nomor Antrian: ${response.data.nomor}\nLoket: ${response.data.loket}\nTerdaftar pada: ${response.data.terdaftar_pada}\n\n`;
                                await writer.write(new TextEncoder().encode(text));
                                writer.releaseLock();
                            }).catch((error) => {
                                console.error('Error requesting serial port:', error);
                            });
                        } else {
                            console.log('Tidak terhubung ke printer thermal');
                            alert('Tidak terhubung ke printer thermal');
                        }

                    } else {
                        // Tampilkan modal error jika gagal
                        document.getElementById('errorMessage').innerText = 'Gagal menambahkan antrian';
                        var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                        errorModal.show();
                    }
                }
            };
            xhr.send('action=antrianBaruPHU');
        });

        document.getElementById('btnSEKJEN').addEventListener('click', function() {
            // Kirim permintaan AJAX ke server
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../functions.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Tampilkan modal jika berhasil
                        document.getElementById('nomorAntrian').innerText = response.data.nomor;
                        document.getElementById('loket').innerText = response.data.loket;
                        document.getElementById('status').innerText = response.data.status;
                        document.getElementById('terdaftar_pada').innerText = response.data.terdaftar_pada;
                        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                        successModal.show();

                        // Cek koneksi dengan printer thermal
                        if (navigator.serial) {
                            navigator.serial.requestPort().then(async (port) => {
                                await port.open({
                                    baudRate: 9600
                                });
                                const writer = port.writable.getWriter();
                                const text = `Nomor Antrian: ${response.data.nomor}\nLoket: ${response.data.loket}\nTerdaftar pada: ${response.data.terdaftar_pada}\n\n`;
                                await writer.write(new TextEncoder().encode(text));
                                writer.releaseLock();
                            }).catch((error) => {
                                console.error('Error requesting serial port:', error);
                            });
                        } else {
                            console.log('Tidak terhubung ke printer thermal');
                            alert('Tidak terhubung ke printer thermal');
                        }
                    } else {
                        // Tampilkan modal error jika gagal
                        document.getElementById('errorMessage').innerText = 'Gagal menambahkan antrian';
                        var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                        errorModal.show();
                    }
                }
            };
            xhr.send('action=antrianBaruSEKJEN');
        });

        document.getElementById('btnBIMAS').addEventListener('click', function() {
            // Kirim permintaan AJAX ke server
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../functions.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Tampilkan modal jika berhasil
                        document.getElementById('nomorAntrian').innerText = response.data.nomor;
                        document.getElementById('loket').innerText = response.data.loket;
                        document.getElementById('status').innerText = response.data.status;
                        document.getElementById('terdaftar_pada').innerText = response.data.terdaftar_pada;
                        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                        successModal.show();

                        // Cek koneksi dengan printer thermal
                        if (navigator.serial) {
                            navigator.serial.requestPort().then(async (port) => {
                                await port.open({
                                    baudRate: 9600
                                });
                                const writer = port.writable.getWriter();
                                const text = `Nomor Antrian: ${response.data.nomor}\nLoket: ${response.data.loket}\nTerdaftar pada: ${response.data.terdaftar_pada}\n\n`;
                                await writer.write(new TextEncoder().encode(text));
                                writer.releaseLock();
                            }).catch((error) => {
                                console.error('Error requesting serial port:', error);
                            });
                        } else {
                            console.log('Tidak terhubung ke printer thermal');
                            alert('Tidak terhubung ke printer thermal');
                        }
                    } else {
                        // Tampilkan modal error jika gagal
                        document.getElementById('errorMessage').innerText = 'Gagal menambahkan antrian';
                        var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                        errorModal.show();
                    }
                }
            };
            xhr.send('action=antrianBaruBIMAS');
        });

        document.getElementById('btnPENDIS').addEventListener('click', function() {
            // Kirim permintaan AJAX ke server
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../functions.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Tampilkan modal jika berhasil
                        document.getElementById('nomorAntrian').innerText = response.data.nomor;
                        document.getElementById('loket').innerText = response.data.loket;
                        document.getElementById('status').innerText = response.data.status;
                        document.getElementById('terdaftar_pada').innerText = response.data.terdaftar_pada;
                        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                        successModal.show();


                        // Cek koneksi dengan printer thermal
                        if (navigator.serial) {
                            navigator.serial.requestPort().then(async (port) => {
                                await port.open({
                                    baudRate: 9600
                                });
                                const writer = port.writable.getWriter();
                                const text = `Nomor Antrian: ${response.data.nomor}\nLoket: ${response.data.loket}\nTerdaftar pada: ${response.data.terdaftar_pada}\n\n`;
                                await writer.write(new TextEncoder().encode(text));
                                writer.releaseLock();
                            }).catch((error) => {
                                console.error('Error requesting serial port:', error);
                            });
                        } else {
                            console.log('Tidak terhubung ke printer thermal');
                            alert('Tidak terhubung ke printer thermal');
                        }
                    } else {
                        // Tampilkan modal error jika gagal
                        document.getElementById('errorMessage').innerText = 'Gagal menambahkan antrian';
                        var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                        errorModal.show();
                    }
                }
            };
            xhr.send('action=antrianBaruPENDIS');
        });

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