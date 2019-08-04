    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('profile/'); ?>">Profile</a></li>
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
                    <?= form_open_multipart('profile/edit'); ?>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="email" id="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" id="name" value="<?= $user['name']; ?>">
                        </div>
                        <div class="col-sm-4">
                            <?= form_error('name', '<p class="text-danger">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" name="phone" id="phone" value="<?= $user['phone']; ?>">
                        </div>
                        <div class="col-sm-4">
                            <?= form_error('phone', '<p class="text-danger">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2"><label for="image">Picture</label></div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="<?= base_url('uploads/profile/') . $user['image']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-lg-5">
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
                            <a href="<?= base_url('profile/'); ?>" class="btn btn-secondary"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </div>

                    </form>


                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->