<?php
date_default_timezone_set('Asia/Jakarta');
$conn = mysqli_connect('localhost', 'root', '', 'sina');

if (isset($_POST['action']) && $_POST['action'] === 'antrianBaruPHU') {
    // Fungsi untuk menambah antrian baru PHU
    function antrianBaruPHU($conn)
    {
        // Mengambil data antrian terakhir
        $antrianPHU = mysqli_query($conn, "SELECT * FROM antrian WHERE loket='PHU' ORDER BY id DESC LIMIT 1");

        if (mysqli_num_rows($antrianPHU) === 0) {
            $nomor = 1;
        } else {
            $row = mysqli_fetch_assoc($antrianPHU);
            $nomorInt = intval(preg_replace('/[^0-9]+/', '', $row['nomor']));
            if ($nomorInt === 999) {
                $nomor = 1;
            } else {
                $nomor = $nomorInt + 1;
            }
        }

        $nomor = 'H' . str_pad($nomor, 3, '0', STR_PAD_LEFT);
        $loket = 'PHU';
        $status = 'Pending';
        $terdaftar_pada = date('Y-m-d H:i:s', time());

        // Masukkan data ke database
        $query = "INSERT INTO antrian (nomor, loket, status, terdaftar_pada) VALUES ('$nomor', '$loket', '$status', '$terdaftar_pada')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Berhasil, kirim respons ke klien
            echo json_encode([
                'success' => true,
                'data' => [
                    'nomor' => $nomor,
                    'loket' => $loket,
                    'status' => $status,
                    'terdaftar_pada' => $terdaftar_pada
                ]
            ]);
        } else {
            // Gagal, kirim respons ke klien
            echo json_encode(['success' => false]);
        }
    }

    // Panggil fungsi antrianBaruPHU
    antrianBaruPHU($conn);
}

if (isset($_POST['action']) && $_POST['action'] === 'antrianBaruSEKJEN') {
    // Fungsi untuk menambah antrian baru SEKJEN
    function antrianBaruSEKJEN($conn)
    {
        // Mengambil data antrian terakhir
        $antrianSEKJEN = mysqli_query($conn, "SELECT * FROM antrian WHERE loket='SEKJEN' ORDER BY id DESC LIMIT 1");

        if (mysqli_num_rows($antrianSEKJEN) === 0) {
            $nomor = 1;
        } else {
            $row = mysqli_fetch_assoc($antrianSEKJEN);
            $nomorInt = intval(preg_replace('/[^0-9]+/', '', $row['nomor']));
            if ($nomorInt === 999) {
                $nomor = 1;
            } else {
                $nomor = $nomorInt + 1;
            }
        }

        $nomor = 'S' . str_pad($nomor, 3, '0', STR_PAD_LEFT);
        $loket = 'SEKJEN';
        $status = 'Pending';
        $terdaftar_pada = date('Y-m-d H:i:s', time());

        // Masukkan data ke database
        $query = "INSERT INTO antrian (nomor, loket, status, terdaftar_pada) VALUES ('$nomor', '$loket', '$status', '$terdaftar_pada')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Berhasil, kirim respons ke klien
            echo json_encode([
                'success' => true,
                'data' => [
                    'nomor' => $nomor,
                    'loket' => $loket,
                    'status' => $status,
                    'terdaftar_pada' => $terdaftar_pada
                ]
            ]);
        } else {
            // Gagal, kirim respons ke klien
            echo json_encode(['success' => false]);
        }
    }

    // Panggil fungsi antrianBaruSEKJEN
    antrianBaruSEKJEN($conn);
}

if (isset($_POST['action']) && $_POST['action'] === 'antrianBaruBIMAS') {
    // Fungsi untuk menambah antrian baru BIMAS
    function antrianBaruBIMAS($conn)
    {
        // Mengambil data antrian terakhir
        $antrianBIMAS = mysqli_query($conn, "SELECT * FROM antrian WHERE loket='BIMAS' ORDER BY id DESC LIMIT 1");

        if (mysqli_num_rows($antrianBIMAS) === 0) {
            $nomor = 1;
        } else {
            $row = mysqli_fetch_assoc($antrianBIMAS);
            $nomorInt = intval(preg_replace('/[^0-9]+/', '', $row['nomor']));
            if ($nomorInt === 999) {
                $nomor = 1;
            } else {
                $nomor = $nomorInt + 1;
            }
        }

        $nomor = 'B' . str_pad($nomor, 3, '0', STR_PAD_LEFT);
        $loket = 'BIMAS';
        $status = 'Pending';
        $terdaftar_pada = date('Y-m-d H:i:s', time());

        // Masukkan data ke database
        $query = "INSERT INTO antrian (nomor, loket, status, terdaftar_pada) VALUES ('$nomor', '$loket', '$status', '$terdaftar_pada')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Berhasil, kirim respons ke klien
            echo json_encode([
                'success' => true,
                'data' => [
                    'nomor' => $nomor,
                    'loket' => $loket,
                    'status' => $status,
                    'terdaftar_pada' => $terdaftar_pada
                ]
            ]);
        } else {
            // Gagal, kirim respons ke klien
            echo json_encode(['success' => false]);
        }
    }

    // Panggil fungsi antrianBaruBIMAS
    antrianBaruBIMAS($conn);
}

if (isset($_POST['action']) && $_POST['action'] === 'antrianBaruPENDIS') {
    // Fungsi untuk menambah antrian baru PENDIS
    function antrianBaruPENDIS($conn)
    {
        // Mengambil data antrian terakhir
        $antrianPENDIS = mysqli_query($conn, "SELECT * FROM antrian WHERE loket='PENDIS' ORDER BY id DESC LIMIT 1");

        if (mysqli_num_rows($antrianPENDIS) === 0) {
            $nomor = 1;
        } else {
            $row = mysqli_fetch_assoc($antrianPENDIS);
            $nomorInt = intval(preg_replace('/[^0-9]+/', '', $row['nomor']));
            if ($nomorInt === 999) {
                $nomor = 1;
            } else {
                $nomor = $nomorInt + 1;
            }
        }

        $nomor = 'P' . str_pad($nomor, 3, '0', STR_PAD_LEFT);
        $loket = 'PENDIS';
        $status = 'Pending';
        $terdaftar_pada = date('Y-m-d H:i:s', time());

        // Masukkan data ke database
        $query = "INSERT INTO antrian (nomor, loket, status, terdaftar_pada) VALUES ('$nomor', '$loket', '$status', '$terdaftar_pada')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Berhasil, kirim respons ke klien
            echo json_encode([
                'success' => true,
                'data' => [
                    'nomor' => $nomor,
                    'loket' => $loket,
                    'status' => $status,
                    'terdaftar_pada' => $terdaftar_pada
                ]
            ]);
        } else {
            // Gagal, kirim respons ke klien
            echo json_encode(['success' => false]);
        }
    }

    // Panggil fungsi antrianBaruPENDIS
    antrianBaruPENDIS($conn);
}

function register($data)
{
    global $conn;

    $name = htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8');
    $username = strtolower(htmlspecialchars($data['username'], ENT_QUOTES, 'UTF-8'));
    $user = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    if (mysqli_num_rows($user) > 0) {
        return 200; // GAGAL! USER TELAH TERDAFTAR
    }

    $password = $data['password'];
    $confirmPassword = $data['confirmPassword'];

    if ($password !== $confirmPassword) {
        return 300; // PASSWORD DAN CONFIRM PASSWORD TIDAK MATCH
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES ('', '$name', '$username', '$password', 2)");
    return 400; // SUCCESS
}

function login($data)
{
    global $conn;

    $username = strtolower(htmlspecialchars($data['username'], ENT_QUOTES, 'UTF-8'));
    $user = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    if (mysqli_num_rows($user) === 0) {
        return 200; // GAGAL! USER TIDAK TERDAFTAR
    }

    $user = mysqli_fetch_assoc($user);

    $password = $data['password'];

    if (!password_verify($password, $user['password'])) {
        return 300; // PASSWORD SALAH
    }

    return 400; // SUCCESS
}

function getAntrianPHU()
{
    global $conn;

    $antrian = mysqli_query($conn, "SELECT * FROM antrian WHERE loket='PHU' AND (status='Pending' OR status='Process' OR status='Calling')");
    return $antrian;
}

function getAntrianSEKJEN()
{
    global $conn;

    $antrian = mysqli_query($conn, "SELECT * FROM antrian WHERE loket='SEKJEN' AND (status='Pending' OR status='Process' OR status='Calling')");
    return $antrian;
}

function getAntrianBIMAS()
{
    global $conn;

    $antrian = mysqli_query($conn, "SELECT * FROM antrian WHERE loket='BIMAS' AND (status='Pending' OR status='Process' OR status='Calling')");
    return $antrian;
}

function getAntrianPENDIS()
{
    global $conn;

    $antrian = mysqli_query($conn, "SELECT * FROM antrian WHERE loket='PENDIS' AND (status='Pending' OR status='Process' OR status='Calling')");
    return $antrian;
}

function getAntrianById($id)
{
    global $conn;

    $antrian = mysqli_query($conn, "SELECT * FROM antrian WHERE id='$id'");
    return $antrian;
}

function getRekabPHU()
{
    global $conn;

    $antrian = mysqli_query($conn, "SELECT * FROM antrian WHERE loket='PHU' AND (status='Success' OR status='Skip')");
    return $antrian;
}

function getRekabSEKJEN()
{
    global $conn;

    $antrian = mysqli_query($conn, "SELECT * FROM antrian WHERE loket='SEKJEN' AND (status='Success' OR status='Skip')");
    return $antrian;
}

function getRekabBIMAS()
{
    global $conn;

    $antrian = mysqli_query($conn, "SELECT * FROM antrian WHERE loket='BIMAS' AND (status='Success' OR status='Skip')");
    return $antrian;
}

function getRekabPENDIS()
{
    global $conn;

    $antrian = mysqli_query($conn, "SELECT * FROM antrian WHERE loket='PENDIS' AND (status='Success' OR status='Skip')");
    return $antrian;
}

function getRekabAll()
{
    global $conn;

    $antrian = mysqli_query($conn, "SELECT * FROM antrian WHERE (status='Success' OR status='Skip')");
    return $antrian;
}

if (isset($_GET['action'])) {
    function getInfoPHU()
    {
        global $conn;

        $antrian = mysqli_query($conn, "SELECT nomor FROM antrian WHERE loket='PHU' AND (status='Process' OR status='Calling')");
        if (mysqli_num_rows($antrian) > 0) {
            $row = mysqli_fetch_assoc($antrian);
            $output = $row['nomor'];
        } else {
            $output = "-";
        }

        return $output;
    }

    // Jika action adalah getAntrianPHU, kembalikan nomor PHU
    if ($_GET['action'] == 'getInfoPHU') {
        echo getInfoPHU();
    }
}

if (isset($_GET['action'])) {
    function getInfoSEKJEN()
    {
        global $conn;

        $antrian = mysqli_query($conn, "SELECT nomor FROM antrian WHERE loket='SEKJEN' AND (status='Process' OR status='Calling')");
        if (mysqli_num_rows($antrian) > 0) {
            $row = mysqli_fetch_assoc($antrian);
            $output = $row['nomor'];
        } else {
            $output = "-";
        }

        return $output;
    }

    // Jika action adalah getAntrianSEKJEN, kembalikan nomor SEKJEN
    if ($_GET['action'] == 'getInfoSEKJEN') {
        echo getInfoSEKJEN();
    }
}

if (isset($_GET['action'])) {
    function getInfoBIMAS()
    {
        global $conn;

        $antrian = mysqli_query($conn, "SELECT nomor FROM antrian WHERE loket='BIMAS' AND (status='Process' OR status='Calling')");
        if (mysqli_num_rows($antrian) > 0) {
            $row = mysqli_fetch_assoc($antrian);
            $output = $row['nomor'];
        } else {
            $output = "-";
        }

        return $output;
    }

    // Jika action adalah getAntrianBIMAS, kembalikan nomor BIMAS
    if ($_GET['action'] == 'getInfoBIMAS') {
        echo getInfoBIMAS();
    }
}

if (isset($_GET['action'])) {
    function getInfoPENDIS()
    {
        global $conn;

        $antrian = mysqli_query($conn, "SELECT nomor FROM antrian WHERE loket='PENDIS' AND (status='Process' OR status='Calling')");
        if (mysqli_num_rows($antrian) > 0) {
            $row = mysqli_fetch_assoc($antrian);
            $output = $row['nomor'];
        } else {
            $output = "-";
        }

        return $output;
    }

    // Jika action adalah getAntrianPENDIS, kembalikan nomor PENDIS
    if ($_GET['action'] == 'getInfoPENDIS') {
        echo getInfoPENDIS();
    }
}
