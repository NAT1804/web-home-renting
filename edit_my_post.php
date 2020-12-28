<?php   
    include "inc/header.php";
    include_once "classes/post.php";
?>
<?php 
    $post = new Post();
    if (!$_GET['editPostId'] || $_GET['editPostId'] == NULL) {
        echo "<script>window.location = 'activepostslist.php'</script>";
    } else {
        $id = $_GET['editPostId'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $updatePost = $post->updatePost($_POST, $_FILES, $id);
    }
?>
    <!-- inner banner -->
    <div class="inner-banner-w3ls py-5" id="home">
        <div class="container py-xl-5 py-lg-3">
            <!-- register  -->
            <div class="modal-body mt-md-2 mt-5">
                <h3 class="title-w3 mb-5 text-center text-wh font-weight-bold">Sửa bài</h3>
                <form action="" class="form-horizontal bucket-form" method="post" enctype="multipart/form-data">
                    <div class="form-group" >
                        <label class=" col-sm-3 control-label"></label>
                        <div class="col-sm-12" style="text-align: center;">
                            <?php 
                                if (isset($updatePost)) {
                                    echo $updatePost; 
                                }
                                $getPostById = $post->getPostById($id);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-form-label control-label">Tiêu đề</label>
                        <div class="col-sm-12">
                            <input name="title" type="text" class="form-control" value="<?php echo $getPostById[0]['post_title']; ?>" >
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Loại tin</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" name="style">
                                <option>Chọn loại tin</option>
                                <?php  
                                    $style = new Style();
                                    $stylesList = $style->showStyles();

                                    if (!empty($stylesList)) {
                                        for($i=0; $i<count($stylesList); $i++) {
                                ?>
                                <option 
                                <?php 
                                    if ($getPostById[0]['style_id'] == $stylesList[$i]['style_id']) {
                                        echo " selected ";
                                    }
                                ?>
                                value="<?php echo $stylesList[$i]['style_id']; ?>"><?php echo $stylesList[$i]['style_name'] ?></option>
                                <?php  }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-6 col-form-label control-label">Tỉnh/Thành phố</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" id="city" name="city" style="overflow: auto;">
                                <option>Chọn tỉnh/thành phố</option>
                                <?php 
                                    $city = new City();
                                    $citiesList = $city->showCities();

                                    if (!empty($citiesList)) {
                                        for($i=0; $i<count($citiesList); $i++) {
                                ?>
                                <option <?php if($getPostById[0]['province_id'] == $citiesList[$i]['province_id']){ ?> selected <?php } ?> value="<?php echo $citiesList[$i]['province_id']; ?>"><?php echo $citiesList[$i]['province_name'] ?></option>
                                <?php  }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Quận/Huyện</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" id="district" name="district">
                                <option>Chọn quận huyện</option>
                                <?php 
                                    $district = new District();
                                    $result = $district->getNameById($getPostById[0]['district_id']);
                                ?>
                                <option selected value="<?php echo $getPostById[0]['district_id'] ?>"><?php echo $result[0]['district_name'] ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Đường</label>
                        <div class="col-sm-12">
                            <input name="street" type="text" class="form-control" value="<?php echo $getPostById[0]['street']; ?>">
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Số nhà</label>
                        <div class="col-sm-12">
                            <input name="numberhouse" type="text" class="form-control" value="<?php echo $getPostById[0]['house_number']; ?>">
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-6 col-form-label control-label">Diện tích (m2)</label>
                        <div class="col-sm-12">
                            <input name="area" type="number" class="form-control" value="<?php echo $getPostById[0]['area']; ?>">
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Số phòng</label>
                        <div class="col-sm-12">
                            <input name="numberroom" type="number" class="form-control" value="<?php echo $getPostById[0]['number_of_rooms']; ?>">
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Chung chủ</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" name="owner">
                                <option>Chọn loại</option>
                                <?php  
                                    if($getPostById[0]['owner'] == 0) {
                                ?>
                                    <option selected value="0">Không</option>
                                    <option value="1">Có</option>
                                <?php } else { ?>
                                    <option value="0">Không</option>
                                    <option selected value="1">Có</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Phòng tắm</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" name="bath">
                                <option>Chọn loại</option>
                                <?php 
                                    if($getPostById[0]['bath_type'] == 0) {
                                ?>
                                    <option selected value="0">Không</option>
                                    <option value="1">Có</option>
                                <?php } else { ?>
                                    <option value="0">Không</option>
                                    <option selected value="1">Có</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-6 col-form-label control-label">Bình nóng lạnh</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" name="waterheater">
                                <option>Chọn loại</option>
                                <?php 
                                    if($getPostById[0]['water_heater'] == 0) {
                                ?>
                                    <option selected value="0">Không</option>
                                    <option value="1">Có</option>
                                <?php } else { ?>
                                    <option value="0">Không</option>
                                    <option selected value="1">Có</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Phòng bếp</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" name="kitchen">
                                <option>Chọn loại</option>
                                <?php 
                                    if($getPostById[0]['kitchen'] == 0) {
                                ?>
                                    <option selected value="0">Không nấu ăn</option>
                                    <option value="1">Khu bếp chung</option>
                                    <option value="2">Khu bếp riêng</option>
                                <?php } else if ($getPostById[0]['kitchen'] == 1) { ?>
                                    <option value="0">Không nấu ăn</option>
                                    <option selected value="1">Khu bếp chung</option>
                                    <option value="2">Khu bếp riêng</option>
                                <?php } else { ?>
                                    <option value="0">Không nấu ăn</option>
                                    <option value="1">Khu bếp chung</option>
                                    <option selected value="2">Khu bếp riêng</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Điều hòa</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" name="air">
                                <option>Chọn loại</option>
                                <?php
                                    if($getPostById[0]['air_conditioner'] == 0) {
                                ?>
                                    <option selected value="0">Không</option>
                                    <option value="1">Có</option>
                                <?php } else { ?>
                                    <option value="0">Không</option>
                                    <option selected value="1">Có</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Ban công</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" name="balcony">
                                <option>Chọn loại</option>
                                <?php 
                                    if($getPostById[0]['balcony'] == 0) {
                                ?>
                                    <option selected value="0">Không</option>
                                    <option value="1">Có</option>
                                <?php } else { ?>
                                    <option value="0">Không</option>
                                    <option selected value="1">Có</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-6 col-form-label control-label">Giá thuê(tháng)</label>
                        <div class="col-sm-12">
                            <input name="rentprice" type="number" class="form-control" value="<?php echo $getPostById[0]['price']; ?>">
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Điện nước</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" id="elecwater" name="elecwater">
                                <option>Chọn loại</option>
                                <?php
                                    if($getPostById[0]['electric_water'] == 0) {
                                ?>
                                    <option selected value="0">Giá dân</option>
                                    <option value="1">Giá thuê</option>
                                <?php } else { ?>
                                    <option value="0">Giá dân</option>
                                    <option selected value="1">Giá thuê</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-6 col-form-label control-label">Giá điện(kWh)</label>
                        <div class="col-sm-12">
                            <input name="elec" type="text" id="elec" class="form-control" value="<?php 
                            echo $getPostById[0]['electric_price'];
                            ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-6 col-form-label control-label">Giá nước(m3)</label>
                        <div class="col-sm-12">
                            <input name="water" type="text" id="water" class="form-control" value="<?php echo $getPostById[0]['water_price'];
                            ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Khu lân cận</label>
                        <div class="col-sm-12">
                            <input name="close" type="text" class="form-control" value="<?php echo $getPostById[0]['close_place']; ?>">
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-6 col-form-label control-label">Thời gian đăng bài (ngày)</label>
                        <div class="col-sm-12">
                            <input name="time" type="number" id="time" class="form-control" value="<?php echo $getPostById[0]['time']; ?>">
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Phí đăng bài</label>
                        <div class="col-sm-12">
                            <input name="price" type="text" id="price" class="form-control" value="<?php echo $getPostById[0]['post_price']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Mô tả thêm</label>
                        <div class="col-sm-12">
                            <textarea name="description" class="form-control" rows="4" ><?php echo $getPostById[0]['post_description']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Hình ảnh</label>
                        <div class="col-sm-12">
                            <input name="upload[]" type="file" class="form-control" multiple >
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-12">
                            <input name="numberimage" type="hidden" class="form-control" value="<?php echo $getPostById[0]['number_image'] ?>" readonly>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <?php 
                            $totalImage = $getPostById[0]['number_image'];
                            $accId = $getPostById[0]['account_id'];
                            $postId = $getPostById[0]['post_id'];
                            for ($i=0; $i < $totalImage; $i++) {
                                $path = "home-renting/acc".$accId."/post/post".$postId."/"."img".$i;
                        ?>
                        <div class="img" style="display: inline; padding: 10px;"></div>
                        <?php   
                            echo cl_image_tag($path, array("height"=>200, "width"=>200, "crop"=>"scale"));
                            }
                        ?>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-6 col-form-label control-label">&nbsp;</label>
                        <div class="col-sm-12">
                            <input type="submit" name="submit" value="Sửa bài" style="width: 100%;cursor: pointer;">
                        </div>
                    </div>
                </form>
            </div>
            <!-- //register -->
        </div>
    </div>
    <!-- //inner banner -->

    <?php
        include "inc/footer.php";
    ?>

</body>

</html>