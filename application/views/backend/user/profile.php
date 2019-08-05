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
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-6 ml-1">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4 mt-3 pl-3">
                        <img src="<?= base_url('uploads/profile/') . $user['image']; ?>" class="img-thumbnail" alt="Profile Image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['name']; ?></h5>
                            <p class="card-text"><small><?= $user['address']; ?></small></p>
                            <p class="card-text"><small class="text-muted">Registered at <?= date('d F Y', $user['date_created']); ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center mb-4">
                    <a href="<?= base_url('profile/edit/'); ?>" class="btn btn-primary">Edit Profile</a>
                    <a href="<?= base_url('profile/detail/'); ?>" class="btn btn-primary">Detail Profile</a>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->