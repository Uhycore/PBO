<?php
class Role
{
    public $role_id;
    public $role_name;
    public $role_description;
    public $role_status;

    public function __construct($role_id, $role_name, $role_description, $role_status)
    {
        $this->role_id = $role_id;
        $this->role_name = $role_name;
        $this->role_description = $role_description;
        $this->role_status = $role_status;
    }

}



