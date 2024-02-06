<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="anime__details__pic">
                    <img src="<?= $data['getSlugMovies']['movie']['thumb_url'] ?>" alt="Anime Image" class="img-fluid">
                </div>

            </div>
            <div class="col-lg-9">
                <div class="anime__details__text">
                    <div class="anime__details__title">
                        <h3><?= $data['getSlugMovies']['movie']['name']; ?></h3>
                        <span class="mt-3"><?= $data['getSlugMovies']['movie']['origin_name']; ?></span>
                    </div>
                    <p class="mt-4"><?= $data['getSlugMovies']['movie']['content']; ?></p>
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
                                    <li class="mt-2"><span>Tác giả:</span>
                                        <?php
                                        foreach ($datas['director'] as $r) {
                                            echo  $r;
                                        }
                                        ?>
                                    </li>
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
                    <div class="card-body">
                        <form action="/movie/add" method="post">
                            <div class="template-demo">
                                <input type="hidden" name="name" value="<?php echo $data['getSlugMovies']['movie']['name']; ?>">
                                <input type="hidden" name="thumb_url" value="<?php echo $data['getSlugMovies']['movie']['thumb_url']; ?>">
                                <input type="hidden" name="origin_name" value="<?php echo $data['getSlugMovies']['movie']['origin_name']; ?>">
                                <input type="hidden" name="content" value="<?php echo $data['getSlugMovies']['movie']['content']; ?>">
                                <input type="hidden" name="year" value="<?php echo $data['getSlugMovies']['movie']['year']; ?>">
                                <input type="hidden" name="time" value="<?php echo $data['getSlugMovies']['movie']['time']; ?>">
                                <input type="hidden" name="slug" value="<?php echo $data['getSlugMovies']['movie']['slug']; ?>">
                                <input type="hidden" name="lang" value="<?php echo $data['getSlugMovies']['movie']['lang']; ?>">
                                <input type="hidden" name="quality" value="<?php echo $data['getSlugMovies']['movie']['quality']; ?>">
                                <input type="hidden" name="status" value="<?php echo $data['getSlugMovies']['movie']['status']; ?>">
                                <input type="hidden" name="link_embed" value="<?= $data['getSlugMovies']['episodes'][0]['server_data'][0]['link_embed'] ?>">

                                <?php foreach ($datas['category'] as $index => $r) { ?>
                                    <input type="hidden" name="category" value="<?php echo $r['name']; ?>">
                                <?php } ?>
                                <?php foreach ($datas['country'] as $index => $country) { ?>
                                    <input type="hidden" name="country" value="<?php echo $country['name']; ?>">
                                <?php } ?>
                                <button type="submit" class="btn btn-outline-success btn-fw" onclick="return confirm('Bạn có chắc chắn muốn công chiếu phim này?')">
                                    <i class="mdi mdi-plus"></i>
                                </button>
                                <a href="/amovies/?page=1" class="btn btn-outline-danger btn-fw"><i class="mdi mdi-keyboard-return"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Additional Section Begin-->
<section class="additional-section spad mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center">Xem thử phim</h3>
                <div class="anime__video__player">
                    <iframe src="<?= $data['getSlugMovies']['episodes'][0]['server_data'][0]['link_embed'] ?>" width="100%" height="680px" frameborder="0" allowfullscreen></iframe>
                </div>

                <div class="additional__introduction mt-4">
                    <h4 class="text-center"><?= $data['getSlugMovies']['episodes'][0]['server_data'][0]['filename']; ?></h4>
                    <p class="text-center"><?= $data['getSlugMovies']['movie']['content']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="additional-section spad mt-5">
    <div class="container">
        <?php
        $episodeIndex = 1;
        foreach ($data['getSlugMovies']['episodes'] as $episode) {
            foreach ($episode['server_data'] as $episodeData) {
        ?>
                <a class="btn btn-outline-light" href="javascript:void(0);" onclick="changeEpisode('<?= $episodeData['link_embed'] ?>', '<?= $episodeData['name'] ?>')">
                    <?= $episodeData['name'] ?>
                </a>
        <?php
                $episodeIndex++;
            }
        }
        ?>
    </div>
</section>

<script>
    function changeEpisode(newEpisodeLink, episodeName) {
        document.querySelector('.anime__video__player iframe').src = newEpisodeLink;
        document.getElementById('currentEpisodeTitle').innerHTML = '<h5>' + episodeName + '</h5>';
    }
</script>