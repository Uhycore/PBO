<?php

require_once 'model/role_model_inheritance.php';

$adminRoles = [
    new AdminRole("Admin", "Administrator dengan akses penuh", 30000),
    new AdminRole("Super Admin", "Admin dengan hak istimewa lebih", 20000),
    new AdminRole("Editor", "Admin yang mengelola konten", 10000),
];

foreach ($adminRoles as $admin) {
    $admin->displayRole();
}
?>

