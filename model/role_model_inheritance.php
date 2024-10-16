<?php
class Role
{
    protected $role_name;
    protected $role_description;

    public function __construct($name, $description)
    {
        $this->role_name = $name;
        $this->role_description = $description;
    }
}

class AdminRole extends Role
{
    public $role_gaji;

    public function __construct($name, $description, $gaji)
    {
        parent::__construct($name, $description);
        $this->role_gaji = $gaji;
    }

    public function displayRole()
    {
        echo "Role name: " . $this->role_name . "<br>";
        echo "Role description: " . $this->role_description . "<br>";
        echo "Role salary: " . $this->role_gaji . "<br><br>";
    }
}
