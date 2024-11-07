<?php
session_start(); // Pastikan sesi dimulai

require_once 'model/detail_transaksi_model.php';

// Membuat instance dari ModelDetailTransaksi
$objDetailTransaksi = new ModelDetailTransaksi();

// TESTING-1: VIEW ALL DETAIL TRANSAKSI
echo "TESTING-1: VIEW ALL DETAIL TRANSAKSI<br>";
foreach ($objDetailTransaksi->getAllDetailTransaksi() as $detail) {
    echo "Detail ID: " . $detail->detail_id . "<br>";
    echo "Barang ID: " . $detail->barang_id->barang_id . "<br>";
    echo "Barang Nama: " . $detail->barang_id->barang_nama . "<br>";
    echo "Barang harga: " . $detail->barang_id->barang_harga . "<br>";
    echo "Jumlah: " . $detail->detail_jumlah . "<br>";
    echo "Subtotal: Rp" . number_format($detail->detail_subtotal, 2, ',', '.') . "<br><br>";
}
echo "<hr>";


