
<?php
require_once './domain_object/node_buku.php';

class Perpus
{
    public $name;
    public $location;
    public $buku;

    public function __construct($name, $location, $buku_id, $title, $pencipta, $status)
    {
        $this->name = $name;
        $this->location = $location;
        $this->buku = new Buku();
        $this->buku->buku_id = $buku_id;
        $this->buku->title = $title;
        $this->buku->pencipta = $pencipta;
        $this->buku->status = $status;
    }

    public function readPerpus()
    {
        echo "Perpus Name: " . $this->name . "<br>";
        echo "Perpus Location: " . $this->location . "<br>";
        echo "<hr>";
        echo "buku di perpus:<br>";
        $this->buku->displayBukuInfo();
        echo "<hr>";
    }
}
?>