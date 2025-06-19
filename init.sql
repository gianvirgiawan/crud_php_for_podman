CREATE DATABASE IF NOT EXISTS db_bioskop;

USE db_bioskop;

CREATE TABLE IF NOT EXISTS pemesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pelanggan VARCHAR(100) NOT NULL,
    judul_film VARCHAR(255) NOT NULL,
    jumlah_tiket INT NOT NULL,
    jadwal_tayang DATETIME NOT NULL,
    nomor_kursi VARCHAR(50) NOT NULL,
    total_harga DECIMAL(10, 2) NOT NULL,
    status_pembayaran ENUM('Belum Bayar', 'Lunas') NOT NULL DEFAULT 'Belum Bayar',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO pemesanan (nama_pelanggan, judul_film, jumlah_tiket, jadwal_tayang, nomor_kursi, total_harga, status_pembayaran) VALUES
('Budi Santoso', 'Dilan 1990', 2, '2025-07-20 19:00:00', 'C5, C6', 100000.00, 'Lunas'),
('Citra Lestari', 'Agak Laen', 4, '2025-07-21 21:00:00', 'E1, E2, E3, E4', 200000.00, 'Belum Bayar'),
('Adi Nugroho', 'Godzilla x Kong: The New Empire', 1, '2025-07-22 14:30:00', 'A1', 50000.00, 'Lunas');