<?php
require_once 'model/role_model_composite.php';

$objRole = new Role_model();
$objRole->addRole("admin",  "untuk admin",  0);
$objRole->addRole("kasir",  "untuk kasir",  1);
$objRole->addRole("customer",  "untuk pengguna",  1);


foreach ($objRole->getRoles() as $role) {
    echo "role ID: " . $role->role_id . "<br>";
    echo "role Name: " . $role->role_name . "<br>";
    echo "role Deskripsi: " . $role->role_description . "<br>";
    echo "role Status: " . ($role->role_status ? "Actived" : "inactived") . "<br>";
    echo "<br>";
}
