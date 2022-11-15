<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> -->
        <div class="sidebar-brand-text mx-3">INVENTARIS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Beranda -->
    <li class="nav-item <?= isset($home) ? 'active' : ''; ?>">
        <a class="nav-link" href="?#">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    <?php if ($_SESSION['level'] == 'petugas') : ?>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?= isset($transaksi) ? 'active' : ''; ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transaksi" aria-expanded="true" aria-controls="transaksi">
                <i class="fas fa-fw fa-folder"></i>
                <span>Transaksi</span>
            </a>
            <div id="transaksi" class="collapse <?= isset($transaksi) ? 'show' : ''; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?= isset($barang_masuk) ? 'active' : ''; ?>" href="?barang_masuk">Barang Masuk</a>
                    <a class="collapse-item <?= isset($barang_keluar) ? 'active' : ''; ?>" href="?barang_keluar">Barang Keluar</a>
                </div>
            </div>
        </li>
        <li class="nav-item <?= isset($pinjaman) ? 'active' : ''; ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pinjaman" aria-expanded="true" aria-controls="pinjaman">
                <i class="fas fa-fw fa-folder"></i>
                <span>Peminjaman</span>
            </a>
            <div id="pinjaman" class="collapse <?= isset($pinjaman) ? 'show' : ''; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?= isset($barang_pinjam) ? 'active' : ''; ?>" href="?barang_pinjam">Barang Dipinjam</a>
                    <a class="collapse-item <?= isset($barang_kembali) ? 'active' : ''; ?>" href="?barang_kembali">Barang Kembali</a>
                </div>
            </div>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?= isset($laporan) ? 'active' : ''; ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="laporan">
                <i class="fas fa-fw fa-folder"></i>
                <span>Laporan</span>
            </a>
            <div id="laporan" class="collapse <?= isset($laporan) ? 'show' : ''; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?= isset($lap_barang_masuk) ? 'active' : ''; ?>" href="?lap_barang_masuk">
                        Barang Masuk</a>
                    <a class="collapse-item <?= isset($lap_barang_keluar) ? 'active' : ''; ?>" href="?lap_barang_keluar">
                        Barang Keluar</a>
                    <a class="collapse-item <?= isset($lap_barang_pinjam) ? 'active' : ''; ?>" href="?lap_barang_pinjam">
                        Barang Dipinjam</a>
                    <a class="collapse-item <?= isset($lap_barang_kembali) ? 'active' : ''; ?>" href="?lap_barang_kembali">
                        Barang Kembali</a>
                </div>
            </div>
        </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->