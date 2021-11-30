<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url()?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-ticket-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Tiket</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?=base_url()?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <?php if(in_groups('user')) :?>
    <!-- Heading -->
    <div class="sidebar-heading">
        Pejualan Tiket
    </div>
    <!-- Nav Item - Penjualan Tiket -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#penjualanTiket" aria-expanded="true"
            aria-controls="penjualanTiket">
            <i class="fas fa-users"></i>
            <span>Tiket</span>
        </a>
        <div id="penjualanTiket" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Penjualan Tiket</h6>
                <a class="collapse-item" href="<?=base_url('user/tiket_list')?>">Jadwal</a>
                <a class="collapse-item" href="<?=base_url('/tiket_list')?>">Laporan</a>
            </div>
        </div>
    </li>
    <?php endif; ?>

    <?php if(in_groups('administrator')) :?>
    <!-- Heading -->
    <div class="sidebar-heading">
        User Management
    </div>

    <!-- Nav Item - User Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url('/user_list')?>" aria-expanded="true"
            aria-controls="userManagement">
            <i class="fas fa-users"></i>
            <span>User List</span>
        </a>
    </li>
    <!-- Heading -->
    <div class="sidebar-heading">
        Bus Management
    </div>

    <!-- Nav Item - User Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url('/bus_list')?>" aria-expanded="true"
            aria-controls="userManagement">
            <i class="fas fa-bus"></i>
            <span>Bus List</span>
        </a>
    </li>
    <?php endif; ?>
</ul>