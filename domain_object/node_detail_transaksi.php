<?php
class DetailTransaksi
{
    public $detail_id;
    public $barang;
    public $detail_jumlah;
    public $detail_subtotal;

    public function __construct($detail_id, Barang $barang, $detail_jumlah, $detail_subtotal)
    {
        $this->detail_id = $detail_id;
        $this->barang = $barang;
        $this->detail_jumlah = $detail_jumlah;
        $this->detail_subtotal = $detail_subtotal;
    }
}
