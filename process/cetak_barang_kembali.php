<?php
// session_start();
include ('../config/conn.php');
include ('../config/function.php');
?>
<html>

<head>
    <style>
    h2 {
        padding: 0px;
        margin: 0px;
        font-size: 14pt;
    }

    h4 {
        font-size: 12pt;
    }

    text {
        padding: 0px;
    }

    table {
        border-collapse: collapse;
        border: 1px solid #000;
        font-size: 11pt;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 5px;
    }

    table.tab {
        table-layout: auto;
        width: 100%;
    }
    </style>
    <title>Cetak Laporan Barang Dikembalikan</title>
</head>

<body>
    <?php
    $query = mysqli_query($con,"SELECT x.*,x1.nama_barang,x2.nama_merek,x3.nama_kategori FROM barang_kembali x JOIN barang x1 ON x1.idbarang=x.barang_id JOIN merek x2 ON x2.idmerek=x1.merek_id JOIN kategori x3 ON x3.idkategori=x1.kategori_id ORDER BY x.idbarang_kembali DESC")or die(mysqli_error($con));
    
    ?>
    <div style="page-break-after:always;text-align:center;margin-top:5%;">
        <div style="line-height:5px;">
            <h2>LAPORAN SEMUA BARANG DIKEMBALIKAN</h2>
            <h4>MAS PLUS DARUL HUFADZ</h4>
        </div>
        <hr style="border-color:black;">
        <table class="tab">
            <tr>
                <th width="20">NO</th>
                <th>TANGGAL PENGEMBALIAN</th>
                <th>ID BARANG KEMBALI</th>
                <th>NAMA PENGEMBALI</th>
                <th>NAMA PENERIMA</th>
                <th>NAMA BARANG</th>
                <th>MEREK</th>
                <th>KATEGORI</th>
                <th>KETERANGAN</th>
                <th>JUMLAH</th>
                <th>DENDA PENGEMBALIAN</th>
            </tr>
            <?php $n=1; while($row = mysqli_fetch_array($query)): ?>
            <tr>
                <td align="center"><?= $n++.'.'; ?></td>
                <td><?= date('d-m-Y',strtotime($row['tanggal_masuk'])); ?></td>
                <td><?= $row['idbarang_kembali']; ?></td>
                <td><?= $row['nama_kembali']; ?></td>
                <td><?= $row['nama_penerima']; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['nama_merek']; ?></td>
                <td><?= $row['nama_kategori']; ?></td>
                <td><?= $row['keterangan']; ?></td>
                <td><?= $row['jumlah']; ?></td>
                <td><?= $row['denda_kembali']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>

</html>

<script>
window.print();
</script>