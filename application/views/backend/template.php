<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link href="<?= base_url('backend'); ?>/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('backend'); ?>/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('backend'); ?>/plugins/datatables/dataTables.bootstrap4.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('backend'); ?>/select2/dist/css/select2.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini <?= $this->uri->segment(1) == 'pos' ? 'sidebar-collapse' : ''; ?>">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-white elevation-1 navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url(); ?>" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell-o"></i>
                        <?php if ($booking >= 1) : ?>
                        <span class="badge badge-warning navbar-badge"><?= $booking; ?></span>
                        <?php endif; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"><?= $booking; ?> Notifications</span>
                        <div class="dropdown-divider"></div>
                        <?php if ($booking >= 1) : ?>
                        <a href="<?= base_url('reservation'); ?>" class="dropdown-item">
                            <i class="fa fa-book mr-2"></i> <?= $booking; ?> new reservation
                        </a>
                        <?php endif; ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                        <i class="fa fa-sign-out"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-info">
            <!-- Brand Logo -->
            <a href="<?= base_url('admin'); ?>" class="brand-link">
                <img src="<?= base_url('backend'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Sample Cafe</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url(); ?>/uploads/profile/<?= $user['image']; ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= base_url('profile'); ?>" class="d-block"><?= $user['name']; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-header ml-2">FRONT OFFICE</li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin'); ?>" class="nav-link <?= $this->uri->segment(1) == 'admin' ? 'active' : ''; ?>">
                                <i class="nav-icon fa fa-tachometer"></i>
                                <p>
                                    Dashboard
                                    <!-- <span class="right badge badge-success">New</span> -->
                                </p>
                            </a>
                        </li>
                        <?php if ($user['role'] == 1) : ?>
                        <li class="nav-item">
                            <a href="<?= base_url('product'); ?>" class="nav-link <?= $this->uri->segment(1) == 'product' ? 'active' : ''; ?>">
                                <i class="nav-icon fa fa-archive"></i>
                                <p>
                                    Products
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('category'); ?>" class="nav-link <?= $this->uri->segment(1) == 'category' ? 'active' : ''; ?>">
                                <i class="nav-icon fa fa-info"></i>
                                <p>
                                    Categories
                                </p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?= base_url('reservation'); ?>" class="nav-link <?= $this->uri->segment(1) == 'reservation' ? 'active' : ''; ?>">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                    Reservation
                                    <?php if ($booking >= 1) : ?>
                                    <span class="right badge badge-danger">New</span>
                                    <?php endif; ?>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'pos' ? 'menu-open' : ''; ?>">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-shopping-cart"></i>
                                <p>
                                    Transactions
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('pos'); ?>" class="nav-link <?= $this->uri->segment(1) == 'pos' ? 'active' : ''; ?>">
                                        <i class="fa fa-circle-o nav-icon text-info"></i>
                                        <p>Point Of Sales</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('invent'); ?>" class="nav-link <?= $this->uri->segment(1) == 'invent' ? 'active' : ''; ?>">
                                        <i class="fa fa-circle-o nav-icon text-danger"></i>
                                        <p>Inventory Point</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('reports'); ?>" class="nav-link">
                                <i class="nav-icon fa fa-print"></i>
                                <p>
                                    Reports
                                    <!-- <span class="right badge badge-success">New</span> -->
                                </p>
                            </a>
                        </li>
                        <?php if ($user['role'] == 1) : ?>
                        <li class="nav-header">BACK OFFICE</li>
                        <li class="nav-item">
                            <a href="<?= base_url('employee'); ?>" class="nav-link <?= $this->uri->segment(1) == 'employee' ? 'active' : ''; ?>">
                                <i class="nav-icon fa fa-circle-o text-<?= $this->uri->segment(1) == 'employee' ? 'secondary' : 'info'; ?>"></i>
                                <p>Employees</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('users'); ?>" class="nav-link <?= $this->uri->segment(1) == 'users' ? 'active' : ''; ?>">
                                <i class="nav-icon fa fa-circle-o text-<?= $this->uri->segment(1) == 'users' ? 'secondary' : 'info'; ?>"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <?= $contents; ?>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.2
            </div>
            <strong>Copyright &copy; 2019 <a href="http://github.com/akunbeben">Benny Rahmat</a>.</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('backend'); ?>/plugins/jquery/jquery.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('backend'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url('backend'); ?>/select2/dist/js/select2.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url('backend'); ?>/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url('backend'); ?>/plugins/datatables/dataTables.bootstrap4.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url('backend'); ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('backend'); ?>/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('backend'); ?>/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('backend'); ?>/dist/js/demo.js"></script>
    <script src="<?= base_url('backend'); ?>/swal/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('backend'); ?>/myscript.js"></script>
    <script src="<?= base_url('backend'); ?>/btn.js"></script>
    <script src="<?= base_url('backend'); ?>/cart.js"></script>
    <script src="<?= base_url('backend'); ?>/employee.js"></script>
    <script src="<?= base_url('backend'); ?>/pos.js"></script>
    <script>
        $('#cust').keyup(function() {
            update();
        });

        function update() {
            $('#customer').val($('#cust').val());
        }
    </script>
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>

    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('custom-file-label').addClass("selected").html(fileName);
        })
    </script>
</body>

</html>