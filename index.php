<?php
require_once 'domain_object/node_role.php';
require_once 'domain_object/node_barang.php';

$obj_role = [];
$obj_role[] = new Role(1, "aaaa", "Dibuat untuk kasir", 1);
$obj_role[] = new Role(2, "admin", "Dibuat untuk admin", 1);
$obj_role[] = new Role(3, "owner", "Dibuat untuk yang punya", 0);
$obj_role[] = new Role(4, "customer", "Dibuat untuk pelanggan", 1);

$obj_barang = [];
$obj_barang[] = new Barang(1, "Sprite", 55000, 10, 1);
$obj_barang[] = new Barang(2, "Fanta", 60000, 7, 1);
$obj_barang[] = new Barang(3, "Coca-cola", 60000, 2, 1);
$obj_barang[] = new Barang(4, "Pepsi", 70000, 0, 0);

include 'views/role_list.php';
