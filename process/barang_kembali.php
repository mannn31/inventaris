<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');
//proses tambah
if(isset($_POST['tambah'])){
    $idbarang_kembali = $_POST['idbarang_kembali'];
    $barang_id = $_POST['barang_id'];
    $nama_kembali = $_POST['nama_kembali'];
    $nama_penerima = $_POST['nama_penerima'];
    $keterangan = $_POST['keterangan'];
    $jumlah = $_POST['jumlah'];
    $denda_kembali = $_POST['denda_kembali'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    
    $insert = mysqli_query($con,"INSERT INTO barang_kembali (idbarang_kembali, barang_id, nama_kembali, nama_penerima, keterangan, jumlah, denda_kembali, tanggal_masuk) VALUES ('$idbarang_kembali','$barang_id','$nama_kembali','$nama_penerima','$keterangan','$jumlah','$denda_kembali','$tanggal_masuk')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data barang kembali';
    }else{
        $error = 'Gagal menambahkan data barang kembali';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?barang_kembali');
}
//proses hapus
if(decrypt($_GET['act'])=='delete' && isset($_GET['idbarang_kembali'])!=""){
    $idbarang_kembali = decrypt($_GET['idbarang_kembali']);
    $query = mysqli_query($con, "DELETE FROM barang_kembali WHERE idbarang_kembali='$idbarang_kembali'")or die(mysqli_error($con));
    if($query){
        $success = 'Berhasil menghapus data barang kembali';
    }else{
        $error = 'Gagal menghapus data barang kembali';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?barang_kembali');
}

?>