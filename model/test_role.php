<?php

require_once 'role_model.php';

$roleModel = new Role_model();

$roleModel->initializeDefaultRole();

$allRoles = $roleModel->getRoles();

foreach ($objRole->getRoles() as $role) {
    echo "role ID: " . $role->role_id . "<br>";
}
