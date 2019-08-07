    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product Categories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right">
                                <a class="btn btn-secondary" href="<?= base_url('category/add'); ?>"><i class="fa fa-send"></i> Add Category</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10px; text-align: center;">No</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Booking Time</th>
                                        <th style="width: 100px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($booking as $key => $b_status) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $b_status['name']; ?></td>
                                            <td><?= $b_status['phone']; ?></td>
                                            <td>
                                                <p class="badge badge-<?= $b_status['status_b'] == 'pending' ? 'danger' : $b_status['status_b'] == 'on-progress' ? 'warning' : 'success' ?>"><?= $b_status['status_b']; ?></p>
                                            </td>
                                            <td><?= $b_status['booking_at']; ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('category/edit/') . $b_status['id'] ?>" class="btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                                <a href="<?= base_url('category/delete/') . $b_status['id'] ?>" class="btn-sm btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->