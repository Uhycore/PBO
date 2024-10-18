<?php
require_once './domain_object/node_minuman.php';

class Kulkas
{
    public $merk;
    public $temperature;
    public $minuman = [];
    private $nextId = 0;

    public function __construct($merk, $temperature)
    {
        $this->merk = $merk;
        $this->temperature = $temperature;
    }

    public function addMinuman($minuman)
    {
        $this->minuman[$this->nextId] = $minuman;
        $this->nextId += 1;
    }

    public function getAllMinuman()
    {
        return $this->minuman;
    }

    public function readKulkas()
    {
        echo "Kulkas Merk: " . $this->merk . "<br>";
        echo "Temperature: " . $this->temperature . "°C<br>";
        echo "<hr>";
        echo "Minuman di dalam kulkas:<br>";
        foreach ($this->getAllMinuman() as $minuman) {
            $minuman->readMinumanInfo();
            echo "<br>";
        }
        echo "<hr>";
    }
}
