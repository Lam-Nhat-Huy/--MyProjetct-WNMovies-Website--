<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                    <div class="card-body py-0 px-0 px-sm-3">
                        <div class="row align-items-center">
                            <div class="col-4 col-sm-3 col-xl-2">
                                <img src="/public/admin/assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                            </div>
                            <div class="col-5 col-sm-7 col-xl-8 p-0">
                                <h4 class="mb-1 mb-sm-0">Chào mừng bạn đến trang quản trị của WNMoives</h4>
                                <p class="mb-0 font-weight-normal d-none d-sm-block">Thời gian hết hạn: <?= $data['remainingTime'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"><?= $data['getNewUsersCountWithinDay'] ?></h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Số lượng người dùng mới theo ngày</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"><?= $data['countMovies'] ?? '0' ?></h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <i class="mdi mdi-video"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Tổng số phim</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"><?= $data['countAdminAccount'] ?? '0' ?></h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <i class="mdi mdi-account-key"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Tài khoản quản trị</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"><?= $data['countUserAccount'] ?? '0' ?></h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <i class="mdi mdi-account"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Tài khoản người dùng</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title">Người dùng mới</h4>
                        </div>
                        <div class="preview-list">
                            <?php
                            foreach ($data['getUsers'] as $item) {
                            ?>
                                <div class="preview-item border-bottom">
                                    <div class="preview-thumbnail">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbuj8x4vZVQjh-Vow11mzwbMuzu4BT3VPy0eMXWSCxIIyoJF0_FtYW7aSwyeDtfx-1oIA&usqp=CAU" alt="image" class="rounded-circle" />
                                    </div>
                                    <div class="preview-item-content d-flex flex-grow">
                                        <div class="flex-grow">
                                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                <h6 class="preview-subject"><?= $item['username'] ?></h6>
                                                <p class="text-muted text-small">New</p>
                                            </div>
                                            <p class="text-muted"><?= $item['email'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title">Phim mới được thêm</h4>
                        </div>
                        <div class="preview-list">
                            <?php
                            foreach ($data['getMovies'] as $item) {
                            ?>
                                <div class="preview-item border-bottom">
                                    <div class="preview-thumbnail">
                                        <img src="<?= $item['thumb_url'] ?>" alt="image" class="" />
                                    </div>
                                    <div class="preview-item-content d-flex flex-grow">
                                        <div class="flex-grow">
                                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                <h6 class="preview-subject"><?= $item['name'] ?></h6>
                                                <p class="text-muted text-small">New</p>
                                            </div>
                                            <p class="text-muted"><?= $item['origin_name'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main-panel ends -->