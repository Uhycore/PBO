<?php
include '../auth_cek.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <div class="flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <div class="flex-1 p-8">
            <div class="container mx-auto">
                <h2 class="text-2xl font-semibold text-gray-900 mb-6">Daftar Transaksi</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <?php if (!empty($transaksis)) { ?>
                        <?php foreach ($transaksis as $transaksi) {
                            $total = is_numeric($transaksi->transaksi_total) ? $transaksi->transaksi_total : 0; ?>
                            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                                <img src="views/includes/images/transaksi.jpg" style="width: 100%; max-width: 1000px;" />


                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-lg font-semibold text-gray-800"><?php echo htmlspecialchars($transaksi->transaksi_id); ?></span>
                                    <span class="text-gray-500 text-sm"><?php echo htmlspecialchars($transaksi->user->username); ?></span>
                                </div>
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-sm text-gray-500">Kasir:</span>
                                    <span class="text-gray-700 font-medium"><?php echo htmlspecialchars($transaksi->kasir->username); ?></span>
                                </div>
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-sm text-gray-500">Total:</span>
                                    <span class="text-indigo-600 font-semibold"><?php echo 'Rp' . number_format($total, 0, ',', '.'); ?></span>
                                </div>
                                <div class="text-center">
                                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg"
                                        onclick="openModal('modal-<?php echo $transaksi->transaksi_id; ?>')">View</button>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="col-span-full text-center py-4 text-gray-500">No transactions found.</div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk detail transaksi -->
    <?php if (!empty($transaksis)) {
        foreach ($transaksis as $transaksi) { ?>
            <div id="modal-<?php echo $transaksi->transaksi_id; ?>" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white rounded-lg shadow-xl w-3/4 max-w-lg animate__animated animate__fadeIn">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Detail Transaksi: <?php echo htmlspecialchars($transaksi->transaksi_id); ?></h3>
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                            <thead class="bg-gray-700 text-white">
                                <tr>
                                    <th class="py-3 px-4 text-sm font-medium">Barang</th>
                                    <th class="py-3 px-4 text-sm font-medium">Jumlah</th>
                                    <th class="py-3 px-4 text-sm font-medium">Sub total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-gray-700">
                                <?php foreach ($transaksi->detail_transaksi as $detail) { ?>
                                    <tr class="text-center">
                                        <td class="py-2 px-4"><?php echo htmlspecialchars($detail->barang->barang_nama); ?></td>
                                        <td class="py-2 px-4"><?php echo htmlspecialchars($detail->detail_jumlah); ?></td>
                                        <td class="py-2 px-4"><?php echo 'Rp' . number_format($detail->detail_subtotal, 0, ',', '.'); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="mt-4 flex justify-end">
                            <button
                                class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-lg"
                                onclick="closeModal('modal-<?php echo $transaksi->transaksi_id; ?>')">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    <?php }
    } ?>
</body>

</html>