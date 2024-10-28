<?php
require_once 'domain_object/node_barang.php';

class ModelBarang
{
    private $barangs = [];
    private $nextId = 1;

    public function __construct()
    {
        if (isset($_SESSION['barangs'])) {
            $this->barangs = unserialize($_SESSION['barangs']);
            $this->nextId = $this->getMaxBarangId() + 1;
        } else {
            $this->initializeDefaultBarang();
        }
    }

    public function initializeDefaultBarang()
    {
        $this->addBarang("Sprite", "Soda", 10, 5000, "Tanpa gula");
        $this->addBarang("Fanta", "Soda", 10, 5000, "Tanpa gula");
        $this->addBarang("Coca-cola", "Soda", 10, 5000, "Dengan gula");
    }

    public function addBarang($barang_nama, $barang_kategori, $barang_stock, $barang_harga, $barang_description)
    {
        $barang = new Barang($this->nextId++, $barang_nama, $barang_kategori, $barang_stock, $barang_harga, $barang_description);
        $this->barangs[] = $barang;
        $this->saveToSession();
    }

    private function saveToSession()
    {
        $_SESSION['barangs'] = serialize($this->barangs);
    }

    public function getAllBarangs()
    {
        return $this->barangs;
    }

    private function getMaxBarangId()
    {
        $maxId = 0;
        foreach ($this->barangs as $barang) {
            if ($barang->barang_id > $maxId) {
                $maxId = $barang->barang_id;
            }
        }
        return $maxId;
    }
    public function deleteBarang($barang_id)
    {
        foreach ($this->barangs as $key => $barang) {
            if ($barang->barang_id == $barang_id) {
                unset($this->barangs[$key]);
                $this->barangs = array_values($this->barangs); // Reindex array
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
    public function getBarangById($barang_id)
    {
        foreach ($this->barangs as $barang) {
            if ($barang->barang_id == $barang_id) {
                return $barang;
            }
        }
        return null;
    }

    public function updateBarang($barang_id, $barang_nama, $barang_kategori, $barang_stock, $barang_harga, $barang_description)
    {
        foreach ($this->barangs as $barang) {
            if ($barang->barang_id == $barang_id) {

                $barang->barang_nama = $barang_nama;
                $barang->barang_kategori = $barang_kategori;
                $barang->barang_stock = $barang_stock;
                $barang->barang_harga = $barang_harga;
                $barang->barang_description = $barang_description;
                $this->saveToSession();
                return true;
            }
        }
    }
}
