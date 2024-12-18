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
        } else {
            $this->initializeDefaultUser();
        }
    }

    public function initializeDefaultUser()
    {
        $this->addUser("Aril", "aaaa", 1);
        $this->addUser("Mubin", "aaaa", 2);
        $this->addUser("mubin", "aaaa", 2);
        $this->addUser("Luqman", "aaaa", 3);
        $this->addUser("Luqman1", "aaaa", 3);
    }

    public function addUser($username, $password, $role_id)
    {
        $role = $this->modelRole->getRoleById($role_id);
        if (!$role) {
            throw new Exception("Role tidak ditemukan.");
        }

        $user = new User($this->nextId++, $username, $password, $role);
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

    public function getUserByName($username)
    {
        foreach ($this->users as $user) {
            if ($user->username == $username) {
                return $user;
            }
        }
        return null;
    }



    public function updateUser($user_id, $username, $password, $role_name)
    {
        foreach ($this->users as $user) {
            if ($user->user_id == $user_id) {
                $user->username = $username;
                $user->password = $password;

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
