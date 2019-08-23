<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employee Detail</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('employee/'); ?>">Employee</a></li>
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
                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="row">
                                <div class="text-left">
                                    <a href="<?= base_url('employee/'); ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fa fa-sign-in mr-1"></i> NIK</strong>
                            <p class="text-muted">
                                <?= $e_detail->nik; ?>
                            </p>
                            <hr>
                            <strong><i class="fa fa-phone mr-1"></i> Phone</strong>
                            <p class="text-muted">
                                <?= $e_detail->phone; ?>
                            </p>
                            <hr>
                            <strong><i class="fa fa-map-marker mr-1"></i> Address</strong>
                            <p class="text-muted"><?= $e_detail->address; ?></p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-4">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="img-thumbnail img-fluid" src="<?= base_url('uploads/profile/') . $e_detail->image; ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $e_detail->name; ?></h3>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>