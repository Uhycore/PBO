<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Formulir Update Barang -->
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Update Barang</h2>
                <form action="index.php?modul=barang&fitur=update" method="POST">
                    <input type="hidden" id="barang_id" name="barang_id" value="<?php echo htmlspecialchars($obj_barang->barang_id); ?>">

                    <!-- Nama Barang -->
                    <div class="mb-4">
                        <label for="barang_nama" class="block text-gray-700 text-sm font-bold mb-2">Nama Barang:</label>
                        <input type="text" id="barang_nama" name="barang_nama"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required
                            value="<?php echo isset($obj_barang->barang_nama) ? htmlspecialchars($obj_barang->barang_nama) : ''; ?>"
                            placeholder="Masukkan Nama Barang">
                    </div>

                    <!-- Kategori -->
                    <div class="mb-4">
                        <label for="barang_kategori" class="block text-gray-700 text-sm font-bold mb-2">Kategori:</label>
                        <input type="text" id="barang_kategori" name="barang_kategori"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required
                            value="<?php echo isset($obj_barang->barang_kategori) ? htmlspecialchars($obj_barang->barang_kategori) : ''; ?>"
                            placeholder="Masukkan Kategori">
                    </div>

                    <!-- Stok -->
                    <div class="mb-4">
                        <label for="barang_stock" class="block text-gray-700 text-sm font-bold mb-2">Stok:</label>
                        <input type="number" id="barang_stock" name="barang_stock"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required
                            value="<?php echo isset($obj_barang->barang_stock) ? htmlspecialchars($obj_barang->barang_stock) : ''; ?>"
                            placeholder="Masukkan Stok">
                    </div>

                    <!-- Harga -->
                    <div class="mb-4">
                        <label for="barang_harga" class="block text-gray-700 text-sm font-bold mb-2">Harga:</label>
                        <input type="number" id="barang_harga" name="barang_harga"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required
                            value="<?php echo isset($obj_barang->barang_harga) ? htmlspecialchars($obj_barang->barang_harga) : ''; ?>"
                            placeholder="Masukkan Harga">
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label for="barang_description" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi:</label>
                        <textarea id="barang_description" name="barang_description"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Masukkan Deskripsi Barang" rows="3" required><?php echo isset($obj_barang->barang_description) ? htmlspecialchars($obj_barang->barang_description) : ''; ?></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>