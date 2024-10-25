<?php
require_once 'domain_object/node_user.php';
require_once 'role_model.php';

class UserRole
{
    private $users = [];
    private $nextId = 1;
    private $modelRole;

    public function __construct()
    {
        $this->modelRole = new ModelRole();

        if (isset($_SESSION['users'])) {
            $this->users = unserialize($_SESSION['users']);
            $this->nextId = count($this->users) + 1;
        } else {
            $this->initializeDefaultUser();
        }
    }

    public function initializeDefaultUser()
    {
        $this->addUser("Ustadz", "Admin");
        $this->addUser("Santri", "User");
        $this->addUser("Ustadzah", "Admin");
    }

    public function addUser($username, $role_name)
    {
        $role = $this->modelRole->getRoleByName($role_name);
        if (!$role) {
            throw new Exception("Role tidak ditemukan.");
        }

        $user = new User($this->nextId++, $username, $role);
        $this->users[] = $user;
        $this->saveToSession();
    }

    private function saveToSession()
    {
        $_SESSION['users'] = serialize($this->users);
    }

    public function getAllUsers()
    {
        return $this->users;
    }
}
