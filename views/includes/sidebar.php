<div class="w-52 h-screen bg-gray-900 text-gray-200 shadow-lg">
    <div class="p-5 font-semibold text-lg text-white border-b border-gray-800">
        Menu
    </div>
    <ul class="mt-4">
        <li class="group">
            <a href="index.php?modul=role" class="flex items-center px-4 py-2 text-sm transition duration-200 hover:bg-gray-800 hover:text-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-blue-400 transition duration-200 group-hover:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Master Data Role</span>
            </a>
        </li>
        <li class="group">
            <a href="index.php?modul=user" class="flex items-center px-4 py-2 text-sm transition duration-200 hover:bg-gray-800 hover:text-green-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-green-400 transition duration-200 group-hover:text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9 5-9-5 9 5z" />
                </svg>
                <span>Master Data User</span>
            </a>
        </li>
        <li class="group">
            <a href="index.php?modul=barang" class="flex items-center px-4 py-2 text-sm transition duration-200 hover:bg-gray-800 hover:text-purple-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-purple-400 transition duration-200 group-hover:text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0l4-4m-4 4l4 4" />
                </svg>
                <span>Data Barang</span>
            </a>
        </li>
        <li class="group">
            <div class="flex items-center px-4 py-2 text-sm transition duration-200 hover:bg-gray-800 hover:text-yellow-400 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-yellow-400 transition duration-200 group-hover:text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Menu Transaksi</span>
            </div>
            <ul class="ml-8 mt-2 space-y-1 hidden group-hover:block">
                <li class="px-4 py-1 text-sm hover:bg-gray-800 hover:text-gray-300 transition duration-200 cursor-pointer rounded">
                    <a href="#">Insert Transaksi</a>
                </li>
                <li class="px-4 py-1 text-sm hover:bg-gray-800 hover:text-gray-300 transition duration-200 cursor-pointer rounded">
                    <a href="#">List Transaksi</a>
                </li>
            </ul>
        </li>
    </ul>
</div>