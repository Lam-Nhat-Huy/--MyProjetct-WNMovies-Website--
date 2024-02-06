<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Danh sách phim</h3>
        <?php
        if (isset($_SESSION['message_success'])) {
            echo $_SESSION['message_success'];
            unset($_SESSION['message_success']);
        }
        ?>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive" style="overflow-x: hidden; overflow-y: hidden;">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên phim</th>
                                    <th>Slug</th>
                                    <th>Năm phát hành</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                foreach ($data['getApiMovies']['items'] as $row) {
                                ?>
                                    <tr class="text-center">
                                        <td><?= $count++ ?></td>
                                        <td><img src="<?= $data['getApiMovies']['pathImage'] . $row['thumb_url'] ?>" alt="movies1" style="width: 80px !important; height: 100px !important; border-radius: 0 !important"></td>
                                        <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                            <?= $row['name'] ?>
                                        </td>
                                        <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 270px;"><?= $row['slug'] ?></td>
                                        <td><?= $row['year'] ?></td>
                                        <td>
                                            <a href="/movie/detail/?slug=<?= $row['slug'] ?>" class="btn btn-info btn-sm"><i class="mdi mdi-calendar-text"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>