<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <div class="flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="container mx-auto">
                <!-- Button to Insert New Barang -->
                <div class="mb-4">
                    <a href="index.php?modul=barang&fitur=input" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Insert New Barang
                    </a>
                </div>

                <!-- Barang Table -->
                <div class="bg-white shadow-md rounded my-6 overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-3 px-2 text-center uppercase font-semibold text-sm">Barang ID</th>
                                <th class="py-3 px-4 text-center uppercase font-semibold text-sm">Barang Name</th>
                                <th class="py-3 px-4 text-center uppercase font-semibold text-sm">Kategori</th>
                                <th class="py-3 px-4 text-center uppercase font-semibold text-sm">Stok</th>
                                <th class="py-3 px-4 text-center uppercase font-semibold text-sm">Harga</th>
                                <th class="py-3 px-4 text-center uppercase font-semibold text-sm">Deskripsi</th>
                                <th class="py-3 px-2 text-center uppercase font-semibold text-sm">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php if (!empty($Barangs)) {
                                foreach ($Barangs as $barang) { ?>
                                    <tr class="text-center hover:bg-gray-100">
                                        <td class="py-3 px-2 text-blue-600"><?php echo htmlspecialchars($barang->barang_id); ?></td>
                                        <td class="py-3 px-4"><?php echo htmlspecialchars($barang->barang_nama); ?></td>
                                        <td class="py-3 px-4"><?php echo htmlspecialchars($barang->barang_kategori); ?></td>
                                        <td class="py-3 px-4"><?php echo htmlspecialchars($barang->barang_stock); ?></td>
                                        <td class="py-3 px-4"> Rp. <?php echo htmlspecialchars($barang->barang_harga); ?></td>
                                        <td class="py-3 px-6"><?php echo htmlspecialchars($barang->barang_description); ?></td>
                                        <td class="py-3 px-2 flex justify-center space-x-1">
                                            <form action="index.php?modul=barang&fitur=edit&barang_id=<?= $barang->barang_id ?>" method="POST" class="inline">
                                                <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-3 rounded">
                                                    Update
                                                </button>
                                            </form>
                                            <form action="index.php?modul=barang&fitur=delete" method="POST" class="inline">
                                                <input type="hidden" name="barang_id" value="<?php echo $barang->barang_id; ?>">
                                                <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="6" class="text-center py-4">Barang e sold out</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>

</html>