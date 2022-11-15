<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');
//proses tambah
if(isset($_POST['tambah'])){
    $idbarang_pinjam = $_POST['idbarang_pinjam'];
    $barang_id = $_POST['barang_id'];
    $jumlah = $_POST['jumlah'];
    $nama_pinjam = $_POST['nama_pinjam'];
    $tanggal_keluar = $_POST['tanggal_keluar'];
    $keterangan = $_POST['keterangan'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    
    $insert = mysqli_query($con,"INSERT INTO barang_pinjam (idbarang_pinjam, barang_id, jumlah, nama_pinjam, tanggal_keluar, keterangan, tanggal_masuk) VALUES ('$idbarang_pinjam','$barang_id','$jumlah','$nama_pinjam','$tanggal_keluar','$keterangan','$tanggal_masuk')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data barang pinjam';
    }else{
        $error = 'Gagal menambahkan data barang pinjam';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?barang_pinjam');
}
//proses hapus
if(decrypt($_GET['act'])=='delete' && isset($_GET['idbarang_pinjam'])!=""){
    $idbarang_pinjam = decrypt($_GET['idbarang_pinjam']);
    $query = mysqli_query($con, "DELETE FROM barang_pinjam WHERE idbarang_pinjam='$idbarang_pinjam'")or die(mysqli_error($con));
    if($query){
        $success = 'Berhasil menghapus data barang dipinjam';
    }else{
        $error = 'Gagal menghapus data barang dipinjam';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?barang_pinjam');
}

?>