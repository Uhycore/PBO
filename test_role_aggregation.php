<?php
require_once 'domain_object/node_roleForModel.php';
require_once 'model/role_model_aggregation.php';


$role = new RoleModel();
$role->role_name = "Aril"; 
$role->role_description = "Bisa semuanya"; 
$role->role_status = "Active";


$userRole = new UserRole($role, 50000, "09:00 - 17:00");


$userRole->cetakUserRole();
