CREATE DATABASE perpustakaan;

USE perpustakaan;

CREATE TABLE buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_buku VARCHAR(20),
    judul_buku VARCHAR(100), 
    stok INT,
    sinopsis TEXT, 
    status_pinjam ENUM('Tersedia', 'Dipinjam'),
    kategori VARCHAR(30)
);

INSERT INTO buku (kode_buku, judul_buku, stok, sinopsis, status_pinjam, kategori)

('B001', 'Harimau berburu Kancil', 5, 'Buku ini menceritakan ketakutan Kancil dengan Harimau.', 'Tersedia', 'Komik')
('B002', 'Kancil dan Buaya', 3, 'Kancil yang cerdik mengelabui Buaya.', 'Tersedia', 'Komik')
('B003', 'Kancil dan Singa', 2, 'Kancil yang cerdik mengelabui Singa.', 'Tersedia', 'Komik')
('B004', 'Kancil dan Harimau', 4, 'Kancil yang cerdik mengelabui Harimau.', 'Tersedia', 'Komik')
('B005', 'Kancil dan Gajah', 1, 'Kancil yang cerdik mengelabui Gajah.', 'Tersedia', 'Komik');