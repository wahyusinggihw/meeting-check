<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <div class="col">
                    <a href="<?= base_url('dashboard/profile') ?>" class="d-block" style="text-decoration: none;"><?= session()->get('nama') ?></a>
                </div>
            </div>

        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php if (session()->get('role') != 'operator') : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('/dashboard') ?>" class="nav-link <?= uri_string() == 'dashboard' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
                <?php endif ?>

                <?php if (session()->get('role') == 'superadmin') : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('/dashboard/kelola-admin') ?>" class="nav-link <?= uri_string() == 'dashboard/kelola-admin' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Kelola Admin</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (session()->get('role') == 'admin') : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('/dashboard/kelola-admin') ?>" class="nav-link <?= uri_string() == 'dashboard/kelola-admin' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Kelola Operator</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('/dashboard/kelola-bidang') ?>" class="nav-link <?= uri_string() == 'dashboard/kelola-bidang' ? 'active' : '' ?>">
                            <i class="nav-icon fa-solid fa-sitemap"></i>
                            <p>Kelola Bidang</p>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="<?= base_url('/dashboard/agenda-rapat') ?>" class="nav-link <?= uri_string() == "dashboard/agenda-rapat" ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Agenda Rapat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/auth/logout') ?>" role="button">
                        <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p>Logout</p>
                    </a>
                </li>
    </div>
    <!-- /.sidebar -->
</aside>