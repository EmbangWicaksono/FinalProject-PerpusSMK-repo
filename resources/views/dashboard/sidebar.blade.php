<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Menu</div>
                <a class="nav-link" href="{{route('user.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Anggota Perpustakaan
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Buku
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/listbiblio">Daftar Buku</a>
                        <a class="nav-link" href="/listitem">Salinan Buku</a>
                        <a class="nav-link" href="/penerbit">Daftar Penerbit</a>
                        <a class="nav-link" href="/penulis">Daftar Penulis</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-exchange-alt"></i></div>
                    Transaksi
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/transaction/pinjam">Peminjaman</a>
                        <a class="nav-link" href="/transaction/history">Riwayat Pinjam</a>
                        <a class="nav-link" href="/transaction/reservation">Reservasi</a>
                        <a class="nav-link" href="/transaction/denda">Denda</a>
                    </nav>
                </div>
                <a class="nav-link" href="/usulanbuku">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                    Usulan Buku
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{Auth::user()->name}}
        </div>
    </nav>
</div>