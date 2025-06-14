CREATE DATABASE IF NOT EXISTS db_akademik;

USE db_akademik;

CREATE TABLE IF NOT EXISTS matakuliah (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_mk VARCHAR(10) NOT NULL UNIQUE,
    nama_mk VARCHAR(50) NOT NULL,
    sks INT NOT NULL
);

INSERT INTO matakuliah (kode_mk, nama_mk, sks) VALUES
('DO188', 'Cloud Computing', 3),
('RH294', 'Pemrograman Sistem Jaringan', 3)
ON DUPLICATE KEY UPDATE kode_mk=kode_mk;