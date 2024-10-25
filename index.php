<?php
require_once 'model/role_model.php';
require_once 'model/user_model.php';

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

            case 'delete':
                $role_id = $_POST['role_id'];
                $obj_roles->deleteRole($role_id);

                header("Location: index.php?modul=role");
                break;

            case 'edit':
                $role_id = $_GET['role_id'];
                $obj_roles = $obj_roles->getRoleById($role_id);
                include 'views/role_update.php';
                break;
            case 'update':
                $role_id = $_POST['role_id'];
                $role_name = $_POST['role_name'];
                $role_description = $_POST['role_description'];
                $role_status = $_POST['role_status'];

                $update_result = $obj_roles->updateRole($role_id, $role_name, $role_description, $role_status);

                if ($update_result) {
                    echo "<script>
                                alert('Data role berhasil diperbarui!');
                                window.location.href = 'index.php?modul=role'; 
                              </script>";
                } else {
                    echo "<script>
                                alert('Gagal memperbarui data role. Silakan coba lagi.');
                                window.location.href = 'index.php?modul=role&fitur=edit&role_id={$role_id}'; 
                              </script>";
                }
                exit;


            default:
                $Roles = $obj_roles->getAllRoles();
                include 'views/role_list.php';
                break;
        }
        break;
    case 'user':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $obj_user = new UserRole();

        switch ($fitur) {
            case 'add':
                break;

            default:

                $users = $obj_user->getAllUsers();

                include 'views/user_list.php';
                break;
        }
}
