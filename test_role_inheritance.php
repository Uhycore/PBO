<?php

require_once 'model/role_model_inheritance.php';


$objRoleUser = new UserRole(1, "Admin", "Bisa semuanaya", "Active", 50000, "09:00 - 17:00");

$objRoleUser->cetakRole();
