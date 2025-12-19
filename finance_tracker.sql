CREATE TABLE `target_keuangan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nominal_target` decimal(15,2) NOT NULL
)

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `kategori` enum('Pemasukan','Pengeluaran') NOT NULL,
  `nominal` decimal(15,2) NOT NULL
)

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `target_dana` int(11) DEFAULT 0
)
