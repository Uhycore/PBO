<?php
session_start();

require_once './domain_object/node_role.php';

class Role_model
{
    private $roles = [];
    private $nextId = 1;


    public function addRole($role_name, $role_description, $role_status)
    {
        $peran = new Role($this->nextId++, $role_name, $role_description, $role_status);
        $this->roles[] = $peran;
        $this->saveToSession();
    }

    private function saveToSession()
    {
        $_SESSION['roles'] = serialize($this->roles);
    }

    public function getRoles()
    {
        return $this->roles;
    }
}
