<?php

class User
{
    public $userId;
    public $name;
    public $username;
    public $role;

    public function __construct($userId, $name, $username, $role)
    {
        $this->userId = $userId;
        $this->name = $name;
        $this->username = $username;
        $this->role = $role; 
    }
}
