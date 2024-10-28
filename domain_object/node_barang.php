<?php

class Barang
{
    public $barang_id;
    public $barang_nama;
    public $barang_kategori;
    public $barang_stock;
    public $barang_harga;
    public $barang_description;
    public $barang_tanggalmasuk;

    public function __construct($barang_id, $barang_nama, $barang_kategori, $barang_stock, $barang_harga, $barang_description)
    {
        $this->barang_id = $barang_id;
        $this->barang_nama = $barang_nama;
        $this->barang_kategori = $barang_kategori;
        $this->barang_stock = $barang_stock;
        $this->barang_harga = $barang_harga;
        $this->barang_description = $barang_description;
    }
}
