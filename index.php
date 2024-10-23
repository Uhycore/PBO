<?php
require_once 'model/role_model.php';
session_start();

if (isset($_GET['modul'])) {
    $modul = $_GET['modul'];
} else {
    $modul = 'dashboard';
}

switch ($modul) {
    case 'dashboard':
        include 'views/kosong.php';
        break;

    case 'role':

        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $obj_roles = new ModelRole();

        switch ($fitur) {
            case 'add':
                $role_name = $_POST['role_name'];
                $role_description = $_POST['role_description'];
                $role_status = $_POST['role_status'];
                $obj_roles->addRole($role_name, $role_description, $role_status);
                // Redirect after processing the form
                header("Location: index.php?modul=role");


                echo "Data role ditambahkan";

                break;

            default:
                $Roles = $obj_roles->getAllRoles();
                include 'views/role_list.php';
                break;
        }
        break;
}
