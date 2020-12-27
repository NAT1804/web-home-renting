<?php
    include "inc/header.php"; 
    include "inc/banner.php";
?>    
<?php 
    $post = new Post();
    $fm = new Format();
?>
    <!-- places -->
    <section class="branches py-5" id="places">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title-w3 mb-2 text-center text-bl font-weight-bold">Khu vực <span>nổi bật</span></h3>
            <!-- <p class="text-center title-w3 mb-md-5 mb-4">Excepteur sint occaecat cupidatat</p> -->
            <div class="row branches-position pt-4">
                <div class="col-lg-3 col-sm-6 place-w3">
                    <!-- branch-img -->
                    <div class="team-img team-img-1">
                        <div class="team-content">
                            <form action="post_list.php" method="POST">
                                <h4 class="text-wh">Hà Nội</h4>
                                <input type="hidden" value="1" name="province">
                                <input type="hidden" value="1" name="style">
                                <input type="submit" name="submit" value="Xem thêm">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- / branch-img -->
                <div class="col-lg-3 col-sm-6 place-w3 mt-sm-0 mt-4">
                    <!-- team-img -->
                    <div class="team-img team-img-2">
                        <div class="team-content">
                            <form action="post_list.php" method="POST">
                                <h4 class="text-wh">Hồ Chí Minh</h4>
                                <input type="hidden" value="2" name="province">
                                <input type="hidden" value="1" name="style">
                                <input type="submit" name="submit" value="Xem thêm">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.branch-img -->
                <div class="col-lg-3 col-sm-6 place-w3 mt-lg-0 mt-4">
                    <!-- team-img -->
                    <div class="team-img team-img-3">
                        <div class="team-content">
                            <form action="post_list.php" method="POST">
                                <h4 class="text-wh">Đà Nẵng</h4>
                                <input type="hidden" value="3" name="province">
                                <input type="hidden" value="1" name="style">
                                <input type="submit" name="submit" value="Xem thêm">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.branch-img -->
                <div class="col-lg-3 col-sm-6 place-w3 mt-lg-0 mt-4">
                    <!-- team-img -->
                    <div class="team-img team-img-4">
                        <div class="team-content">
                            <form action="post_list.php" method="POST">
                                <h4 class="text-wh">Hải Phòng</h4>
                                <input type="hidden" value="9" name="province">
                                <input type="hidden" value="1" name="style">
                                <input type="submit" name="submit" value="Xem thêm">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //places -->

    <!-- post -->
    <section class="blog_w3ls py-5" id="post">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title-w3 mb-2 text-center text-bl font-weight-bold">Bài đăng <span>mới nhất</span></h3>
            <!-- <p class="text-center title-w3 mb-md-5 mb-4">Excepteur sint occaecat cupidatat</p> -->
            <?php 
                $showNewPost = $post->showPostsActive();
            ?>
            
            <?php 
                $path = array();
                $totalPost = count($showNewPost);
                for ($j=0; $j<$totalPost; $j++) { 
                    if ($j % 3 == 0) {
            ?>
            <div class="row pt-4">    
                <?php 
                    $tmp = ($j + 3);
                    if ($tmp > $totalPost) $tmp = $totalPost;
                    for ($i=$j; $i<$tmp; $i++) {
                        $total_image = $showNewPost[$i]['number_image'];
                ?>
                <!-- post grid -->
                <div class="col-lg-4 col-md-6 text-center mt-lg-0 mt-5">
                    <div class="card" id="#cd">
                        <div class="card-header m-0">
                            <h5 class="blog-title card-title m-0">
                                <a href="single.html"><?php echo $showNewPost[$i]['post_title'] ?></a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <section class="slider">
                                <div class="flexslider">
                                    <ul class="slides">
                            <?php
                                for ($k=0; $k < $total_image; $k++) { 
                                    $path[$k] = "home-renting/acc".$showNewPost[$i]['account_id']."/post/post".$showNewPost[$i]['post_id']."/"."img".$k;
                            ?>
                                <li><?php echo cl_image_tag($path[$k], array("height"=>250, "width"=>250, "crop"=>"scale")); ?></li>
                            <?php } ?>
                                    </ul>
                                </div>
                            </section>                            

                            <p class="text-left" style="color: white; font-size: 20px"><?php echo $fm->formatPrice($showNewPost[$i]['price']) ?></p>
                            <p class="text-left"><?php echo $showNewPost[$i]['area']." m2"; ?></p>
                            <p class="text-right"><?php echo $showNewPost[$i]['district_name'].", ".$showNewPost[$i]['province_name']; ?></p>
                            <p class="text-left"><?php echo $fm->textShorten($showNewPost[$i]['post_description'], 200); ?></p>
                            <a class="service-btn btn mt-xl-5 mt-4" href="post_detail.php?detailPostId=<?php echo $showNewPost[$i]['post_id']; ?>">Read More<span
                                    class="fa fa-long-arrow-right ml-2"></span></a>
                        </div>
                        <div class="card-footer blog_w3icon border-top pt-2 d-flex justify-content-between">
                            <small class="text-li">
                                <b>Bởi: <?php echo $showNewPost[$i]['username']; ?></b>
                            </small>
                            <span>
                                <?php echo $showNewPost[$i]['confirm_date']; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- //post grid -->
                <?php } ?>
            </div>
            <?php }} ?>
        </div>
    </section>
    <!-- //post -->

    <!-- banner bottom -->
    <section class="w3ls-bnrbtm py-5" id="about">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title-w3 mb-md-5 mb-4 text-center text-bl font-weight-bold">Chào mừng đến với <span>EasyAccomod Site</span></h3>
            <div class="row">
                <div class="col-lg-6 text-center">
                    <img src="public/images/about.jpg" alt="about" class="img-fluid" />
                </div>
                <div class="col-lg-6 pr-xl-5 mt-xl-4 mt-lg-0 mt-4">
                    <h3 class="title-sub mb-4">Nơi bạn tìm kiếm<span>những ngôi nhà ưng ý nhất</span></h3>
                    <p class="sub-para">Giúp những căn nhà của bạn được nhiều người biết đến hơn.</p>
                    <p class="sub-para pt-4 mt-4 border-top">Chúng tôi sẽ giúp bạn thực hiện những cuộc giao dịch hoàn hảo nhất.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- //banner bottom -->

    <!-- contact-->
    <section class="contact py-5" id="contact">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title-w3 mb-2 text-center text-wh font-weight-bold">Liên hệ với <span> Admin</span></h3>
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