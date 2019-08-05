    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
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
                        <div class="card-body">
                            <table id="example1" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10px; text-align: center;">No</th>
                                        <th>Item(s)</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Unit</th>
                                        <th style="width: 100px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($products as $key => $product) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $product['item_name']; ?></td>
                                            <td><?= $product['selling_price']; ?></td>
                                            <td><?= $product['cat_title']; ?></td>
                                            <td><?= $product['unit_title']; ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('product/view/') . $product['id'] ?>" class="btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                                <a href="<?= base_url('product/edit/') . $product['id'] ?>" class="btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                                <a href="<?= base_url('product/delete/') . $product['id'] ?>" class="btn-sm btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
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