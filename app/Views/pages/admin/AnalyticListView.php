<div class="main-panel">
    <div class="content-wrapper">
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
                                    <h3 class="mb-0"><?= $data['getNewUsersCountWithinWeek'] ?></h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Số lượng người dùng mới theo tuần</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0"><?= $data['getNewUsersCountWithinMonth'] ?></h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <i class="mdi mdi-account-multiple-plus"></i>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Số lượng người dùng mới theo tháng</h6>
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
                                            <a href="" class="text-white" style="text-decoration: none;">
                                                <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                    <h6 class="preview-subject"><?= $item['username'] ?></h6>
                                                    <p class="text-muted text-small"><?= calculateTimeDifference(strtotime($item['created_at'])); ?></p>
                                                </div>
                                                <p class="text-muted"><?= $item['email'] ?></p>
                                            </a>
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
                                            <a href="/movie/detail/?slug=<?= $item['slug'] ?>" class="text-white" style="text-decoration: none;">
                                                <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                    <h6 class="preview-subject"><?= $item['name'] ?></h6>
                                                    <p class="text-muted text-small"><?= calculateTimeDifference(strtotime($item['created_at'])); ?></p>
                                                </div>
                                                <p class="text-muted"><?= $item['origin_name'] ?></p>
                                            </a>
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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Quốc gia / Khu vực hàng đầu</h4>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <?php
                                            foreach ($data['userCountsByCountry'] as $countryCode => $countryInfo) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <i class="flag-icon flag-icon-us"></i>
                                                    </td>
                                                    <td><?= $countryInfo['name'] ?></td>
                                                    <td class="text-right"> <?= $countryInfo['count'] ?> </td>
                                                    <td class="text-right font-weight-medium"> <?= $countryCode ?> </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div id="audience-map" class="vector-map"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main-panel ends -->