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
        <?php include 'includes/sidebar.php'; ?>

        <div class="flex-1 p-8">
            <div class="container mx-auto">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-900 text-white">
                            <tr>
                                <th class="py-3 px-4 font-semibold text-sm text-left">ID Transaksi</th>
                                <th class="py-3 px-4 font-semibold text-sm text-left">Customer</th>
                                <th class="py-3 px-4 font-semibold text-sm text-left">Kasir</th>
                                <th class="py-3 px-4 font-semibold text-sm text-left">Total</th>
                                <th class="py-3 px-4 font-semibold text-sm text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-gray-800">
                            <?php if (!empty($transaksis)) { ?>
                                <?php foreach ($transaksis as $transaksi) {
                                    $total = is_numeric($transaksi->transaksi_total) ? $transaksi->transaksi_total : 0; ?>
                                    <tr>
                                        <td class="py-3 px-4"><?php echo htmlspecialchars($transaksi->transaksi_id); ?></td>
                                        <td class="py-3 px-4"><?php echo htmlspecialchars($transaksi->user->username); ?></td>
                                        <td class="py-3 px-4"><?php echo htmlspecialchars($transaksi->user->role_name->role_name); ?></td>
                                        <td class="py-3 px-4"><?php echo 'Rp' . number_format($total, 2, ',', '.'); ?></td>
                                        <td class="py-3 px-4">
                                            <button
                                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-1 px-3 rounded"
                                                onclick="openModal('modal-<?php echo $transaksi->transaksi_id; ?>')">
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="5" class="text-center py-4">No transactions found.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk detail transaksi -->
    <?php if (!empty($transaksis)) {
        foreach ($transaksis as $transaksi) { ?>
            <div id="modal-<?php echo $transaksi->transaksi_id; ?>" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white rounded-lg shadow-xl w-3/4 max-w-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Detail Transaksi: <?php echo htmlspecialchars($transaksi->transaksi_id); ?></h3>
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                            <thead class="bg-gray-700 text-white">
                                <tr>
                                    <th class="py-2 px-4 font-semibold text-sm">Barang</th>
                                    <th class="py-2 px-4 font-semibold text-sm">Jumlah</th>
                                    <th class="py-2 px-4 font-semibold text-sm">Sub total</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 divide-y divide-gray-200">
                                <?php foreach ($transaksi->detail_transaksi as $detail) { ?>
                                    <tr class="text-center">
                                        <td class="py-2 px-4"><?php echo htmlspecialchars($detail->barang->barang_nama); ?></td>
                                        <td class="py-2 px-4"><?php echo htmlspecialchars($detail->detail_jumlah); ?></td>
                                        <td class="py-2 px-4"><?php echo htmlspecialchars($detail->detail_subtotal); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="mt-4 flex justify-end">
                            <button
                                class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded"
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