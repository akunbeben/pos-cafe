    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sales Report</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Report</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">
                    <div class="flash-report" data-flashreport="<?= $this->session->flashdata('message'); ?>"></div>
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10px; text-align: center;">No</th>
                                        <th>Invoice</th>
                                        <th>Customer</th>
                                        <th>Total Order</th>
                                        <th>Cash In</th>
                                        <th>Cashback</th>
                                        <th>Sales Date</th>
                                        <th style="width: 100px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($report as $key => $all) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $all->id; ?></td>
                                        <td><?= $all->customer; ?></td>
                                        <td><?= rupiah($all->total); ?></td>
                                        <td><?= rupiah($all->cash_in); ?></td>
                                        <td><?= rupiah($all->cashback); ?></td>
                                        <td><?= $all->sales_date; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('report/detail/') . $all->id ?>" class="btn-sm btn-success"><i class="fa fa-eye"></i></a>
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