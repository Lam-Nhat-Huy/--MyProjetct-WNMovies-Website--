<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Danh sách phim đang chiếu</h3>
        <?php
        if (isset($_SESSION['message_success'])) {
            echo $_SESSION['message_success'];
            unset($_SESSION['message_success']);
        }
        ?>
        <a href="/premiere/" class="btn btn-outline-danger"><i class="mdi mdi-keyboard-return"></i></a>

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
                                    <th>Trạng thái</th>
                                    <th>Quốc gia</th>
                                    <th>Thể loại</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                foreach ($data['historyDeletedMovies'] as $r) {
                                ?>
                                    <tr class="text-center">
                                        <td><?= $count++ ?></td>
                                        <td><img src="<?= $r['thumb_url'] ?>" alt="movies1" style="width: 80px !important; height: 100px !important; border-radius: 0 !important"></td>
                                        <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;"><?= $r['name'] ?></td>
                                        <td><?= $r['slug'] ?></td>
                                        <td><?= $r['year'] ?></td>
                                        <td><?php echo ($r['status'] == "completed") ? "Hoàn thành" : "Đang chiếu" ?></td>
                                        <td><?= $r['country'] ?></td>
                                        <td><?= $r['category'] ?></td>
                                        <td>
                                            <a href="/premiere/restore/?id=<?= $r['id'] ?>" class="btn btn-success btn-sm" onclick="return confirm('Bạn có chắc muốn phục hồi phim này?')"><i class="mdi mdi-history"></i></a>
                                            <a href="/premiere/permanently/?id=<?= $r['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc xóa vĩnh viễn phim này?')"><i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            <tbody>
                        </table>
                    </div>
                </div>
                <div class="pageination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php for ($i = 1; $i <=  $data['number']; $i++) : ?>
                                <li class="page-item">
                                    <a style="color: #fff" href="/restore/?page=<?= $i ?>" class="page-link"><?= $i ?></a>
                                </li>
                            <?php endfor ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>