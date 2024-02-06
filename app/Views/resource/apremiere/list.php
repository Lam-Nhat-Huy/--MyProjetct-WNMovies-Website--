<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Danh sách phim đang chiếu</h3>
        <?php
        if (isset($_SESSION['message_success'])) {
            echo $_SESSION['message_success'];
            unset($_SESSION['message_success']);
        }
        ?>
        <div>
            <a href="/restore" class="btn btn-outline-primary"><i class="mdi mdi-history"></i></a>
            <a href="/premiere/add/" class="btn btn-outline-success"><i class="mdi mdi-plus"></i></a>
        </div>
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
                                foreach ($data['movies'] as $r) {
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
                                            <a href="/premiere/edit/?id=<?= $r['id'] ?>" class="btn btn-outline-dribbble btn-sm"><i class="mdi mdi-pencil"></i></a>
                                            <a href="/movie/detail/?slug=<?= $r['slug'] ?>" class="btn btn-outline-warning btn-sm"><i class="mdi mdi-table-edit"></i></a>
                                            <a href="/premiere/delete/?id=<?= $r['id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa phim này?')"><i class="mdi mdi-delete"></i></a>
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
                                    <a style="color: #fff" href="/premiere/?page=<?= $i ?>" class="page-link"><?= $i ?></a>
                                </li>
                            <?php endfor ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>