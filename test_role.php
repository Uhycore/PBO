<?php

require_once 'model/role_model.php';

// Create an instance of the Role Model
$objRole = new ModelRole();

// TESTING-1: VIEW ALL ROLES
echo "TESTING-1: VIEW ALL ROLES<br>";
foreach ($objRole->getAllRoles() as $role) {
    echo "Role ID: " . $role->role_id . "<br>";
    echo "Role Name: " . $role->role_name . "<br>";
    echo "Role Description: " . $role->role_description . "<br>";
    echo "Role Status: " . ($role->role_status == 1 ? "Active" : "Inactive") . "<br><br>";
}
echo "<hr>";

// TESTING-2: ADD NEW ROLE
echo "TESTING-2: ADD NEW ROLE<br>";
$objRole->addRole("New Role", "Testing new role", 1);
echo "New role added successfully.<br>";

foreach ($objRole->getAllRoles() as $role) {
    echo "Role ID: " . $role->role_id . "<br>";
    echo "Role Name: " . $role->role_name . "<br>";
    echo "Role Description: " . $role->role_description . "<br>";
    echo "Role Status: " . ($role->role_status == 1 ? "Active" : "Inactive") . "<br><br>";
}
echo "<hr>";

// TESTING-3: UPDATE ROLE
echo "TESTING-3: UPDATE ROLE<br>";
$objRole->updateRole(1, "Updated Role", "Role has been updated", 1);
echo "Role updated successfully.<br>";

// View updated role data
foreach ($objRole->getAllRoles() as $role) {
    echo "Role ID: " . $role->role_id . "<br>";
    echo "Role Name: " . $role->role_name . "<br>";
    echo "Role Description: " . $role->role_description . "<br>";
    echo "Role Status: " . ($role->role_status == 1 ? "Active" : "Inactive") . "<br><br>";
}
echo "<hr>";

// TESTING-4: DELETE A ROLE
echo "TESTING-4: DELETE A ROLE<br>";
$objRole->deleteRole(1);
echo "Role deleted successfully.<br>";


foreach ($objRole->getAllRoles() as $role) {
    echo "Role ID: " . $role->role_id . "<br>";
    echo "Role Name: " . $role->role_name . "<br>";
    echo "Role Description: " . $role->role_description . "<br>";
    echo "Role Status: " . ($role->role_status == 1 ? "Active" : "Inactive") . "<br><br>";
}

echo "<hr>";
