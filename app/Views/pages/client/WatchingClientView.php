    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="/public/client/assets/img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Trang xem phim</h2>
                        <p>Chào mừng bạn đến với <span class="fw-bold" style="color: #e63334;">WNMOVIES</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->
    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="anime__video__player embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="<?= $data['getSlugMovies']['episodes'][0]['server_data'][0]['link_embed'] ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5><?= $data['getSlugMovies']['movie']['name']; ?></h5>
                        </div>
                        <div class="row">
                            <?php
                            $episodeIndex = 1;
                            foreach ($data['getSlugMovies']['episodes'] as $episode) {
                                foreach ($episode['server_data'] as $episodeData) {
                            ?>
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <a href="javascript:void(0);" onclick="changeEpisode('<?= $episodeData['link_embed'] ?>', '<?= $episodeData['name'] ?>')" class="d-block text-center my-2">
                                            Tập <?= $episodeData['name'] ?>
                                        </a>
                                    </div>
                            <?php
                                    $episodeIndex++;
                                }
                            }
                            ?>
                        </div>
                    </div>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Đánh giá phim</h5>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="/public/client/assets/img/anime/review-1.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Nhật Huy - <span>1 giờ trước</span></h6>
                                <p>Khi nào phim có tập mới dạ</p>
                            </div>
                        </div>
                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Bình luận</h5>
                        </div>
                        <form action="#" method="post">
                            <textarea placeholder="Đánh giá của bạn"></textarea>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Đánh giá</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
    <script>
        function changeEpisode(newEpisodeLink, episodeName) {
            document.querySelector('.anime__video__player iframe').src = newEpisodeLink;
            document.getElementById('currentEpisodeTitle').innerHTML = '<h5>' + episodeName + '</h5>';
        }
    </script>