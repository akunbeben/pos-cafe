    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('product/'); ?>">Product</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-lg-10">
                    <?= form_open_multipart('product/add'); ?>
                    <div class="form-group row">
                        <label for="item" class="col-sm-2 col-form-label">Item Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="item" id="item">
                        </div>
                        <div class="col-sm-4">
                            <?= form_error('item', '<p class="text-danger">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="purchase_price" class="col-sm-2 col-form-label">Purchase Price</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" name="purchase_price" id="purchase_price">
                        </div>
                        <div class="col-sm-4">
                            <?= form_error('purchase_price', '<p class="text-danger">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="selling_price" class="col-sm-2 col-form-label">Selling Price</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" name="selling_price" id="selling_price">
                        </div>
                        <div class="col-sm-4">
                            <?= form_error('selling_price', '<p class="text-danger">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-6">
                            <select name="category" id="category" class="form-control">
                                <?php foreach ($cat as $key => $category) : ?>
                                <option value="<?= $category['id']; ?>"><?= $category['cat_title']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="unit" class="col-sm-2 col-form-label">Unit</label>
                        <div class="col-sm-6">
                            <select name="unit" id="unit" class="form-control">
                                <?php foreach ($unit as $key => $units) : ?>
                                <option value="<?= $units['id']; ?>"><?= $units['unit_title']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2"><label for="image">Picture</label></div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="custom-file">
                                        <label for="image" class="custom-file-label">Choose File</label>
                                        <input type="file" name="image" id="image" class="custom-file-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Save</button>
                            <a href="<?= base_url('product/'); ?>" class="btn btn-secondary"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </div>

                    </form>


                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->