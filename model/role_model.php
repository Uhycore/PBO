<?php
session_start();

require_once '../domain_object/node_role.php';

class Role_model
{
    private $roles = [];
    private $nextId = 1;

    public function __construct()
    {
        if (isset($_SESSION['roles'])) {
            $this->roles = unserialize($_SESSION['roles']);
            $this->nextId = count($this->roles) + 1;
        }
    }

    // Memperbaiki typo pada nama method
    public function initializeDefaultRole()
    {
        $this->addRole("admin", "administrator", 1);
    }

    public function addRole($role_name, $role_description, $role_status)
    {
        $peran = new \Role($this->nextId++, $role_name, $role_description, $role_status);
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
