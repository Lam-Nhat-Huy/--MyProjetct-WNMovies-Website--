<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg" data-setbg="<?= $data['getSlugMovies']['movie']['thumb_url']; ?>">
                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3><?= $data['getSlugMovies']['movie']['name']; ?></h3>
                            <span><?= $data['getSlugMovies']['movie']['origin_name']; ?></span>
                        </div>
                        <div class="anime__details__rating">
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </div>
                            <span>1.029 Votes</span>
                        </div>
                        <p><?= $data['getSlugMovies']['movie']['content']; ?></p>
                        <div class="anime__details__widget">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul class="list-unstyled">
                                        <?php
                                        $datas = $data['getSlugMovies']['movie'];
                                        ?>
                                        <li><span>Thể loại:</span>
                                            <?php foreach ($datas['category'] as $index => $r) {
                                                echo $r['name'];
                                                if ($index < count($datas['category']) - 1) {
                                                    echo ', ';
                                                }
                                            } ?>
                                        </li>
                                        <li class="mt-2"><span>Quốc gia:</span>
                                            <?php
                                            foreach ($datas['country'] as $r) {
                                                echo $r['name'];
                                            }
                                            ?>
                                        </li>
                                        <li class="mt-2"><span>Năm phát hành:</span> <?= $data['getSlugMovies']['movie']['year']; ?></li>
                                        <li class="mt-2"><span>Thời gian:</span> <?= $data['getSlugMovies']['movie']['time']; ?></li>
                                        <li class="mt-2"><span>Slug:</span> <?= $data['getSlugMovies']['movie']['slug']; ?></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul class="list-unstyled">
                                        <li><span>Diễn viên:</span>
                                            <?php foreach ($datas['actor'] as $index => $r) {
                                                echo $r;
                                                if ($index < count($datas['actor']) - 1) {
                                                    echo ', ';
                                                }
                                            } ?>
                                        </li>
                                        <li class="mt-2"><span>Phụ đề:</span> <?= $data['getSlugMovies']['movie']['lang']; ?></li>
                                        <li class="mt-2"><span>Chất lượng:</span> <?= $data['getSlugMovies']['movie']['quality']; ?></li>
                                        <li class="mt-2"><span>Trạng thái:</span> <span class="text-success"><?= $data['getSlugMovies']['movie']['status']; ?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="anime__details__btn">
                            <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Thêm phim vào mục yêu thích</a>
                            <a href="/watching/?slug=<?= $_GET['slug'] ?>" class="watch-btn"><span>Xem ngay</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="anime__details__review">
                    <div class="section-title">
                        <h5>Đánh giá phim</h5>
                    </div>
                    <?php
                    foreach ($data['getCommentsById'] as $item) {
                    ?>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="/public/client/assets/img/anime/review-1.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6><?= $item['username'] ?> - <span><?= calculateTimeDifference(strtotime($item['created_at'])); ?></span></h6>
                                <p><?= $item['comment'] ?></p>
                                <?php
                                // Check if the logged-in user is the author of the comment
                                if (isset($_SESSION['client_user_id']) && $_SESSION['client_user_id'] == $item['user_id']) {
                                    echo "<a class='float-right text-danger' href='/watching/delete/?id={$item['id']}'><i class='fa fa-trash'></i></a>";
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <?php
                if (isset($_SESSION['client_username'])) {
                ?>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Đánh giá tại đây</h5>
                        </div>
                        <form action="" method="post">
                            <textarea name="comment" placeholder="Viết đánh giá tại đây"></textarea>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Đánh giá</button>
                        </form>
                    </div>
                <?php
                } else {
                ?><p class='text-center' style='color: #fff; font-size: 18px;'>Vui lòng <a style="color: #e63334;" href='/signin'>đăng nhập</a> để bình luận.</p>
                <?php
                }

                ?>
            </div>
            <div class="col-lg-4">
                <div class="product__sidebar">
                    <div class="product__sidebar__view">
                        <div class="section-title">
                            <h5>Phim liên quan</h5>
                        </div>
                        <div class="filter__gallery">
                            <?php
                            foreach ($data['getAllMovies'] as $item) {
                            ?>
                                <a href="/watching/?slug=<?= $item['slug'] ?>">
                                    <div class="product__sidebar__view__item set-bg mix day years" data-setbg="<?= $item['thumb_url'] ?>">
                                        <div class="ep"><?= $item['year'] ?></div>
                                        <div class="view"><?= $item['country'] ?></div>
                                        <h5><a href=""><?= $item['name'] ?></a></h5>
                                    </div>
                                </a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Anime Section End -->