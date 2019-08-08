    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Unit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('category/'); ?>">Unit</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-lg-10">
                    <form action="<?= base_url('category/editunit/' . $unit['id']); ?>" method="post">
                        <div class="form-group row">
                            <label for="unit" class="col-sm-2 col-form-label">Unit Title</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="unit" id="unit" value="<?= $unit['unit_title']; ?>">
                            </div>
                            <div class="col-sm-4">
                                <?= form_error('unit', '<p class="text-danger">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Save</button>
                                <a href="<?= base_url('category/'); ?>" class="btn btn-secondary"><i class="fa fa-undo"></i> Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->