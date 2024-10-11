<?php
class Barang
{
    public $barang_id;
    public $barang_name;
    public $barang_harga;
    public $barang_stok;
    public $barang_status;

    public function __construct($barang_id, $barang_name, $barang_harga, $barang_stok, $barang_status)
    {
        $this->barang_id = $barang_id;
        $this->barang_name = $barang_name;
        $this->barang_harga = $barang_harga;
        $this->barang_stok = $barang_stok;
        $this->barang_status = $barang_status;
    }
}
