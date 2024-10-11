<?php
require_once 'domain_object/node_barang.php';

$obj_barang = [];
$obj_barang[] = new Barang(1, "Sprite", 55000, 10, 1);
$obj_barang[] = new Barang(2, "Fanta", 60000, 7, 1);
$obj_barang[] = new Barang(3, "Coca-cola", 60000, 2, 1);
$obj_barang[] = new Barang(4, "Pepsi", 70000, 0, 0);

include 'views/barang_list.php';