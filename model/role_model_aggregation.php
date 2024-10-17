<?php
require_once './domain_object/node_roleForModel.php';

class UserRole
{
    public $role_gaji;
    public $role_jam_kerja;
    public $role;

    public function __construct($role, $jam_kerja)
    {
        $this->role = $role;
        // $this->role_gaji = $gaji;
        $this->role_jam_kerja = $jam_kerja;
    }

    public function cetakUserRole()
    {
        $this->role->cetakRoleInfo();
        // echo "Role Gaji: " . $this->role_gaji . "<br>";
        echo "Role Jam Kerja: " . $this->role_jam_kerja . "<br><br>";
    }
}
