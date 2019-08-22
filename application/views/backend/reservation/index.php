    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Reservations</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Reservations</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">
                    <div class="flash-msg" data-flashmsg="<?= $this->session->flashdata('message'); ?>"></div>
                    <div class="card">
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
                                    foreach ($bookings as $key => $b_status) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?php xss($b_status['name']); ?></td>
                                        <td><?php xss($b_status['phone']); ?></td>
                                        <td>
                                            <p class="badge badge-<?= $b_status['status_b'] == 'pending' ? 'danger' : 'success' ?>"><?= $b_status['status_b']; ?></p>
                                        </td>
                                        <td><?= date("d/m/Y h:i a", $b_status['booking_at']); ?></td>
                                        <td class="text-center">
                                            <?php if ($b_status['status_b'] == 'pending') : ?>
                                            <a href="<?= base_url('reservation/check/') . $b_status['id'] ?>" class="btn-sm btn-warning tombol-baru" id="tombol-baru"><i class="fa fa-check"></i></a>
                                            <?php endif; ?>
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