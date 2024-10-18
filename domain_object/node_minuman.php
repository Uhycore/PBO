<?php
class Minuman {
    public $minuman_id;
    public $minuman_name;
    public $minuman_tipe;
    public $minuman_status;

    public function readMinumanInfo() {
        echo "minuman ID: " . $this->minuman_id . "<br>";
        echo "minuman Name: " . $this->minuman_name . "<br>";
        echo "minuman Tipe: " . $this->minuman_tipe . "<br>";
        echo "minuman Status: " . $this->minuman_status . "<br>";
    }
}
?>
