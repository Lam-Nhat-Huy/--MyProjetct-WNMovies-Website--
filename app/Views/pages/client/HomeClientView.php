<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="https://www.cnet.com/a/img/resize/710f6ae89b60df5986d4cf85e99ad61578527eff/hub/2024/01/05/e4cc6469-dbbd-4116-8595-e7e55f5dcc4d/mashle-season-2.jpg?auto=webp&fit=crop&height=675&width=1200" style="height: 547px;">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">Phiêu lưu</div>
                            <h2>Mashle: Magic and Muscles</h2>
                            <p>Đây là một thế giới của phép thuật...</p>
                            <a href="/detail/"><span>Xem ngay</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="/public/client/assets/img/hero/hero-1.jpg" style="height: 547px;">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">Phiêu lưu</div>
                            <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                            <p>Sau 30 ngày vòng quanh thế giới...</p>
                            <a href="/detail/"><span>Xem ngay</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Danh sách phim</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        foreach ($data['movies'] as $item) {
                        ?>
                            <a href="/detail/?slug=<?= $item['slug'] ?>/?movie_id=<?= $item['id'] ?>">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="<?= $item['thumb_url'] ?>">
                                            <div class="ep"><?= $item['year'] ?></div>
                                            <div class="comment"><?= $item['time'] ?></div>
                                            <div class="view"><?= $item['country'] ?></div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li><?= $item['category'] ?></li>
                                            </ul>
                                            <h5><a href=""><?= $item['name'] ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="pageination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <?php for ($i = 1; $i <=  $data['number']; $i++) : ?>
                                    <li class="page-item">
                                        <a style="color: #000" href="/home/?page=<?= $i ?>" class="page-link"><?= $i ?></a>
                                    </li>
                                <?php endfor ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">
                    <div class="product__sidebar__view">
                        <div class="section-title">
                            <h5>Phim mới nhất</h5>
                        </div>
                        <div class="filter__gallery">
                            <?php
                            foreach ($data['getNewMovies'] as $item) {
                            ?>
                                <div class="product__sidebar__view__item set-bg mix day years" data-setbg="<?= $item['thumb_url'] ?>">
                                    <div class="ep"><?= $item['year'] ?></div>
                                    <div class="view"><?= $item['country'] ?></div>
                                    <h5><a href="/watching/?slug=<?= $item['slug'] ?>"><?= $item['name'] ?></a></h5>
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
</section>
<!-- Product Section End -->