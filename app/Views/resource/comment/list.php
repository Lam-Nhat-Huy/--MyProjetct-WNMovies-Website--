<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Bình luận mới</h4>
            </p>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Bình luận </th>
                            <th> Người dùng </th>
                            <th> Phim </th>
                            <th> Hàng động </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($data['getComment'] as $item) {

                        ?>
                            <tr>
                                <td> <?= $count++ ?> </td>
                                <td> <?= $item['comment'] ?> </td>
                                <td> <?= $item['username'] ?> </td>
                                <td> <?= $item['name'] ?> </td>
                                <td>
                                    <a href="/comment/delete/?comment_id=<?= $item['comment_id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa phim này?')"><i class="mdi mdi-delete"></i></a>
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