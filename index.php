<?php
    session_start() ;
    //echo $_SESSION["Role"] ;
    include "lib/connection.php" ;
?>

<?php
    include "inc/header.php";
?>
    <!-- //header -->

    <!-- banner -->
    <div class="main-w3pvt mian-content-wthree text-center" id="home">
        <div class="container">
            <div class="style-banner mx-auto">
                <h3 class="text-wh font-weight-bold">Search and Find Your <span>Luxury</span> Homes</h3>
                <p class="mt-2 text-li" id="find">Property for sale & for rent around the world</p>
                <!-- form -->
                <div class="home-form-w3ls mt-5 pt-lg-4">
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                
                                <div class="form-group">
                                    <select required="" class="form-control">
                                        <option id="title_option" value="0">Loại phòng</option>
                                        <option value="1">Phòng trọ</option>
                                        <option value="2">Chung cư mini</option>
                                        <option value="3">Nhà nguyên căn</option>
                                        <option value="4">Chung cư nguyên căn</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                
                                <div class="form-group">
                                    <select required="" class="form-control">
                                        <option value="0">Tỉnh</option>
                                        <option value="1">Hà Nội</option>
                                        <option value="2">Thành phố Hồ Chí Minh</option>
                                        <option value="3">Đà Nẵng</option>
                                        <option value="4">Hải Phòng</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn_apt">Find Here</button>
                    </form>
                </div>
                <!-- //form -->
            </div>
        </div>
    </div>
    <!-- //banner -->

    <!-- banner bottom -->
    <section class="w3ls-bnrbtm py-5" id="about">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title-w3 mb-md-5 mb-4 text-center text-bl font-weight-bold">Welcome To Our <span>EasyAccomod Site</span></h3>
            <div class="row">
                <div class="col-lg-6 text-center">
                    <img src="images/about.jpg" alt="about" class="img-fluid" />
                </div>
                <div class="col-lg-6 pr-xl-5 mt-xl-4 mt-lg-0 mt-4">
                    <h3 class="title-sub mb-4">The best place to find the <span>house you want.</span></h3>
                    <p class="sub-para">Donec consequat sapien ut leo cursus rhoncus. Nullam dui mi, vulputate ac metus
                        at, semper
                        varius orci. Nulla accumsan ac elit in congue. Class aptent taciti sociosqu ad litora torquent
                        per conubia.</p>
                    <p class="sub-para pt-4 mt-4 border-top">Donec consequat sapien ut leo cursus rhoncus. Nullam dui
                        mi, vulputate ac metus
                        at, semper varius orci. Nulla accumsan ac elit in congue. Class aptent taciti sociosqu ad
                        litora torquent per.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- //banner bottom -->

    <!-- services -->
    <!-- <div class="w3pvtits-services py-5" id="services">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title-w3 mb-2 text-center text-wh font-weight-bold">We Provide The <span>Best Services</span>
            </h3>
            <p class="text-li text-center title-w3 mb-md-5 mb-4">Excepteur sint occaecat cupidatat</p>
            <div class="row w3pvtits-services-row text-center pt-4">
                <div class="col-lg-4">
                    <div class="w3pvtits-services-grids">
                        <div class="icon-effect-wthree">
                            <span class="fa fa-home ser-icon"></span>
                        </div>
                        <h4 class="text-bl my-4">Service 1</h4>
                        <p class="text-left">Itaque earum rerum hic tenetur asap iente delectus rulla accumsan.</p>
                        <a class="service-btn btn mt-xl-5 mt-4" href="#">Read More<span
                                class="fa fa-long-arrow-right ml-2"></span></a>
                    </div>
                </div>
                <div class="col-lg-4 serv-w3mk my-lg-0 my-5">
                    <div class="w3pvtits-services-grids">
                        <div class="icon-effect-wthree">
                            <span class="fa fa-building ser-icon"></span>
                        </div>
                        <h4 class="text-bl my-4">Service 2 </h4>
                        <p class="text-left">Itaque earum rerum hic tenetur asap iente delectus rulla accumsan.</p>
                        <a class="service-btn btn mt-xl-5 mt-4" href="#">Read More<span
                                class="fa fa-long-arrow-right ml-2"></span></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="w3pvtits-services-grids">
                        <div class="icon-effect-wthree">
                            <span class="fa fa-university ser-icon"></span>
                        </div>
                        <h4 class="text-bl my-4">Service 3</h4>
                        <p class="text-left">Itaque earum rerum hic tenetur asap iente delectus rulla accumsan.</p>
                        <a class="service-btn btn mt-xl-5 mt-4" href="#">Read More<span
                                class="fa fa-long-arrow-right ml-2"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <img src="images/img.png" alt="services" class="img-fluid img-posi-w3pvt" />
    </div> -->
    <!-- //services -->

    <!-- places -->
    <section class="branches py-5" id="places">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title-w3 mb-2 text-center text-bl font-weight-bold">Most Popular <span>Places</span></h3>
            <p class="text-center title-w3 mb-md-5 mb-4">Excepteur sint occaecat cupidatat</p>
            <div class="row branches-position pt-4">
                <div class="col-lg-3 col-sm-6 place-w3">
                    <!-- branch-img -->
                    <div class="team-img team-img-1">
                        <div class="team-content">
                            <h4 class="text-wh">Place 1</h4>
                            <p class="team-meta">Hanoi</p>
                        </div>
                    </div>
                </div>
                <!-- / branch-img -->
                <div class="col-lg-3 col-sm-6 place-w3 mt-sm-0 mt-4">
                    <!-- team-img -->
                    <div class="team-img team-img-2">
                        <div class="team-content">
                            <h4 class="text-wh">Place 2</h4>
                            <p class="team-meta">Ho Chi Minh City</p>
                        </div>
                    </div>
                </div>
                <!-- /.branch-img -->
                <div class="col-lg-3 col-sm-6 place-w3 mt-lg-0 mt-4">
                    <!-- team-img -->
                    <div class="team-img team-img-3">
                        <div class="team-content">
                            <h4 class="text-wh">Place 3</h4>
                            <p class="team-meta">Da Nang</p>
                        </div>
                    </div>
                </div>
                <!-- /.branch-img -->
                <div class="col-lg-3 col-sm-6 place-w3 mt-lg-0 mt-4">
                    <!-- team-img -->
                    <div class="team-img team-img-4">
                        <div class="team-content">
                            <h4 class="text-wh">Place 4</h4>
                            <p class="team-meta">Hai Phong</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //places -->

    <!-- stats section -->
    <!-- <div class="middlesection-w3pvt py-5 mt-5" id="facts">
        <div class="container py-xl-5 py-lg-3">
            <div class="offset-lg-4 offset-md-2 offset-sm-1 left-build-wthree aboutright-w3pvtwthree">
                <h3 class="title-w3-2 title-w3 mb-md-5 mb-4 font-weight-bold">Some Statistical Facts</h3>
                <div class="row">
                    <div class="col-sm-4 w3layouts_stats_left w3_counter_grid">
                        <p class="counter">1680</p>
                        <p class="para-text-w3ls text-li">Professional Agents</p>
                    </div>
                    <div class="col-sm-4 w3layouts_stats_left w3_counter_grid2 my-sm-0 my-2">
                        <p class="counter">1200</p>
                        <p class="para-text-w3ls text-li">Property Location</p>
                    </div>
                    <div class="col-sm-4 w3layouts_stats_left w3_counter_grid1">
                        <p class="counter">400</p>
                        <p class="para-text-w3ls text-li">Awards Won</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="property-paper">
            <img src="images/img3.png" alt="" class="img-fluid agents-w3" />
        </div>
    </div> -->
    <!-- //stats section -->

    <!-- blog -->
    <section class="blog_w3ls py-5" id="blog">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title-w3 mb-2 text-center text-bl font-weight-bold">Our Latest <span>Blog</span></h3>
            <p class="text-center title-w3 mb-md-5 mb-4">Excepteur sint occaecat cupidatat</p>
            <div class="row pt-4">
                <!-- blog grid -->
                <div class="col-lg-4">
                    <div class="wthree-title mt-lg-5 pt-lg-3">
                        <h3 class="w3pvt-title text-bl">The Real Estate News</h3>
                        <p class="border-top pt-4 mt-4">
                            Donec consequat sapien ut leo cursus rhoncus. Nullam dui mi, vulputate ac metus at,
                            semper varius orci. Nulla accumsan ac
                            elit in congue.
                        </p>
                    </div>
                </div>
                <!-- //blog grid -->
                <!-- blog grid -->
                <div class="col-lg-4 col-md-6 text-center mt-lg-0 mt-5">
                    <div class="card">
                        <div class="card-header m-0">
                            <h5 class="blog-title card-title m-0">
                                <a href="single.html">Cras ultricies ligula sed.</a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="text-left">Proin eget tortor risus. Curabitur aliquet quam id dui posuere
                                blandit. Vivamus
                                magna justo,
                                lacinia eget consectetur sed, convallis at tellus. Vestibulum ac diam sit.</p>
                            <a class="service-btn btn mt-xl-5 mt-4" href="#">Read More<span
                                    class="fa fa-long-arrow-right ml-2"></span></a>
                        </div>
                        <div class="card-footer blog_w3icon border-top pt-2 d-flex justify-content-between">
                            <small class="text-li">
                                <b>By: Loremipsum</b>
                            </small>
                            <span>
                                Oct 18,2018
                            </span>
                        </div>
                    </div>
                </div>
                <!-- //blog grid -->
                <!-- blog grid -->
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-md-5 mt-4 text-center">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="blog-title card-title m-0">
                                <a href="single.html">Cras ultricies ligula sed.</a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="text-left">Proin eget tortor risus. Curabitur aliquet quam id dui posuere
                                blandit. Vivamus
                                magna justo,
                                lacinia eget consectetur sed, convallis at tellus. Vestibulum ac diam sit.</p>
                            <a class="service-btn btn mt-xl-5 mt-4" href="#">Read More<span
                                    class="fa fa-long-arrow-right ml-2"></span></a>
                        </div>
                        <div class="card-footer blog_w3icon border-top pt-2 d-flex justify-content-between">
                            <small class="text-li">
                                <b>By: Loremipsum</b>
                            </small>
                            <span>
                                Oct 21,2018
                            </span>
                        </div>
                    </div>
                </div>
                <!-- //blog grid -->
            </div>
        </div>
    </section>
    <!-- //blog -->

    <!-- gallery -->
    <div class="gallery pb-5" id="gallery">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title-w3 mb-2 text-center text-bl font-weight-bold">Our <span>Gallery</span></h3>
            <p class="text-center title-w3 mb-md-5 mb-4">Excepteur sint occaecat cupidatat</p>
            <div class="row news-grids text-center no-gutters">
                <div class="col-md-4 gal-img">
                    <a href="#gal1"><img src="images/g1.jpg" alt="Gallery Image" class="img-fluid"></a>
                </div>
                <div class="col-md-4 gal-img">
                    <a href="#gal2"><img src="images/g2.jpg" alt="Gallery Image" class="img-fluid"></a>
                </div>
                <div class="col-md-4 gal-img">
                    <a href="#gal3"><img src="images/g3.jpg" alt="Gallery Image" class="img-fluid"></a>
                </div>
            </div>
            <div class="row news-grids text-center no-gutters">
                <div class="col-md-4 gal-img">
                    <a href="#gal4"><img src="images/g4.jpg" alt="Gallery Image" class="img-fluid"></a>
                </div>
                <div class="col-md-4 gal-img">
                    <a href="#gal5"><img src="images/g5.jpg" alt="Gallery Image" class="img-fluid"></a>
                </div>
                <div class="col-md-4 gal-img">
                    <a href="#gal6"><img src="images/g6.jpg" alt="Gallery Image" class="img-fluid"></a>
                </div>
            </div>
            <!-- gallery popups -->
            <!-- popup-->
            <div id="gal1" class="pop-overlay animate">
                <div class="popup">
                    <img src="images/g1.jpg" alt="Popup Image" class="img-fluid" />
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
                        dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <!-- popup-->
            <div id="gal2" class="pop-overlay animate">
                <div class="popup">
                    <img src="images/g2.jpg" alt="Popup Image" class="img-fluid" />
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
                        dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <!-- popup-->
            <div id="gal3" class="pop-overlay animate">
                <div class="popup">
                    <img src="images/g3.jpg" alt="Popup Image" class="img-fluid" />
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
                        dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup3 -->
            <!-- popup-->
            <div id="gal4" class="pop-overlay animate">
                <div class="popup">
                    <img src="images/g4.jpg" alt="Popup Image" class="img-fluid" />
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
                        dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <!-- popup-->
            <div id="gal5" class="pop-overlay animate">
                <div class="popup">
                    <img src="images/g5.jpg" alt="Popup Image" class="img-fluid" />
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
                        dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <!-- popup-->
            <div id="gal6" class="pop-overlay animate">
                <div class="popup">
                    <img src="images/g6.jpg" alt="Popup Image" class="img-fluid" />
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
                        dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <!-- //gallery popups -->
        </div>
    </div>
    <!-- //gallery -->

    <!-- testimonials -->
    <section class="clients py-5 text-center" id="testi">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title-w3 mb-2 text-center text-wh font-weight-bold">What Our <span>Customers</span> Says</h3>
            <p class="text-center text-li title-w3 mb-sm-5 mb-4">Excepteur sint occaecat cupidatat</p>
            <div class="feedback-info">
                <div class="feedback-top">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sedc dnmo eiusmod.
                        sed do eiusmod tempor
                        incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi</p>
                    <img src="images/te1.jpg" alt=" " class="img-fluid rounded-circle mt-5">
                    <h4 class="mt-4 text-wh font-weight-bold mb-4">Mary Jane</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- //testimonials -->

    <!-- apps -->
    <div class="apps_w3w3pvt bg-light py-5" id="apps">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title-w3 mb-2 text-center text-bl font-weight-bold">Download The <span>Application</span></h3>
            <p class="text-center title-w3 mb-md-5 mb-4">Excepteur sint occaecat cupidatat</p>
            <ul class="list-unstyled apps-lists text-center pt-4">
                <li>
                    <a href="#"><span class="fa fa-apple mr-3"></span>App Store</a>
                </li>
                <li>
                    <a href="#" class="active"><span class="fa fa-windows mr-3"></span>Windows Store</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-android mr-3"></span>Android</a>
                </li>
            </ul>
        </div>
        <img src="images/img2.png" alt="" class="img-fluid img-podi-w3ls">
    </div>
    <!-- //apps -->

    <!-- contact-->
    <section class="contact py-5" id="contact">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title-w3 mb-2 text-center text-wh font-weight-bold">Contact <span>Us</span></h3>
            <p class="text-center text-li title-w3 mb-md-5 mb-4">Excepteur sint occaecat cupidatat</p>
            <div class="contact_grid_right pt-4">
                <form action="#" method="post">
                    <div class="row contact_left_grid">
                        <div class="col-lg-6 con-left">
                            <div class="form-group">
                                <input class="form-control" type="text" name="Name" placeholder="Name" required="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" name="Email" placeholder="Email" required="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="Subject" placeholder="Subject"
                                    required="">
                            </div>
                        </div>
                        <div class="col-lg-6 con-right">
                            <div class="form-group">
                                <textarea id="textarea" placeholder="Message" required=""></textarea>
                            </div>
                            <button class="form-control btn" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- //Contact -->

    <?php
        include "inc/footer.php";
    ?>
</body>

</html>