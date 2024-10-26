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
            <div class="container mx-auto">
                <!-- Button to Insert New Role -->
                <div class="mb-4">
                    <a href="index.php?modul=role&fitur=input" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Insert New Role
                    </a>
                </div>

                <!-- Roles Table -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">Role ID</th>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Role Name</th>
                                <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Role Description</th>
                                <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Role Status</th>
                                <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php foreach ($Roles as $role) { ?>
                                <tr class="text-center border-b hover:bg-gray-100 transition duration-200">
                                    <td class="py-3 px-4 text-blue-600"><?php echo htmlspecialchars($role->role_id) ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($role->role_name) ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($role->role_description) ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($role->role_status ? "Active" : "Inactive") ?></td>
                                    <td class="py-3 px-4 space-x-2">
                                        <form action="index.php?modul=role&fitur=edit&role_id=<?= $role->role_id ?>" method="POST" class="inline">
                                            <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-3 rounded">
                                                Update
                                            </button>
                                        </form>
                                        <form action="index.php?modul=role&fitur=delete" method="POST" class="inline">
                                            <input type="hidden" name="role_id" value="<?php echo $role->role_id; ?>">
                                            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">
                                                Delete
                                            </button>
                                        </form>
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