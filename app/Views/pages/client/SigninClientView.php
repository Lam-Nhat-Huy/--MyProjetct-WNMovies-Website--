<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="/public/client/assets/img/normal-breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Đăng nhập</h2>
                    <p>Chào mừng bạn đến với <span class="fw-bold" style="color: #e63334;">WNMOVIES</span></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Normal Breadcrumb End -->

<!-- Signup Section Begin -->
<section class="signup spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login__form">
                    <h3>Đăng nhập</h3>
                    <form action="/signin" method="post" autocomplete="on">
                        <div class="input__item">
                            <input type="email" name="email" placeholder="Nhập email" autofocus>
                            <span class="icon_mail"></span>
                            <div class="error-message" style="color: red;"><?= $data['emailError'] ?? '' ?></div>
                        </div>
                        <div class="input__item">
                            <input type="password" name="password" placeholder="Mật khẩu">
                            <span class="icon_lock"></span>
                            <div class="error-message" style="color: red;"><?= $data['passwordError'] ?? '' ?></div>
                        </div>
                        <button type="submit" class="site-btn">Đăng nhập</button>
                        <h5>Bạn chưa có tài khoản? <a href="/signup">Đăng ký ngay</a></h5>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login__social__links">
                    <img src=https://m.media-amazon.com/images/M/MV5BM2M1Yzc5OTMtNWQxYS00NTg5LThiYjQtODRhZGMwODVkNjAyXkEyXkFqcGdeQXVyMTEzMTI1Mjk3._V1_.jpg" alt="" width="380px">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Signup Section End -->