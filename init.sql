-- Membuat database jika belum ada
CREATE DATABASE IF NOT EXISTS db_akademik;

-- Menggunakan database
USE db_akademik;

-- DDL: Membuat tabel matakuliah
CREATE TABLE IF NOT EXISTS matakuliah (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_mk VARCHAR(10) NOT NULL UNIQUE,
    nama_mk VARCHAR(100) NOT NULL,
    sks INT NOT NULL
);

-- DML: Memasukkan minimal 2 record data awal
INSERT INTO matakuliah (kode_mk, nama_mk, sks) VALUES
('DO188', 'Cloud Computing Platform', 3),
('CS201', 'Basis Data Lanjut', 3)
ON DUPLICATE KEY UPDATE kode_mk=kode_mk; -- Mencegah error jika data sudah ada