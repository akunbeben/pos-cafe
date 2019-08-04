<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('profile/'); ?>">Profile</a></li>
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

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('uploads/profile/') . $user['image']; ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $user['name']; ?></h3>

                            <p class="text-muted text-center">Software Engineer</p>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="row">
                                <div class="text-right ml-auto">
                                    <a href="<?= base_url('profile/'); ?>" class="btn btn-secondary"><i class="fa fa-undo"></i> Back</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fa fa-envelope mr-1"></i> Email</strong>

                            <p class="text-muted">
                                <?= $user['email']; ?>
                            </p>

                            <hr>

                            <strong><i class="fa fa-sign-in mr-1"></i> NIK</strong>

                            <p class="text-muted">
                                <?= $user['nik']; ?>
                            </p>

                            <hr>

                            <strong><i class="fa fa-phone mr-1"></i> Phone</strong>

                            <p class="text-muted">
                                <?= $user['phone']; ?>
                            </p>

                            <hr>

                            <strong><i class="fa fa-user mr-1"></i> Username</strong>

                            <p class="text-muted">
                                <?= $user['username']; ?>
                            </p>

                            <hr>

                            <strong><i class="fa fa-map-marker mr-1"></i> Address</strong>

                            <p class="text-muted"><?= $user['address']; ?></p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>