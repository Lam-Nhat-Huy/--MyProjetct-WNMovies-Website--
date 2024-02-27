<style>
    .rating:not(:checked)>input {
        position: absolute;
        appearance: none;
    }

    .rating:not(:checked)>label {
        float: right;
        cursor: pointer;
        font-size: 30px;
        fill: #666;
    }

    .rating:not(:checked)>label>svg {
        fill: #666;
        /* Set default color for SVG */
        transition: fill 0.3s ease;
        /* Add a transition effect */
    }

    .rating>input:checked+label:hover,
    .rating>input:checked+label:hover~label,
    .rating>input:checked~label:hover,
    .rating>input:checked~label:hover~label,
    .rating>label:hover~input:checked~label {
        fill: #e58e09;
    }

    .rating:not(:checked)>label:hover,
    .rating:not(:checked)>label:hover~label {
        fill: #ff9e0b;
    }

    .rating>input:checked~label>svg {
        fill: #ffa723;
        /* Set color for selected stars */
    }
</style>
<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="anime__details__pic set-bg" data-setbg="<?= $data['getSlugMovies']['movie']['thumb_url']; ?>">
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="anime__details__text">
                        <div class="anime__details__title">
                            <h3><?= $data['getSlugMovies']['movie']['name']; ?></h3>
                            <span><?= $data['getSlugMovies']['movie']['origin_name']; ?></span>
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
                            <?php
                            if (isset($_SESSION['client_username'])) {
                            ?>
                                <a href="/detail/favourite/?slug=<?= $_GET['slug'] ?>" class="follow-btn"><i class="fa fa-heart-o"></i> Yêu thích</a>
                            <?php
                            } else {
                            ?>
                                <a href="/signin" class="follow-btn"><i class="fa fa-heart-o"></i> Vui lòng đăng nhập</a>
                            <?php
                            }
                            ?>
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
                            <div class="col-lg-12">
                                <div class="rating">
                                    <input type="radio" id="star5" name="rate" value="5" />
                                    <label for="star5" title="text"><svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="star-solid">
                                            <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                                        </svg></label>
                                    <input type="radio" id="star4" name="rate" value="4" />
                                    <label for="star4" title="text"><svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="star-solid">
                                            <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                                        </svg></label>
                                    <input checked="" type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text"><svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="star-solid">
                                            <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                                        </svg></label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text"><svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="star-solid">
                                            <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                                        </svg></label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text"><svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="star-solid">
                                            <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                                        </svg></label>
                                </div>
                            </div>
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

        <div class="col-lg-12">
            <div class="trending__product">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="section-title">
                            <h4>Gợi ý phim</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    foreach ($data['recommendMovies'] as $item) {
                    ?>
                        <a href="/detail/?slug=<?= $item['slug'] ?>/?movie_id=<?= $item['id'] ?>">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?= $item['thumb_url'] ?>">
                                        <div class="ep"><?= round($item['vote_average'], 2) ?> ⭐</div>
                                        <div class="comment"><i class="fa fa-comments"></i> <?= $item['comment_count'] ?></div>
                                        <div class="view"><?= $item['score'] ?></div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li><?= $item['category'] ?></li>
                                        </ul>
                                        <h5><a href="#"><?= $item['name'] ?></a></h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Anime Section End -->