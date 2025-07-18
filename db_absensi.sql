CREATE DATABASE IF NOT EXISTS db_absensi;
USE db_absensi;

CREATE TABLE absensi (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100),
  jabatan VARCHAR(100),
  status ENUM('Hadir','Izin','Sakit','Alpha'),
  tanggal DATE
);
