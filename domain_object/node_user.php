<?php
require_once 'node_role.php';

class User
{
    public $user_id;
    public $username;
    public $role_name;

    public function __construct($user_id, $username, Role $role_name)
    {
        $this->user_id = $user_id;
        $this->username = $username;
        $this->role_name = $role_name;
    }
}
