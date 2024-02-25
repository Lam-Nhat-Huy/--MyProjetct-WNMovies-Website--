<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WNMovies</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/public/client/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/public/client/assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/public/client/assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/public/client/assets/css/plyr.css" type="text/css">
    <link rel="stylesheet" href="/public/client/assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/public/client/assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/public/client/assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/public/client/assets/css/style.css" type="text/css">
    <link rel="shortcut icon" href="/public/admin/assets/images/logos.png" />
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>


</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="/home/">
                            <img src="/public/admin/assets/images/logos.png" alt="" height="30px" width="103px">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li><a href="/home/">Trang chủ</a></li>
                                <li><a href="">Phim yêu thích</a></li>
                                <li><a href="/contact/">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right d-flex justify-content-between">
                        <?php
                        if (isset($_SESSION['client_username'])) {
                        ?>
                            <a href=""><?= $_SESSION['client_username'] ?></a>
                            <a href="/logout-client" onclick="return confirm('Bạn có chắc muốn đăng xuất?')">Đăng xuất</a>
                        <?php
                        } else {
                        ?>
                            <a href="/signin">Đăng nhập</a>
                            <a href="/signup">Đăng ký</a>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->