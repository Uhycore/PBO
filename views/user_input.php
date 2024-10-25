<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input User</title>
    <link href="./Views/output.css" rel="stylesheet">
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
            <!-- Formulir Input Role -->
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Input Role</h2>
                <form action="MainEntryPoint.php?modul=user&fitur=add" method="POST">
                    <!-- Nama User -->
                    <div class="mb-4">
                        <label for="role_name" class="block text-gray-700 text-sm font-bold mb-2">Nama User:</label>
                        <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="nama user" required>
                    </div>

                    <!-- Username -->
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 text-sm font-bold mb-2">username:</label>
                        <input type="text" id="username" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="username user" required>
                    </div>

                    <!-- password -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">password:</label>
                        <input type="text" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="password user" required>
                    </div>

                    <!-- Role Status -->
                    <div class="mb-4">
                        <label for="role_status" class="block text-gray-700 text-sm font-bold mb-2">Role Name</label>
                        <select id="role_status" name="role_status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="">Pilih Status</option>
                            <?php foreach ($listRoleName as $rolename){ ?>
                            <option value=<?php echo htmlspecialchars($rolename)?>>
                                <?php echo htmlspecialchars($rolename)?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
