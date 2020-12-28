<?php
    include "inc/header.php" ;
    include_once "classes/comment.php";
?>
<?php 
    $post = new Post();
    if (!$_GET['detailPostId'] || !$_GET['detailAccId']) {
        echo "<script>window.location = 'activepostslist.php'</script>";
    } else {
        $id = $_GET['detailPostId'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $updatePost = $post->updatePost($_POST, $_FILES, $id);
    }
    $getPostById = $post->getPostById($id);
?>
<br>
<div class="inner-banner-w3ls py-5" id="home">
    <div class="row">
        <div class="container py-xl-5 py-lg-2">
            <?php 
                
            ?>
            <div class="bg-light rounded bg-lg-8">
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
                                    <td rowspan="3" class="name" style="font-weight: bold;">Chi tiết</td>
                                    <td><?php echo ($getPostById[0]['owner'] == 0) ? "Không chung chủ" : "Chung chủ"; ?></td>
                                    <td ><?php echo ($getPostById[0]['bath_type'] == 0) ? "Phòng tắm khép kín" : "Phòng tắm chung"; ?></td>
                                    <td><?php echo ($getPostById[0]['water_heater'] == 0) ? "Không có bình nóng lạnh" : "Có bình nóng lạnh"; ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo ($getPostById[0]['kitchen'] == 0) ? "Không nấu ăn" : (($getPostById[0]['kitchen'] == 1) ? "Khu bếp chung" : "Khu bếp riêng"); ?></td>
                                    <td><?php echo ($getPostById[0]['air_conditioner']==0) ? "Không có điều hòa" : "Có điều hòa"; ?></td>
                                    <td><?php echo ($getPostById[0]['balcony'] == 0) ? "Không có ban công" : "Có ban công"; ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo "Giá điện: ".$fm->format_currency($getPostById[0]['electric_price'])." VND"; ?></td>
                                    <td><?php echo "Giá nước: ".$fm->format_currency($getPostById[0]['water_price'])." VND"; ?></td>
                                    
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

                    
                </div>
            </div>
        </div>

    </div>
  
</div>

<?php
    include "inc/footer.php" ;
?>
