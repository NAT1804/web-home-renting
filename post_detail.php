<?php
    include "inc/header.php" ;
?>
<?php 
    if (!$_GET['detailPostId'] || $_GET['detailPostId'] == NULL) {
        echo "<script>window.location = 'index.php'</script>";
    } else {
        $id = $_GET['detailPostId'];
    }
?>
<br>
<div class="inner-banner-w3ls py-5" id="home">
    <div class="row">
        <div class="container py-xl-5 py-lg-2">
            <div class="bg-light rounded bg-lg-8">
                <?php 
                    $post = new Post();
                    $fm = new Format();
                    $getPostById = $post->getPostById($id);
                ?>
                <div class="post-box">
                    <div class="title-post">
                        <hr>
                        <h2 style="color: red;"><?php echo $getPostById[0]['post_title']; ?></h2>
                        <hr>
                    </div>
                    <div class="img-box" style="width: 50%; margin: auto;">
                        <section class="slider">
                            <div class="flexslider">
                                <ul class="slides">
                        <?php
                            $path = array();
                            $total_image = $getPostById[0]['number_image'];
                            for ($i=0; $i < $total_image; $i++) { 
                                $path[$i] = "home-renting/acc".$getPostById[0]['account_id']."/post/post".$getPostById[0]['post_id']."/"."img".$i;
                        ?>
                            <li><?php echo cl_image_tag($path[$i], array("height"=>500, "width"=>500, "crop"=>"scale")); ?></li>
                        <?php } ?>
                                </ul>
                            </div>
                        </section>
                        <hr>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-striped b-t b-light">
                            <tbody>
                                <tr>
                                    <td class="name" style="font-weight: bold;">Loại tin</td>
                                    <td colspan="3"><?php echo $getPostById[0]['style_name']." cho thuê tại ".$getPostById[0]['district_name'].", ".$getPostById[0]['province_name'] ?></td>
                                </tr>
                                <tr>
                                    <td class="name" style="font-weight: bold;">Địa chỉ</td>
                                    <td colspan="3"><?php echo "Số nhà ".$getPostById[0]['house_number'].", ".$getPostById[0]['street'].", ".$getPostById[0]['district_name'].", ".$getPostById[0]['province_name'] ?></td>
                                </tr>
                                <tr>
                                    <td class="name" style="font-weight: bold;">Mã tin</td>
                                    <td><?php echo "#".$getPostById[0]['post_id'] ?></td>
                                    <td class="name" style="font-weight: bold;">Người đăng</td>
                                    <td><?php echo $getPostById[0]['username']; ?></td>
                                </tr>
                                <tr>
                                    <td class="name" style="font-weight: bold;">Email</td>
                                    <td><?php echo $getPostById[0]['email'] ?></td>
                                    <td class="name" style="font-weight: bold;">Điện thoại</td>
                                    <td><?php echo $getPostById[0]['phone_number']; ?></td>
                                </tr>
                                <tr>
                                    <td class="name" style="font-weight: bold;">Diện tích</td>
                                    <td><?php echo $getPostById[0]['area']." m2"; ?></td>
                                    <td class="name" style="font-weight: bold;">Giá thuê</td>
                                    <td><?php echo $fm->formatPrice($getPostById[0]['price']); ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Mô tả thêm</td>
                                    <td colspan="3"><textarea rows="7" style="height:100%; width: 100%;" disabled><?php echo $getPostById[0]['post_description']; ?></textarea></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="detail-box">
                        <p>Đăng vào <?php echo $getPostById[0]['confirm_date']; ?></p>
                        <hr>
                    </div>

                    <div class="card my-4">
                        <h5 class="card-header">Đánh giá:</h5>
                        <div class="card-body">
                            <form action="" method="">
                                <fieldset class="form-group" data-role="controlgroup">
                                    <input type="radio" id="star1" name="rating" value=1 checked>
                                    <label class="col-form-label" for="star1">1* </label>
                                    <input type="radio" id="star2" name="rating" value=2>
                                    <label class="col-form-label" for="star2">2* </label>
                                    <input type="radio" id="star3" name="rating" value=2>
                                    <label class="col-form-label" for="star3">3* </label>
                                    <input type="radio" id="star4" name="rating" value=2>
                                    <label class="col-form-label" for="star4">4* </label>
                                    <input type="radio" id="star5" name="rating" value=2>
                                    <label class="col-form-label" for="star5">5* </label><br>
                                </fieldset>
                                <div class="form-group">
                                    <textarea placeholder="Thêm bình luận" class="form-control" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </form>
                        </div>
                    </div>

                    <div class="comment-box">
                        <!--Comment box -->
                        <div class="media mb-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Name</h5>
                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                            </div>
                        </div>
                        <!-- //Comment box -->
                    </div>
                </div>
            </div>
        </div>

    </div>
  
</div>

<?php
    include "inc/footer.php" ;
?>
