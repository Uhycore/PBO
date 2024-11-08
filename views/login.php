<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="flex bg-white rounded-lg shadow-lg overflow-hidden max-w-5xl w-full">
        
        <!-- Sidebar Image -->
        <div class="hidden md:flex md:w-2/3 bg-cover bg-center" style="background-image: url('views/includes/images/transaksi1.jpg');"></div>

        <!-- Login Form -->
        <div class="w-full md:w-1/3 p-12 space-y-6">
            <h2 class="text-3xl font-bold text-center text-gray-800">Selamat datang</h2>
            <p class="text-sm text-center text-gray-500">di website </p>

            <?php if (isset($error)) { ?>
                <p class="text-red-500 text-center text-sm"><?= $error; ?></p>
            <?php } ?>

            <form action="" method="POST" class="space-y-4">
                <div>
                    <label for="username" class="block text-gray-600 font-medium">Username</label>
                    <input type="text" name="username" id="username" required
                        class="w-full mt-1 px-4 py-3 rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 text-gray-700">
                </div>

                <div>
                    <label for="password" class="block text-gray-600 font-medium">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full mt-1 px-4 py-3 rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 text-gray-700">
                </div>

                <button type="submit"
                    class="w-full py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition duration-150">
                    Login
                </button>
            </form>

        
        </div>
    </div>
</body>

</html>
