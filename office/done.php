<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require '../functions.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

$result = getAntrianById($id);
$antrian = mysqli_num_rows($result);
if ($antrian === 0) {
    header("Location: index.php");
}

$antrian = mysqli_fetch_array($result);
if ($antrian['status'] !== "Process") {
    header("Location: index.php");
}

mysqli_query($conn, "UPDATE antrian SET status='Success' WHERE id='$id'");
echo '<script>alert("Antrian Selesai"); window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
