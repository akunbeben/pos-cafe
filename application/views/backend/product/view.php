    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product Detail</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('product'); ?>">Product</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <!-- About Me Box -->
                        <div class="card card-default">

                            <!-- /.card-header -->
                            <div class="card-body">

                                <strong> Product Image</strong>
                                <div class="text-center">
                                    <img src="<?= base_url('uploads/product/') . $detailprod['image']; ?>" class="img-thumbnail">
                                </div>

                                <hr>

                                <strong> Item Name</strong>

                                <p class="text-muted">
                                    <?= $detailprod['item_name']; ?>
                                </p>

                                <hr>

                                <strong> Purchase Price</strong>

                                <p class="text-muted">
                                    <?= $detailprod['purchase_price']; ?>
                                </p>

                                <hr>

                                <strong> Selling Price</strong>

                                <p class="text-muted">
                                    <?= $detailprod['selling_price']; ?>
                                </p>

                                <hr>

                                <strong> Profit</strong>

                                <p class="text-muted">
                                    <?= $detailprod['profit']; ?>
                                </p>

                                <hr>

                                <strong> Category</strong>

                                <p class="text-muted"><?= $detailprod['cat_title']; ?></p>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row justify-content-center">
                                    <div>
                                        <a href="<?= base_url('product/'); ?>" class="btn btn-secondary"><i class="fa fa-undo"></i> Back</a>
                                    </div>
                                    <!-- <div class="ml-auto">
                                        <a href="<?= base_url('product/edit/') . $detailprod['id']; ?>" class="btn btn-secondary"><i class="fa fa-pencil"></i> Edit</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->