<?php session_start(); ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Job Portal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../uploads/profile/admin.png" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Administrator</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="Dashboard.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link jobs">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Jobs
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="addNewJob.php" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>
                                    Add New Job
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="addLayout.php" class="nav-link layout">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Add Layout
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="edit.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Edit Jobs
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="deletedJob.php" class="nav-link">
                                <i class="nav-icon fas fa-trash"></i>
                                <p>
                                    Restore Jobs
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="ListJobs.php" class="nav-link layout">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    All Jobs
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link visitors">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Extras
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="visitors.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Visitors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="gallery.php" class="nav-link gallery">
                                <i class="nav-icon fas fa-image"></i>
                                <p>
                                    Gallery
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="backup.php" class="nav-link backup">
                        <i class="nav-icon fas fa-hdd"></i>
                        <p>
                            Backup & Restore
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link maintainance">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Maintainance (<span class="maintainanceMode">
                            </span>)
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contacts.php" class="nav-link contact">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Contacts
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logs.php" class="nav-link logs">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            Logs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../php/logout.php" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>