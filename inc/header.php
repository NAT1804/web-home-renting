<?php 
    include "lib/session.php";
    Session::init(); 
?>
<?php 
    spl_autoload_register(function($className) {
        include_once "classes/".$className.'.php';
    });
    include_once "lib/database.php";
    include_once "helpers/format.php";
?>
<?php 
    if(isset($_GET['action']) && $_GET['action'] == 'logout') {
        Session::destroy();
    }
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Trang chủ</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Land Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link href="public/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Bootstrap-Core-CSS -->
    <link href="public/css/style.css" rel='stylesheet' type='text/css' />
    <!-- <link href="public/css/style-responsive.css" rel='stylesheet' type='text/css' /> -->
    <!-- Style-CSS -->
    <link href="public/css/font-awesome.css" rel="stylesheet">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom-Files -->
    <link href="public/css/custom-style.css" rel='stylesheet' type='text/css' />
    <!-- Web-Fonts -->
    <link
        href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <!-- //Web-Fonts -->
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <div class="header d-lg-flex justify-content-between align-items-center py-2 px-sm-2 px-1">
                <!-- logo -->
                <div id="logo">
                    <h1><a href="index.php"><span class="text-bl">Easy</span>Accomod</a></h1>
                </div>
                <!-- //logo -->
                <!-- nav -->
                <div class="nav_w3ls ml-lg-5">
                    <nav>
                        <label for="drop" class="toggle">Menu</label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu">
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="index.php#home">Tìm kiếm</li>
                            <li><a href="index.php#post">Bài viết</a></li>
                            <li><a href="index.php#contact">Liên hệ</a></li>
                            <?php 
                                $noti = new Notification();
                                $fm = new Format();
                                $accId = Session::get('userId');
                                $showNotificationsUser = $noti->showNotificationsUser($accId);
                                if (isset($_SESSION["userId"]))
                                {
                                    $name = $_SESSION["username"];
                            ?>
                            <li id="header_inbox_bar" class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-important"><?php echo count($showNotificationsUser); ?></span>
                                </a>
                                <ul class="dropdown-menu extended inbox" style="background-color: black;">
                                    <li>
                                        <p class="red">Bạn có <?php echo count($showNotificationsUser); ?> thông báo</p>
                                    </li>
                                    <?php for ($i=0; $i<count($showNotificationsUser); $i++) { ?>
                                    <li>
                                        <a href="#">
                                            <span class="message">
                                                <?php echo $showNotificationsUser[$i]['reply']; ?>
                                            </span>
                                            <span class="time">
                                                <?php echo $fm->timeInAgo($showNotificationsUser[$i]['reply_at']); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li>
                                        <a href="inbox.php">Xem tất cả thông báo</a>
                                    </li>
                                </ul>
                            </li>

                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        <!-- <img alt="" src="public/images/3.png" style="height: 20%; width: 20%; border-radius: 5px"> -->
                                        <span class="username"><?php echo $name; ?></span>
                                        <b class="caret"></b>
                                    </a>
                                    <!-- <input type="checkbox" id="drop-2" /> -->
                                    <ul class="dropdown-menu extended logout" style="background-color: black;">
                                        <li><a href="#"><i class="fa fa-caret-square-o-right"></i>&nbsp;Danh sách bài đăng</a></li>
                                        <?php if ($_SESSION["role"] == 1) { ?>
                                        <li><a href="upload_post.php" class="drop-text"><i class="fa fa-wpforms"></i>&nbsp;Đăng bài viết</a></li>
                                        <?php } ?>
                                        <li><a href="logout.php"><i class="fa fa-key"></i>&nbsp;Đăng xuất</a></li>
                                    </ul>
                                </li>
                            <?php
                                } else {
                            ?>
                                <li><a href="login.php"><span class="text-bl">Đăng nhập</span></a></li>
                                <li><a href="register.php">Đăng ký</a></li>
                            <?php } ?>       
                        </ul>
                    </nav>
                </div>
                <!-- //nav -->
            </div>
        </div>
    </header>