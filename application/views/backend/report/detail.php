    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Report Detail - <?= $this->uri->segment(3); ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('report'); ?>">Report</a></li>
                            <li class="breadcrumb-item active"><?= $this->uri->segment(3); ?></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">
                    <div class="flash-employee" data-flashemployee="<?= $this->session->flashdata('message'); ?>"></div>
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h3>Customer : <?= $invoice->customer; ?></h3>
                        </div>
                        <div class="card-body">
                            <table id="report" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px; text-align: center;">No</th>
                                        <th>Items</th>
                                        <th>Sold Qty</th>
                                        <th class="text-center">Sub Total</th>
                                        <!-- <th style="width: 100px;">Actions</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($report as $key => $all) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $all->item_name; ?></td>
                                        <td><?= $all->sold_qty; ?></td>
                                        <td class="text-center"><?= rupiah($all->selling_price * $all->sold_qty); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <th>Total</th>
                                    <th class="text-right"><?= rupiah($invoice->total); ?></th>
                                </thead>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-right">
                            <a href="" class="btn btn-success"><i class="fa fa-print"></i> Print as Invoice</a>
                            <a href="" class="btn btn-warning"><i class="fa fa-print"></i> Print as Report</a>
                        </div>
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