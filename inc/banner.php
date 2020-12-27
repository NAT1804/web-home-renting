
<!-- banner -->
    <div class="main-w3pvt mian-content-wthree text-center" id="home">
        <div class="container">
            <div class="style-banner mx-auto">
                <h3 class="text-wh font-weight-bold">Địa điểm<span>phù hợp nhất</span>cho bạn</h3>
                <p class="mt-2 text-li" id="find">Cho thuê phòng trọ, tìm phòng trọ</p>
                <!-- form -->
                <div class="home-form-w3ls mt-5 pt-lg-4">
                    <form action="post_list.php" method="post">
                        <div class="row">
                            <div class="col-lg-4">                               
                                <div class="form-group">
                                    <select class="form-control" name="style">
                                        <!-- <option id="title_option">Chọn loại tin</option> -->
                                        <?php                                              
                                            $style = new Style();
                                            $showStyles = $style->showStyles();                               
                                            for ($i=0; $i<count($showStyles); $i++) {
                                        ?>
                                        <option <?php if(isset($_POST['style']) && ($_POST['style'] == $showStyles[$i]['style_id'])){ ?> selected <?php } ?> value="<?php echo $showStyles[$i]['style_id']; ?>"><?php echo $showStyles[$i]['style_name']; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">                                
                                <div class="form-group">
                                    <select class="form-control" id="city" name="province">
                                        <option value="">Chọn tỉnh/thành phố</option>
                                        <?php                                              
                                            $city = new City();
                                            $showCities = $city->showCities();                               
                                            for ($i=0; $i<count($showCities); $i++) {
                                        ?>
                                        <option <?php if(isset($_POST['province']) && ($_POST['province'] == $showCities[$i]['province_id'])){ ?> selected <?php } ?> value="<?php echo $showCities[$i]['province_id']; ?>"><?php echo $showCities[$i]['province_name']; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">                                
                                <div class="form-group">
                                    <select class="form-control" id="district" name="district">
                                        <option value="">Chọn quận/huyện</option>
                                        <?php 
                                            if (isset($_POST['district']) && !empty($_POST['district'])) {
                                                $district = new District();
                                                $districtId = $_POST['district'];
                                                $result = $district->getNameById($districtId);
                                        ?>
                                        <option <?php if (isset($_POST['district'])) { ?> selected <?php } ?> value="<?php echo $districtId; ?>"><?php echo $result[0]['district_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn_apt" name="submit">Tìm kiếm</button>
                    </form>
                </div>
                <!-- //form -->
            </div>
        </div>
    </div>
    <!-- //banner -->