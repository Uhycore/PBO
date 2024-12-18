<?php
require_once 'node_detail_transaksi.php';
require_once 'node_user.php';

class Transaksi
{
    public $transaksi_id;
    public $user;
    public $transaksi_total;
    public $kasir;
    public $detail_transaksi;

    public function __construct($transaksi_id, User $user, User $kasir, $transaksi_total)
    {
        $this->transaksi_id = $transaksi_id;
        $this->user = $user;
        $this->transaksi_total = $transaksi_total;
        $this->kasir = $kasir;
        $this->detail_transaksi = [];
    }
}
