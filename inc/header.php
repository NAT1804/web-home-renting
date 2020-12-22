<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Land Real Estates Category Bootstrap Responsive website Template | Home :: w3layouts</title>
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
    <!-- Style-CSS -->
    <link href="public/css/font-awesome.min.css" rel="stylesheet">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom-Files -->

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
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#">Advanced Search</li>
                            <li><a href="#blog">Blog</a></li>
                            <li><a href="#contact">Contact Us</a></li>
                            <?php
                                if (isset($_SESSION["UserId"]))
                                {
                                    $name = $_SESSION["Username"] ;
                                    echo '<li>' ;
                                    echo '<a href="#">Hello, ' .$name. '<span class="fa fa-angle-down" aria-hidden="true"></span></a>';
                                    echo '<input type="checkbox" id="drop-2" />';
                                    echo '<ul>
                                    <li><a href="#" class="drop-text">News</a></li>';
                                    if ($_SESSION["Role"] == 1)
                                    {
                                        echo '<li><a href="upload_post.php" class="drop-text">Upload Post</a></li>';
                                    }
                                    echo '<li><a href="logout.php" class="drop-text">Logout</a></li>' ;
                                    echo '</li>' ;
                                }
                                else 
                                {
                                    echo '<li><a href="login.php">Login</a></li>
                                          <li><a href="register.php">Register</a></li>' ;
                                }
                            ?>

                        </ul>
                    </nav>
                </div>
                <!-- //nav -->
            </div>
        </div>
    </header>