
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Role</title>
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
            <!-- Your main content goes here -->
            <div class="container mx-auto">
                <!-- Button to Insert New Role -->
                <div class="mb-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <a href="MainEntryPoint.php?modul=role&fitur=add">Insert New Role</a>
                    </button>
                </div>

                <!-- Roles Table -->
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-full bg-white grid-cols-1">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">ID</th>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Harga</th> <!-- Ubah w-1/3 menjadi w-1/4 agar lebih proporsional -->
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Stok</th> <!-- Menyamakan ukuran Stok -->
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Status</th> <!-- Menyamakan ukuran Status -->
                                <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php foreach ($obj_barang as $barang) { ?>
                                <tr class="text-center">
                                    <td class="py-3 px-4 text-blue-600"><?php echo htmlspecialchars($barang->barang_id) ?></td>
                                    <td class="w-1/4 py-3 px-4"><?php echo htmlspecialchars($barang->barang_name) ?></td>
                                    <td class="w-1/4 py-3 px-4"><?php echo htmlspecialchars($barang->barang_harga) ?></td> <!-- Ubah w-1/3 menjadi w-1/4 -->
                                    <td class="w-1/4 py-3 px-4"><?php echo htmlspecialchars($barang->barang_stok) ?></td> <!-- Menyamakan ukuran Stok -->
                                    <td class="w-1/4 py-3 px-4"><?php echo htmlspecialchars($barang->barang_status ? "Ada" : "Kosong") ?></td> <!-- Menyamakan ukuran Status -->
                                    <td class="w-1/6 py-3 px-4 flex justify-between"> <!-- Menggunakan flexbox dan justify-between -->
                                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">
                                            <a href="update.php?id=<?php echo $barang->barang_id ?>">Update</a>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2">
                                            <a href="delete.php?id=<?php echo $barang->barang_id ?>">Delete</a>
                                        </button>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

</body>

</html>