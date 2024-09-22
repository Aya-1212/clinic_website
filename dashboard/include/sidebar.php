<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #003366;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="../assets/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Vcare</span>
    </a>
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../assets/images/doctor.gif" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin name</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="<?= url("home"); ?>" class="nav-link ">
                    <img src="../assets/images/dashboard.gif" alt="Dashboard" style="width: 20px; height: 20px;" />
                    <p>Dashboard</p>

                    </a>
                </li>
                <!-- -- dropDown---->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <img src="../assets/images/healthcare.gif" alt="Dashboard" style="width: 20px; height: 20px;" />

                        <p>
                            Doctors
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= url("table-doctors"); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url("add-doctor"); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <img src="../assets/images/head.gif" alt="patients" style="width: 20px; height: 20px;" />
                        <p>Patients</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= url("table-patients"); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url("add-patient"); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <img src="../assets/images/healthcare.png" alt="majors" style="width: 20px; height: 20px;" />

                        <p>Majors</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= url("table-majors"); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= url("add-major"); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <img src="../assets/images/calendar2.gif" alt="appointments" style="width: 20px; height: 20px;" />

                        <p>Appointements</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= url("table-appointments"); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Table</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <img src="../assets/images/message.gif" alt="appointments" style="width: 20px; height: 20px;" />
                        <p>Messages</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= url("table-messages"); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Table</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>