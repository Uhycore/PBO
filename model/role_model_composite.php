<?php

require_once './domain_object/node_roleForModel.php';

class UserRole
{
    public $role;
    public $gaji;
    public $jam_kerja;

    public function __construct($role_id, $role_name, $role_description, $role_status, $gaji, $jam_kerja)
    {
        $this->role = new RoleModel();
        $this->role->role_id = $role_id;
        $this->role->role_name = $role_name;
        $this->role->role_description = $role_description;
        $this->role->role_status = $role_status;
        $this->gaji = $gaji;
        $this->jam_kerja = $jam_kerja;
    }

    public function cetakRole()
    {
        $this->role->cetakRoleInfo();
        echo "Role Gaji : " . $this->gaji . "<br>";
        echo "Role jam kerja : " . $this->jam_kerja . "<br>";
    }
    // private $roles = [];
    // private $nextId = 1;


    // public function addRole($role_name, $role_description, $role_status)
    // {
    //     $peran = new Role($this->nextId++, $role_name, $role_description, $role_status);
    //     $this->roles[] = $peran;
    //     $this->saveToSession();
    // }

    // private function saveToSession()
    // {
    //     $_SESSION['roles'] = serialize($this->roles);
    // }

    // public function getRoles()
    // {
    //     return $this->roles;
    // }
}
