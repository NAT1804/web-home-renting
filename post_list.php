<?php
    include "inc/header.php" ;
    include "inc/banner.php";
?>
<?php  

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $post = new Post();
        $fm = new Format();

        if (isset($_POST['style'])) {
            $styleId = $_POST['style'];
            if (!empty($_POST['province'])) {
                $provinceId = $_POST['province'];
                if (!empty($_POST['district'])) {
                    $districtId = $_POST['district'];
                    $getPost = $post->getPostByProvinceAndDistrict($styleId, $provinceId, $districtId);
                } else {
                    $getPost = $post->getPostByProvince($styleId, $provinceId);
                }
            } else {
                $getPost = $post->getPostByStyle($styleId);
            }
        }
    }
?>
    <div class="container py-xl-5 py-lg-3">    
        <div class="row pt-4">
            <?php 
                $totalPost = count($getPost);
                if ($totalPost == 0) {
            ?>
                <div class="col-lg-12 col-md-6 text-center mt-lg-0 mt-5">
                    <div class="card h-100">
                        <h4 class="card-header">Không có bài viết nào</h4>
                    </div>
                </div>
            <?php
                } else {
                    for ($i=0; $i < $totalPost; $i++) { 
            ?>
            <div class="col-lg-4 col-md-6 text-center mt-lg-0 mt-5">
                <div class="card h-100">
                    <h4 class="card-header"><?php echo $getPost[$i]['post_title']; ?></h4>
                    <div class="card-body">
                        <section class="slider">
                            <div class="flexslider">
                                <ul class="slides">
                        <?php
                            $path = array();
                            $total_image = $getPost[$i]['number_image'];
                            for ($k=0; $k < $total_image; $k++) { 
                                $path[$k] = "home-renting/acc".$getPost[$i]['account_id']."/post/post".$getPost[$i]['post_id']."/"."img".$k;
                        ?>
                            <li><?php echo cl_image_tag($path[$k], array("height"=>250, "width"=>250, "crop"=>"scale")); ?></li>
                        <?php } ?>
                                </ul>
                            </div>
                        </section>                            

                        <p class="text-left" style="color: white; font-size: 20px"><?php echo $fm->formatPrice($getPost[$i]['price']) ?></p>
                        <p class="text-left"><?php echo $getPost[$i]['area']." m2"; ?></p>
                        <p class="text-right"><?php echo $getPost[$i]['district_name'].", ".$getPost[$i]['province_name']; ?></p>
                        <p class="text-left"><?php echo $fm->textShorten($getPost[$i]['post_description'], 200); ?></p>
                        <a class="service-btn btn mt-xl-5 mt-4" href="post_detail.php?detailPostId=<?php echo $getPost[$i]['post_id']; ?>">Read More<span
                                class="fa fa-long-arrow-right ml-2"></span></a>
                    </div>
                    <div class="card-footer blog_w3icon border-top pt-2 d-flex justify-content-between">
                        <small class="text-li">
                            <b>Bởi: <?php echo $getPost[$i]['username']; ?></b>
                        </small>
                        <span>
                            <?php echo $getPost[$i]['confirm_date']; ?>
                        </span>
                    </div>
                </div>
            </div>
            <?php }} ?>
        </div>
        <br>
    </div>
</div>
</div>
<?php
    include "inc/footer.php" ;
?>
