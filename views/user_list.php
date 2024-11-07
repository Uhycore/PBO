<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama User</title>
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
                <div class="mb-4">
                    <a href="index.php?modul=user&fitur=input" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Insert New User
                    </a>
                </div>

                <!-- User Table -->
                <div class="bg-white shadow-md rounded my-6 overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">User ID</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Username</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">password</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Role Name</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Role Description</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Role Status</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php if (!empty($users)) {
                                foreach ($users as $user) { ?>
                                    <tr class="text-center hover:bg-gray-100 transition duration-200">
                                        <td class="py-3 px-4 text-blue-600">
                                            <?php echo htmlspecialchars($user->user_id); ?>
                                        </td>
                                        <td class="py-3 px-4">
                                            <?php echo htmlspecialchars($user->username); ?>
                                        </td>
                                        </td>
                                        <td class="py-3 px-4">
                                            <?php echo htmlspecialchars($user->password); ?>
                                        </td>
                                        <td class="py-3 px-4">
                                            <?php echo htmlspecialchars($user->role_name->role_name); ?>
                                        </td>
                                        <td class="py-3 px-4">
                                            <?php echo htmlspecialchars($user->role_name->role_description); ?>
                                        </td>
                                        <td class="py-3 px-4">
                                            <?php echo htmlspecialchars($user->role_name->role_status ? "Active" : "Inactive"); ?>
                                        </td>
                                        <td class="py-3 px-4">
                                            <a href="index.php?modul=user&fitur=edit&user_id=<?php echo htmlspecialchars($user->user_id); ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">
                                                Update
                                            </a>
                                            <form action="index.php?modul=user&fitur=delete" method="POST" class="inline-block">
                                                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user->user_id); ?>">
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="6" class="text-center py-4">No users found.</td>
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