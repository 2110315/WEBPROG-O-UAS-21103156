CREATE DATABASE IF NOT EXISTS catatanharian;
USE catatanharian;

CREATE TABLE catatan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(100) NOT NULL,
    isi TEXT NOT NULL,
    tanggal DATE NOT NULL
);