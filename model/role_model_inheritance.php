<?php
require_once './domain_object/node_role.php';

class UserRole extends Role
{
    protected $role_gaji;
    protected $role_jam_kerja;

    public function __construct($role_id, $role_name, $role_description, $role_status, $role_gaji,$role_jam_kerja)
    {
        parent::__construct($role_id, $role_name, $role_description, $role_status);
        $this->role_jam_kerja = $role_jam_kerja;
        $this->role_gaji = $role_gaji;
    }

    public function cetakRole()
    {
        parent::cetakRoleInfo();
        echo "Role Gaji: " . $this->role_gaji . "<br>";
        echo "Role jam kerja: " . $this->role_jam_kerja . "<br>";
    }
}
