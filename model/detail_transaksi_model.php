<?php
require_once 'domain_object/node_detail_transaksi.php';
require_once 'barang_model.php';

class ModelDetailTransaksi
{
    public $DetailTransaksi = [];
    private $nextId = 1;
    public $barang_model;

    public function __construct()
    {
        $this->barang_model = new ModelBarang();
        if (isset($_SESSION['DetailTransaksi'])) {
            $this->DetailTransaksi = unserialize($_SESSION['DetailTransaksi']);
            $this->nextId = $this->getMaxDetailTransaksiId() + 1;
        } else {
            // $this->initializeDefaultDetailTransaksi();
        }
    }
    function getSubtotal($barang_id, $jumlah)
    {
        
        $barang = $this->barang_model->getBarangById($barang_id);
        return $barang ? $barang->barang_harga * $jumlah : 0;
    }


    public function addDetailTransaksi($barang_id, $detail_jumlah)
    {
        $barang = $this->barang_model->getBarangById($barang_id);
        $detail_subtotal = $detail_jumlah * $barang->barang_harga;
        $detail = new DetailTransaksi($this->nextId++, $barang, $detail_jumlah, $detail_subtotal);
        $this->DetailTransaksi[] = $detail;
        $this->saveToSession();
    }

    public function saveToSession()
    {
        $_SESSION['DetailTransaksi'] = serialize($this->DetailTransaksi);
    }

   

    public function getMaxDetailTransaksiId()
    {
        $maxId = 0;
        foreach ($this->DetailTransaksi as $DetailTransaksi) {
            if ($DetailTransaksi->detail_id > $maxId) {
                $maxId = $DetailTransaksi->detail_id;
            }
        }
        return $maxId;
    }

    public function getAllDetailTransaksi()
    {
        return $this->DetailTransaksi;
    }

    public function getDetailTransaksiById($detail_id)
    {
        foreach ($this->DetailTransaksi as $DetailTransaksi) {
            if ($DetailTransaksi->detail_id == $detail_id) {
                return $DetailTransaksi;
            }
        }
        return null;
    }
}
