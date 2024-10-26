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
            $this->nextId = $this->getMaxRoleId() + 1;
            // } else {
            //     $this->initializeDefaultUser();
            // }
        }
    }

    // public function initializeDefaultUser()
    // {
    //     $this->addUser("Ustadz", "Admin");
    //     $this->addUser("Santri", "User");
    //     $this->addUser("Ustadzah", "Admin");
    // }

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
    public function getUserById($user_id)
    {
        foreach ($this->users as $user) {
            if ($user->user_id == $user_id) {
                return $user;
            }
        }
        return null;
    }

    public function updateUser($user_id, $username, $role_name)
    {
        foreach ($this->users as $user) {
            if ($user->user_id == $user_id) {
                $user->username = $username;

                $role = $this->modelRole->getRoleByName($role_name);

                $user->role_name = $role;


                $this->saveToSession();
                return true;
            }
        }
        return false;
    }


    public function deleteUser($user_id)
    {
        foreach ($this->users as $key => $user) {
            if ($user->user_id == $user_id) {
                unset($this->users[$key]);
                $this->users = array_values($this->users); // Reindex array
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
    private function getMaxRoleId()
    {
        $maxId = 0;
        foreach ($this->users as $user) {
            if ($user->user_id > $maxId) {
                $maxId = $user->user_id;
            }
        }
        return $maxId;
    }
}
