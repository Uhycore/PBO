<?php
class Buku {
    public $buku_id;
    public $title;
    public $pencipta;
    public $status;

    // Method untuk menampilkan informasi buku
    public function displayBukuInfo() {
        echo "Buku ID: " . $this->buku_id . "<br>";
        echo "Judul: " . $this->title . "<br>";
        echo "Pencipta: " . $this->pencipta . "<br>";
        echo "Status: " . $this->status . "<br>";
    }
}
?>