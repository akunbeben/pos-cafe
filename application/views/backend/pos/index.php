<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="cart-data" data-cartmessage="<?= $this->session->flashdata('message'); ?>"></div>
                <div class="pos-data" data-posmessage="<?= $this->session->flashdata('posmsg'); ?>"></div>
                <div class="col-sm-6">
                    <h1>Point Of Sales</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">POS</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="card">
                        <!-- form start -->
                        <form role="form">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Cashier</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="cashier" name="cashier" value="<?= $user['name']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row py-2">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Customer</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control cust" id="cust" name="cust">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>

                    </div>
                </div>
                <!-- col-md-4 -->
                <div class="col-md-5">
                    <div class="card">
                        <!-- form start -->
                        <form role="form" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="product" class="col-sm-4 col-form-label">Product</label>
                                    <div class="col-sm-6">
                                        <select name="product" id="product" style="width: 100%; height: 100%">
                                            <option value="" selected> -- Choose Product -- </option>
                                            <?php foreach ($products as $key => $allprod) : ?>
                                            <option value="<?= $allprod['id']; ?>"><?= $allprod['item_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="product" class="col-sm-4 col-form-label">Qty</label>
                                    <div class="col-sm-6 py-2">
                                        <input type="number" class="form-control" id="qty" name="qty" required>
                                    </div>
                                    <div class="col-sm-2 py-2">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md text-right">
                                    <h6><strong><?= $invoice; ?></strong></h6>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md text-right py-2 mb-2">
                                    <h3><strong><?= rupiah($grand_total) == null ? '0' : rupiah($grand_total); ?></strong></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Sub Total</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($cart as $key => $carts) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $carts['item_name']; ?></td>
                                    <td><?= rupiah($carts['selling_price']); ?></td>
                                    <td><?= $carts['qty']; ?></td>
                                    <td><?= rupiah($carts['selling_price'] * $carts['qty']); ?></td>
                                    <td class="text-center">
                                        <a class="btn-sm btn-danger tombol-cart" href="<?= base_url('pos/delete/') . $carts['id']; ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <form method="post" action="<?= base_url('pos/process'); ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="cash" class="col-sm-4 col-form-label">Cash</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="cash" name="cash" required>
                                        <input type="hidden" class="form-control customer" id="customer" name="customer">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="text-left col-md-6">
                                        <label for="grandtotal" class="col-form-label">Grand Total</label>
                                    </div>
                                    <div class="justify-content-end col-md-6">
                                        <h3><strong><?= rupiah($grand_total) == null ? '0' : rupiah($grand_total); ?></strong></h3>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row justify-content-end my-4">
                            <a class="btn-lg btn-warning clear-cart" href="<?= base_url('pos/clear'); ?>"><i class="fa fa-refresh"></i> New Payment</a>
                        </div>
                        <div class="row justify-content-end mb-4">
                            <button class="btn-lg btn-success" type="submit"><i class="fa fa-send"></i> Process Payment</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->