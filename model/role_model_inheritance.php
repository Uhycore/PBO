<?php
require_once './domain_object/node_roleForModel.php';

class UserRole extends RoleModel
{
    protected $role_gaji;

    public function __construct($role_id, $role_name, $role_description, $role_status, $role_gaji)
    {
        $this->role_id = $role_id;
        $this->role_name = $role_name;
        $this->role_description = $role_description;
        $this->role_status = $role_status;
        $this->role_gaji = $role_gaji;
    }

    public function cetakRole()
    {
        $this->cetakRoleInfo();
        echo "Role Gaji: " . $this->role_gaji . "<br>";
    }
}

