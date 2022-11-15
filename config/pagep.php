<?php
if (isset($_GET['backup_app'])) {
    include('proses/backup_app.php');
} else if (isset($_GET['backup_db'])) {
    include('proses/backup_db.php');
} else if (isset($_GET['barang_masuk'])) {
    $transaksi = $barang_masuk = true;
    $views = 'views/transaksi/barang_masukp.php';
} else if (isset($_GET['barang_keluar'])) {
    $transaksi = $barang_keluar = true;
    $views = 'views/transaksi/barang_keluarp.php';
} else if (isset($_GET['barang_pinjam'])) {
    $pinjaman = $barang_pinjam = true;
    $views = 'views/pinjaman/barang_pinjamp.php';
} else if (isset($_GET['barang_kembali'])) {
    $pinjaman = $barang_kembali = true;
    $views = 'views/pinjaman/barang_kembalip.php';
} else if (isset($_GET['lap_barang_masuk'])) {
    $laporan = $lap_barang_masuk = true;
    $views = 'views/laporan/lap_barang_masukp.php';
} else if (isset($_GET['lap_barang_keluar'])) {
    $laporan = $lap_barang_keluar = true;
    $views = 'views/laporan/lap_barang_keluarp.php';
} else if (isset($_GET['lap_barang_pinjam'])) {
    $laporan = $lap_barang_pinjam = true;
    $views = 'views/laporan/lap_barang_pinjamp.php';
} else if (isset($_GET['lap_barang_kembali'])) {
    $laporan = $lap_barang_kembali = true;
    $views = 'views/laporan/lap_barang_kembalip.php';
} else {
    $home = true;
    $views = 'views/homep.php';
}
