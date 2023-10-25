<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    @if(auth()->user()->level == 1 || auth()->user()->level == 2)
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link {{ ($tittle == "Dashboard") ? 'active' : '' }}" href="/dashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Menu Karyawan</div>
                    <a class="nav-link {{ ($tittle == "Halaman Karyawan") ? 'active' : '' }}" href="/karyawan">
                        <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                        Master Data Karyawan
                    </a>
                    <a class="nav-link {{ ($tittle == "Halaman Input Data") ? 'active' : '' }}" href="/karyawan/input">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                        Input Data Karyawan
                    </a>
                    <a class="nav-link {{ ($tittle == "Karyawan Aktif") ? 'active' : '' }}" href="/karyawan/aktif">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Data Karyawan Aktif
                    </a>
                    <a class="nav-link {{ ($tittle == "Karyawan Keluar") ? 'active' : '' }}" href="/keluar">
                        <div class="sb-nav-link-icon"><i class="fas fa-walking"></i></div>
                        Data Karyawan Keluar
                    </a>
                    <a class="nav-link {{ ($tittle == "Karyawan 3 Bulanan") ? 'active' : '' }}" href="/karyawan/3_bulan">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                        Karyawan 3 Bulan
                    </a> 
                    @endif

                    <div class="sb-sidenav-menu-heading">Menu SOP</div>
                    <a class="nav-link {{ ($tittle == "list SOP") ? 'active' : '' }}" href="/sop">
                        <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                        list SOP
                    </a>
                    @if(auth()->user()->level == 1)
                    <a class="nav-link {{ ($tittle == "Upload SOP") ? 'active' : '' }}" href="/sop/upload">
                        <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                        Upload SOP
                    </a>
                    @endif

                    <div class="sb-sidenav-menu-heading">Menu Form</div>
                    <a class="nav-link {{ ($tittle == "list Form") ? 'active' : '' }}" href="/form">
                        <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                        list Form
                    </a>
                    @if(auth()->user()->level == 1)
                    <a class="nav-link {{ ($tittle == "Upload Form") ? 'active' : '' }}" href="/form/upload">
                        <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                        Upload Form
                    </a>
                    @endif
                    

                    <div class="sb-sidenav-menu-heading">Menu Surat Keputusan</div>
                    <a class="nav-link {{ ($tittle == "list SK") ? 'active' : '' }}" href="/surat_keputusan">
                        <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                        list Surat Keputusan
                    </a>
                    @if(auth()->user()->level == 1)
                        <a class="nav-link {{ ($tittle == "upload SK") ? 'active' : '' }}" href="/surat_keputusan/upload">
                            <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                            Upload Surat Keputusan
                        </a>
                    @endif
                   
                    
        </nav>
    </div>