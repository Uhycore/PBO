<?php
session_start();

require_once 'model/transaksi_model.php';


// Buat instance ModelTransaksi
$modelTransaksi = new ModelTransaksi();

// TESTING: VIEW ALL TRANSAKSI SEBELUM PENAMBAHAN
echo "<h3>TESTING: VIEW ALL TRANSAKSI SEBELUM PENAMBAHAN</h3>";
$allTransaksi = $modelTransaksi->getAllTransaksi();

if (count($allTransaksi) === 0) {
    echo "Belum ada transaksi.<br><br>";
} else {
    foreach ($allTransaksi as $transaksi) {
        echo "Transaksi ID: " . $transaksi->transaksi_id . "<br>";
        echo "User: " . $transaksi->user->username . "<br>";
        echo "User role: " . $transaksi->user->role_name->role_name . "<br>";
        echo "Total Transaksi: Rp" . number_format($transaksi->transaksi_total, 2, ',', '.') . "<br>";
        echo "Detail ID: " . $transaksi->detail_transaksi->detail_id . "<br>";
        echo "Barang: " . $transaksi->detail_transaksi->barang->barang_nama . "<br>";
        echo "Jumlah: " . $transaksi->detail_transaksi->detail_jumlah . "<br>";
        echo "Subtotal: Rp" . number_format($transaksi->detail_transaksi->detail_subtotal, 2, ',', '.') . "<br><br>";
    }
}
