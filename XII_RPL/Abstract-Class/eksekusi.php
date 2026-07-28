<?php

require_once 'pembayaran.php';
require_once 'tfbank.php';
require_once 'ewallet.php';

echo "<h2>Transaksi Pembayaran dengan Transfer Bank</h2>";
$transferBank = new TransferBank(100000, "1234567890");
$transferBank->tampilkanNota();
$transferBank->prosesTransaksi();

echo "<h2>Transaksi Pembayaran dengan E-Wallet</h2>";
$eWallet = new Ewallet(100000, "08123456789");
$eWallet->tampilkanNota();
$eWallet->prosesTransaksi();

?>