<?php
require_once 'node_role.php';

class User
{
    public $user_id;
    public $username;
    public $role;

    public function __construct($user_id, $username, Role $role)
    {
        $this->user_id = $user_id;
        $this->username = $username;
        $this->role = $role;
    }
}
