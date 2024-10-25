<?php
require_once 'model/role_model.php';
require_once 'model/user_model.php';

$userModel = new UserRole();

try {
    // Tambahkan pengguna dengan role yang tersedia
    $userModel->addUser("aril", "Admin");
    $userModel->addUser("budi", "User");
    $userModel->addUser("cici", "Admin");

    // Ambil semua user
    $users = $userModel->getAllUsers();
    foreach ($users as $user) {
        echo "User ID: " . $user->user_id . "<br>";
        echo "Username: " . $user->username . "<br>";
        echo "Role: " . $user->role->role_name . "<br>";
        echo "Role Description: " . $user->role->role_description . "<br><br>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
