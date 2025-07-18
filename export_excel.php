<?php
include 'koneksi.php';
$bulan = $_GET['bulan'];
header("Content-Type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=absensi_$bulan.xls");

$query = "SELECT * FROM absensi WHERE DATE_FORMAT(tanggal, '%Y-%m') = '$bulan'";
$result = mysqli_query($conn, $query);

echo "<table border='1'>
<tr><th>Nama</th><th>Jabatan</th><th>Status</th><th>Tanggal</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['nama']}</td>
        <td>{$row['jabatan']}</td>
        <td>{$row['status']}</td>
        <td>{$row['tanggal']}</td>
    </tr>";
}
echo "</table>";
?>
