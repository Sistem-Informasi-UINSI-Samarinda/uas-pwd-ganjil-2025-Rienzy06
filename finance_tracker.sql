-- 1. Buat Database
CREATE DATABASE IF NOT EXISTS db_trackfinance;
USE db_trackfinance;

-- 2. Tabel Users
CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(100) NOT NULL,
  password varchar(255) NOT NULL,
  role enum('admin','user') DEFAULT 'user',
  target_dana int(11) DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Tabel Target Keuangan
CREATE TABLE target_keuangan (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) DEFAULT NULL,
  nominal_target decimal(15,2) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_target_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4. Tabel Transaksi
CREATE TABLE transaksi (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) DEFAULT NULL,
  tanggal date NOT NULL,
  keterangan varchar(255) DEFAULT NULL,
  kategori enum('Pemasukan','Pengeluaran') NOT NULL,
  nominal decimal(15,2) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_transaksi_user FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;