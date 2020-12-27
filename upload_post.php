<?php   
    include "inc/header.php";
?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $post = new Post();
        $accId = Session::get('userId');
        $addPost = $post->addPost($accId, $_POST, $_FILES);
    }
?>
    <!-- inner banner -->
    <div class="inner-banner-w3ls py-5" id="home">
        <div class="container py-xl-5 py-lg-3">
            <!-- register  -->
            <div class="modal-body mt-md-2 mt-5">
                <h3 class="title-w3 mb-5 text-center text-wh font-weight-bold">Đăng bài</h3>
                <form action="upload_post.php" class="form-horizontal bucket-form" method="post" enctype="multipart/form-data">
                    <div class="form-group" id="notice-error">
                        <label class=" col-sm-3 control-label"></label>
                        <div class="col-sm-12" style="text-align: center;">
                            <?php 
                                if (isset($addPost)) {
                                    echo $addPost; 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-form-label control-label">Tiêu đề</label>
                        <div class="col-sm-12">
                            <input name="title" type="text" class="form-control" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ""; ?>" >
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
                                    if (isset($_POST['style']) && $_POST['style'] == $stylesList[$i]['style_id']) {
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
                                <option <?php if(isset($_POST['city']) && ($_POST['city'] == $citiesList[$i]['province_id'])){ ?> selected <?php } ?> value="<?php echo $citiesList[$i]['province_id']; ?>"><?php echo $citiesList[$i]['province_name'] ?></option>
                                <?php  }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Quận/Huyện</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" id="district" name="district">
                                <option>Chọn quận huyện</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Đường</label>
                        <div class="col-sm-12">
                            <input name="street" type="text" class="form-control" value="<?php echo isset($_POST['street']) ? $_POST['street'] : ""; ?>">
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Số nhà</label>
                        <div class="col-sm-12">
                            <input name="numberhouse" type="text" class="form-control" value="<?php echo isset($_POST['numberhouse']) ? $_POST['numberhouse'] : ""; ?>">
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-6 col-form-label control-label">Diện tích (m2)</label>
                        <div class="col-sm-12">
                            <input name="area" type="number" class="form-control" value="<?php echo isset($_POST['area']) ? $_POST['area'] : ""; ?>">
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Số phòng</label>
                        <div class="col-sm-12">
                            <input name="numberroom" type="number" class="form-control" value="<?php echo isset($_POST['numberroom']) ? $_POST['numberroom'] : ""; ?>">
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Chung chủ</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" name="owner">
                                <option>Chọn loại</option>
                                <?php if(!isset($_POST['owner'])) {?>
                                    <option value="0">Không</option>
                                    <option value="1">Có</option>
                                <?php } else { 
                                    if($_POST['owner'] == 0) {
                                ?>
                                    <option selected value="0">Không</option>
                                    <option value="1">Có</option>
                                <?php } else { ?>
                                    <option value="0">Không</option>
                                    <option selected value="1">Có</option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Phòng tắm</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" name="bath">
                                <option>Chọn loại</option>
                                <?php if(!isset($_POST['bath'])) {?>
                                    <option value="0">Không</option>
                                    <option value="1">Có</option>
                                <?php } else { 
                                    if($_POST['bath'] == 0) {
                                ?>
                                    <option selected value="0">Không</option>
                                    <option value="1">Có</option>
                                <?php } else { ?>
                                    <option value="0">Không</option>
                                    <option selected value="1">Có</option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-6 col-form-label control-label">Bình nóng lạnh</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" name="waterheater">
                                <option>Chọn loại</option>
                                <?php if(!isset($_POST['waterheater'])) {?>
                                    <option value="0">Không</option>
                                    <option value="1">Có</option>
                                <?php } else { 
                                    if($_POST['waterheater'] == 0) {
                                ?>
                                    <option selected value="0">Không</option>
                                    <option value="1">Có</option>
                                <?php } else { ?>
                                    <option value="0">Không</option>
                                    <option selected value="1">Có</option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Phòng bếp</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" name="kitchen">
                                <option>Chọn loại</option>
                                <?php if(!isset($_POST['kitchen'])) {?>
                                    <option value="0">Không nấu ăn</option>
                                    <option value="1">Khu bếp chung</option>
                                    <option value="2">Khu bếp riêng</option>
                                <?php } else { 
                                    if($_POST['kitchen'] == 0) {
                                ?>
                                    <option selected value="0">Không nấu ăn</option>
                                    <option value="1">Khu bếp chung</option>
                                    <option value="2">Khu bếp riêng</option>
                                <?php } else if ($_POST['kitchen'] == 1) { ?>
                                    <option value="0">Không nấu ăn</option>
                                    <option selected value="1">Khu bếp chung</option>
                                    <option value="2">Khu bếp riêng</option>
                                <?php } else { ?>
                                    <option value="0">Không nấu ăn</option>
                                    <option value="1">Khu bếp chung</option>
                                    <option selected value="2">Khu bếp riêng</option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Điều hòa</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" name="air">
                                <option>Chọn loại</option>
                                <?php if(!isset($_POST['air'])) {?>
                                    <option value="0">Không</option>
                                    <option value="1">Có</option>
                                <?php } else { 
                                    if($_POST['air'] == 0) {
                                ?>
                                    <option selected value="0">Không</option>
                                    <option value="1">Có</option>
                                <?php } else { ?>
                                    <option value="0">Không</option>
                                    <option selected value="1">Có</option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Ban công</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" name="balcony">
                                <option>Chọn loại</option>
                                <?php if(!isset($_POST['balcony'])) {?>
                                    <option value="0">Không</option>
                                    <option value="1">Có</option>
                                <?php } else { 
                                    if($_POST['balcony'] == 0) {
                                ?>
                                    <option selected value="0">Không</option>
                                    <option value="1">Có</option>
                                <?php } else { ?>
                                    <option value="0">Không</option>
                                    <option selected value="1">Có</option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-6 col-form-label control-label">Giá thuê(tháng)</label>
                        <div class="col-sm-12">
                            <input name="rentprice" type="number" class="form-control" value="<?php echo isset($_POST['rentprice']) ? $_POST['rentprice'] : ""; ?>">
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Điện nước</label>
                        <div class="col-sm-12">
                            <select class="form-control m-bot15" id="elecwater" name="elecwater">
                                <option>Chọn loại</option>
                                <?php if(!isset($_POST['elecwater'])) {?>
                                    <option value="0">Giá dân</option>
                                    <option value="1">Giá thuê</option>
                                <?php } else { 
                                    if($_POST['elecwater'] == 0) {
                                ?>
                                    <option selected value="0">Giá dân</option>
                                    <option value="1">Giá thuê</option>
                                <?php } else { ?>
                                    <option value="0">Giá dân</option>
                                    <option selected value="1">Giá thuê</option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-6 col-form-label control-label">Giá điện(kWh)</label>
                        <div class="col-sm-12">
                            <input name="elec" type="text" id="elec" class="form-control" value="<?php 
                            if (isset($_POST['elecwater'])) {
                                echo $_POST['elec'];
                            }
                            ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-6 col-form-label control-label">Giá nước(m3)</label>
                        <div class="col-sm-12">
                            <input name="water" type="text" id="water" class="form-control" value="<?php 
                            if(isset($_POST['elecwater'])) {
                                echo $_POST['water'];
                            }
                            ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Khu lân cận</label>
                        <div class="col-sm-12">
                            <input name="close" type="text" class="form-control" value="<?php echo isset($_POST['close']) ? $_POST['close'] : ""; ?>">
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-6 col-form-label control-label">Thời gian đăng bài (ngày)</label>
                        <div class="col-sm-12">
                            <input name="time" type="number" id="time" class="form-control" value="<?php echo isset($_POST['time']) ? $_POST['time'] : ""; ?>">
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Phí đăng bài</label>
                        <div class="col-sm-12">
                            <input name="price" type="text" id="price" class="form-control" value="<?php echo isset($_POST['price']) ? $_POST['price'] : "Tối thiểu 7 ngày"; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Mô tả thêm</label>
                        <div class="col-sm-12">
                            <textarea name="description" class="form-control" rows="4" ><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ""; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label">Hình ảnh</label>
                        <div class="col-sm-12">
                            <input name="upload[]" type="file" class="form-control" multiple >
                        </div>
                    </div>
                    <div class="form-group home-form-w3ls">
                        <label class="col-sm-3 col-form-label control-label"></label>
                        <div class="col-sm-12">
                            <input type="submit" name="submit" value="Đăng bài" style="width: 100%;cursor: pointer;">
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