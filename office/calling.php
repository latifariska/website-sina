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
    exit();
}

$antrian = mysqli_fetch_array($result);
if ($antrian['loket'] === "PHU") {
    echo "<script>
        var utterance1 = new SpeechSynthesisUtterance();
        utterance1.text = \"Nomor antrian. " . $antrian['nomor'][0] . "--- " . $antrian['nomor'][1] . "-" . $antrian['nomor'][2] . "-" . $antrian['nomor'][3] . ".---" . " Silahkan menuju loket " . $antrian['loket'][0] . "-" . $antrian['loket'][1] . "-" . $antrian['loket'][2] . "\";
        utterance1.lang = \"id-ID\";
        utterance1.rate = 0.8;

        window.speechSynthesis.speak(utterance1);
</script>";
} else {
    echo "<script>
        var utterance1 = new SpeechSynthesisUtterance();
        utterance1.text = \"Nomor antrian. " . $antrian['nomor'][0] . "--- " . $antrian['nomor'][1] . "-" . $antrian['nomor'][2] . "-" . $antrian['nomor'][3] . ".---" . " Silahkan menuju loket " . $antrian['loket'] . "\";
        utterance1.lang = \"id-ID\";
        utterance1.rate = 0.8;

        window.speechSynthesis.speak(utterance1);
</script>";
}

if ($antrian['status'] !== "Pending") {
    if ($antrian['status'] !== "Calling") {
        header("Location: index.php");
        exit();
    }
}

mysqli_query($conn, "UPDATE antrian SET status='Calling' WHERE id='$id'");
echo '<script>alert("Memanggil Antrian"); window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
