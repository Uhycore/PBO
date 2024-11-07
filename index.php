<?php
require_once 'model/role_model.php';
require_once 'model/user_model.php';
require_once 'model/barang_model.php';
require_once 'model/transaksi_model.php';
require_once 'model/detail_transaksi_model.php';

session_start();

if (isset($_GET['modul'])) {
    $modul = $_GET['modul'];
} else {
    $modul = 'login';
}

$obj_roles = new ModelRole();
$obj_user = new UserRole();
$obj_barang = new ModelBarang();
$obj_transaksi = new ModelTransaksi();
$obj_detail_transaksi = new ModelDetailTransaksi();
switch ($modul) {

    case 'login':
        $users = $obj_user->getAllUsers();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];


            foreach ($users as $user) {
                if ($user->username == $username && $user->password == $password && $user->role->role_id == 2) {
                    header("Location: index.php?modul=role");
                    $user = $obj_user->getUserByName($username);

                    session_start();
                    $_SESSION['username_login'] = $user;
                }
            }
        }

        include 'views/login.php'; // Tampilkan halaman login
        break;

    case 'role':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;

        switch ($fitur) {
            case 'input':
                include 'views/role_input.php';
                break;
            case 'add':
                $role_name = $_POST['role_name'];
                $role_description = $_POST['role_description'];
                $role_status = $_POST['role_status'];
                $obj_roles->addRole($role_name, $role_description, $role_status);

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
                $password = $_POST['password'];
                $role_id = $_POST['role_id'];
                $obj_user->addUser($username, $password, $role_id);
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
                $password = $_POST['password'];
                $role_name = $_POST['role_name'];

                $update_result = $obj_user->updateUser($user_id, $username, $password, $role_name);

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
        break;
    case 'barang':

        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;


        switch ($fitur) {
            case 'input':
                $Barang = $obj_barang->getAllBarangs();
                include 'views/barang_input.php';
                break;
            case 'add':
                $barang_nama = $_POST['barang_nama'];
                $barang_kategori = $_POST['barang_kategori'];
                $barang_stock = $_POST['barang_stock'];
                $barang_harga = $_POST['barang_harga'];
                $barang_description = $_POST['barang_description'];

                $obj_barang->addBarang($barang_nama, $barang_kategori, $barang_stock, $barang_harga, $barang_description);

                header("Location: index.php?modul=barang");
                break;

            case 'delete':
                $barang_id = $_POST['barang_id'];
                $obj_barang->deleteBarang($barang_id);

                header("Location: index.php?modul=barang");
                break;

            case 'edit':
                $barang_id = $_GET['barang_id'];
                $obj_barang = $obj_barang->getBarangById($barang_id);
                include 'views/barang_update.php';
                break;



            case 'update':
                $barang_id = $_POST['barang_id'];
                $barang_nama = $_POST['barang_nama'];
                $barang_kategori = $_POST['barang_kategori'];
                $barang_stock = $_POST['barang_stock'];
                $barang_harga = $_POST['barang_harga'];
                $barang_description = $_POST['barang_description'];

                $update_result = $obj_barang->updateBarang($barang_id, $barang_nama, $barang_kategori, $barang_stock, $barang_harga, $barang_description);

                if ($update_result) {
                    echo "<script>
                                    alert('Data user berhasil diperbarui!');
                                    window.location.href = 'index.php?modul=barang'; 
                                  </script>";
                } else {
                    echo "<script>  
                                    alert('Gagal memperbarui data user. Silakan coba lagi.');
                                    window.location.href = 'index.php?modul=barang&fitur=edit&barang_id={$barang_id}'; 
                                  </script>";
                }
                break;

            default:
                $Barangs = $obj_barang->getAllBarangs();
                include 'views/barang_list.php';
                break;
        }

        break;
    case 'transaksi':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;

        switch ($fitur) {
            case 'input':
                $transaksis = $obj_transaksi->getAllTransaksi();
                $customers = $obj_user->getAllUsers();
                $barangs = $obj_barang->getAllBarangs();
                include 'views/transaksi_input.php';
                break;

            case 'add':
                $user_id = $_POST['customer'];
                $kasir_id = $_SESSION['username_login'];

                $barang_ids = $_POST['barang'];
                $jumlahs = $_POST['jumlah'];

                $detail_transaksis = [];
                foreach ($barang_ids as $key => $barang_id) {
                    $barang = $obj_barang->getBarangById($barang_id);
                    $detail_transaksi = new DetailTransaksi(4, $barang, $jumlahs[$key], $obj_detail_transaksi->getSubtotal($barang_id, $jumlahs[$key]));
                    $detail_transaksis[] = $detail_transaksi;
                }

                if (!empty($detail_transaksis)) {
                    $obj_transaksi->addTransaksi($user_id, $kasir_id->user_id, $detail_transaksis);
                    header("Location: index.php?modul=transaksi");
                } else {
                    echo "Detail transaksi tidak lengkap!";
                    exit;
                }
                break;
            default:
                $transaksis = $obj_transaksi->getAllTransaksi();
                // echo "<pre>";
                // print_r($transaksis);
                // echo "</pre>";
                include 'views/transaksi_list.php';
                break;
        }
}
