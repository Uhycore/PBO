<?php
require_once 'domain_object/node_minuman.php';
require_once 'model/kulkas_model_aggregation.php';

$minuman1 = new Minuman();
$minuman1->minuman_id = 1;
$minuman1->minuman_name = "Coca-cola";
$minuman1->minuman_tipe = "Soda";
$minuman1->minuman_status = "Ready";

$minuman2 = new Minuman();
$minuman2->minuman_id = 2;
$minuman2->minuman_name = "Sprite";
$minuman2->minuman_tipe = "Soda";
$minuman2->minuman_status = "Ready";

$fridge = new Kulkas("Samsung", 4);

$fridge->addMinuman($minuman1);
$fridge->addMinuman($minuman2);

$fridge->readKulkas();
?>
