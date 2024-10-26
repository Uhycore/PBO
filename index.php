<?php
require_once 'model/role_model.php';
require_once 'model/user_model.php';

session_start();

if (isset($_GET['modul'])) {
    $modul = $_GET['modul'];
} else {
    $modul = 'dashboard';
}

$obj_roles = new ModelRole();
$obj_user = new UserRole();
switch ($modul) {

    case 'dashboard':
        include 'views/kosong.php';
        break;

    case 'role':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;

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



        switch ($fitur) {
            case 'input':
                $users = $obj_user->getAllUsers();
                $listRoleName = $obj_roles->getAllRoles();

                include 'views/user_input.php';
                break;
            case 'add':

                $username = $_POST['username'];
                $role_name = $_POST['role_name'];
                $obj_user->addUser($username, $role_name);
                // Redirect after processing the form
                header("Location: index.php?modul=user");
                break;

            case 'delete':
                $user_id = $_POST['user_id'];
                $obj_user->deleteUser($user_id);

                header("Location: index.php?modul=user");
                break;

            case 'edit':
                $user_id = $_GET['user_id'];
                $obj_user = $obj_user->getUserById($user_id);
                $listRoleName = $obj_roles->getAllRoles();
                include 'views/user_update.php';
                break;
            case 'update':
                $user_id = $_POST['user_id'];
                $username = $_POST['username'];
                $role_name = $_POST['role_name']; 

                $update_result = $obj_user->updateUser($user_id, $username, $role_name);

                if ($update_result) {
                    echo "<script>
                                    alert('Data user berhasil diperbarui!');
                                    window.location.href = 'index.php?modul=user'; 
                                  </script>";
                } else {
                    echo "<script>
                                    alert('Gagal memperbarui data user. Silakan coba lagi.');
                                    window.location.href = 'index.php?modul=user&fitur=edit&user_id={$user_id}'; 
                                  </script>";
                }
                break;



            default:

                $users = $obj_user->getAllUsers();




                include 'views/user_list.php';
                break;
        }
}
