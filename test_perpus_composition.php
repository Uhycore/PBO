<?php
require_once 'model/perpus_model_composition.php';

$library = new Perpus("Perpus Kota", "Jl. Semarang", 1, "Buku Sejarah", "John Doe", "Ready");

$library->readPerpus();
