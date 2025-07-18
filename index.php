<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Absensi Karyawan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Form Absensi Karyawan</h2>
  <form action="simpan_absen.php" method="POST">
    <label>Nama:</label>
    <input type="text" name="nama" required>
    
    <label>Jabatan:</label>
    <input type="text" name="jabatan" required>

    <label>Status:</label>
    <select name="status" required>
      <option value="Hadir">Hadir</option>
      <option value="Izin">Izin</option>
      <option value="Sakit">Sakit</option>
      <option value="Alpha">Alpha</option>
    </select>

    <button type="submit">Absen</button>
  </form>

  <hr>
  <h3>Rekap Absensi Bulan Ini</h3>
  <form method="GET">
    <label>Pilih Bulan:</label>
    <input type="month" name="bulan" value="<?= date('Y-m') ?>">
    <button type="submit">Tampilkan</button>
  </form>

  <?php
  $bulan = isset($_GET['bulan']) ? $_GET['bulan'] : date('Y-m');
  $query = "SELECT * FROM absensi WHERE DATE_FORMAT(tanggal, '%Y-%m') = '$bulan'";
  $result = mysqli_query($conn, $query);
  ?>

  <table border="1" cellpadding="10" style="margin-top:10px;">
    <tr>
      <th>Nama</th>
      <th>Jabatan</th>
      <th>Status</th>
      <th>Tanggal</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
      <td><?= $row['nama'] ?></td>
      <td><?= $row['jabatan'] ?></td>
      <td><?= $row['status'] ?></td>
      <td><?= $row['tanggal'] ?></td>
    </tr>
    <?php endwhile; ?>
  </table>

  <br>
  <form action="export_excel.php" method="GET">
    <input type="hidden" name="bulan" value="<?= $bulan ?>">
    <button type="submit">Download Excel</button>
  </form>
</body>
</html>
