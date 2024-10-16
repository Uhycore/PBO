<?php
class RoleModel
{
    public $role_id;
    public $role_name;
    public $role_description;
    public $role_status;

    public function cetakRoleInfo()
    {
        echo "Role ID: " . $this->role_id . "<br>";
        echo "Role Name: " . $this->role_name . "<br>";
        echo "Role Description: " . $this->role_description . "<br>";
        echo "Role Status: " . $this->role_status . "<br>";
    }
}
