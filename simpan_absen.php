<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$status = $_POST['status'];
$tanggal = date("Y-m-d");

$sql = "INSERT INTO absensi (nama, jabatan, status, tanggal)
        VALUES ('$nama', '$jabatan', '$status', '$tanggal')";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
} else {
    echo "Gagal menyimpan data!";
}
?>