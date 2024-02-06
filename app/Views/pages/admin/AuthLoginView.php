<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">
                        <div class="text-center mb-4">
                            <img src="/public/admin/assets/images/logos.png" alt="Logo" class="img-fluid" style="max-width: 100%; height: 40px">
                        </div>
                        <form id="loginForm" method="post" action="/admin" autocomplete="on">
                            <div class="form-group">
                                <label for="username">Tên đăng nhập *</label>
                                <input autofocus type="text" id="username" name="username" class="form-control p_input">
                                <div class="error-message" style="color: red;"><?= $data['usernameError'] ?? '' ?></div>
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu *</label>
                                <input type="password" id="password" name="password" class="form-control p_input">
                                <div class="error-message" style="color: red;"><?= $data['passwordError'] ?? '' ?></div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <a href="#" class="forgot-pass">Quên mật khẩu</a>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block enter-btn">Đăng nhập<button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>