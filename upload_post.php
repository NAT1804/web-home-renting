<?php
    session_start() ;
?>

<?php   
    include "inc/header.php";
?>

    <!-- inner banner -->
    <div class="inner-banner-w3ls py-5" id="home">
        <div class="container py-xl-5 py-lg-3">
            <!-- register  -->
            <div class="modal-body mt-md-2 mt-5">
                <h3 class="title-w3 mb-5 text-center text-wh font-weight-bold">Đăng bài</h3>
                <form action="" method="post">
                    <div class="row">
                        <label class="col-form-label col-lg-6">Địa chỉ</label><br>
                        <label class="col-form-label col-lg-6"></label><br>
                        <div class="col-lg-6">        
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="House Number" name="houseNumber" required="">
                            </div>
                            <div class="form-group">
                                <select name="province" required="" class="form-control">
                                        <option value="0">Tỉnh</option>
                                        <option value="1">Hà Nội</option>
                                        <option value="2">Thành phố Hồ Chí Minh</option>
                                        <option value="3">Đà Nẵng</option>
                                        <option value="4">Hải Phòng</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Gần với địa chỉ" name="close_place" required="">
                            </div>
                        </div>

                        <div class="col-lg-6">        
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Street" name="street" required="">
                            </div>
                            <div class="form-group">
                                <select name = "district" required="" class="form-control">
                                        <option value="0">Huyện</option>
                                        <option value="1">???</option>
                                        <option value="2">???</option>
                                        <option value="3">???</option>
                                        <option value="4">???</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <fieldset class="form-group" data-role="controlgroup">
                        <label class="col-form-label">Loại phòng</label><br>

                        <input type="radio" id="phongTro" name="style" value=1 checked>
                        <label class="col-form-label" for="phongTro">Phòng trọ</label><br>
                        <input type="radio" id="chungCuMini" name="style" value=2>
                        <label class="col-form-label" for="chungCuMini">Chung cư mini</label><br>
                        <input type="radio" id="nhaNguyenCan" name="style" value=3>
                        <label class="col-form-label" for="nhaNguyenCan">Nhà nguyên căn</label><br>
                        <input type="radio" id="chungCuNguyenCan" name="style" value=4>
                        <label class="col-form-label" for="chungCuNguyenCan">Chung cư nguyên căn</label><br>
                    </fieldset>
                    <fieldset class="form-group" data-role="controlgroup">
                        <label class="col-form-label">Giá cả :</label>
                        <input type="radio" id="thang" name="priceType" value=1 checked>
                        <label class="col-form-label" for="thang">Tháng</label>
                        <input type="radio" id="quy" name="priceType" value=2>
                        <label class="col-form-label" for="quy">Quý</label>
                        <input type="radio" id="nam" name="priceType" value=2>
                        <label class="col-form-label" for="nam">Năm</label><br>
                    </fieldset>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6" placeholder="Giá tiền" name="price" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6" placeholder="Diện tích" name="area" required="">
                    </div>

                    <fieldset class="form-group" data-role="controlgroup">
                        <input type="radio" id="chungChu" name="ownerType" value=1 checked>
                        <label class="col-form-label" for="chungChu">Chung chủ</label>
                        <input type="radio" id="khongChungChu" name="ownerType" value=2>
                        <label class="col-form-label" for="khongChungChu">Không chung chủ</label><br>
                    </fieldset>
                    <fieldset class="form-group" data-role="controlgroup">
                        <label class="col-form-label">Phòng tắm</label><br>
                        <input type="radio" id="khepKin" name="bathType" value=1 checked>
                        <label class="col-form-label" for="khepKin">Khép kín</label>
                        <input type="radio" id="tamChung" name="bathType" value=2>
                        <label class="col-form-label" for="tamChung">Chung</label><br>
                    </fieldset>

                    <fieldset class="form-group" data-role="controlgroup">
                        <label class="col-form-label">Nóng lạnh</label><br>
                        <input type="radio" id="coNL" name="water_heater" value=1 checked>
                        <label class="col-form-label" for="coNL">Có</label>
                        <input type="radio" id="koNL" name="water_heater" value=0>
                        <label class="col-form-label" for="koNL">Không</label><br>
                    </fieldset>

                    <fieldset class="form-group" data-role="controlgroup">
                        <label class="col-form-label">Phòng bếp</label><br>
                        <input type="radio" id="kbr" name="kitchenType" value=1 checked>
                        <label class="col-form-label" for="kbr">Khu bếp riêng</label>
                        <input type="radio" id="kbc" name="kitchenType" value=2>
                        <label class="col-form-label" for="kbc">Khu bếp chung</label>
                        <input type="radio" id="kna" name="kitchenType" value=3>
                        <label class="col-form-label" for="kna">Không nấu ăn</label>
                    </fieldset>

                    <fieldset class="form-group" data-role="controlgroup">
                        <label class="col-form-label">Điều hòa</label><br>
                        <input type="radio" id="coDH" name="air_conditioner" value=1 checked>
                        <label class="col-form-label" for="coDH">Có</label>
                        <input type="radio" id="koDH" name="air_conditioner" value=0>
                        <label class="col-form-label" for="koDH">Không</label><br>
                    </fieldset>

                    <fieldset class="form-group" data-role="controlgroup">
                        <label class="col-form-label">Ban công</label><br>
                        <input type="radio" id="coBC" name="balcony" value=1 checked>
                        <label class="col-form-label" for="coBC">Có</label>
                        <input type="radio" id="koBC" name="balcony" value=0>
                        <label class="col-form-label" for="koBC">Không</label><br>
                    </fieldset>
                    <!-- <div class="form-group">
                        <label class="col-form-label">Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="Username" required="">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input type="email" class="form-control" placeholder="loremipsum@email.com" name="Email"
                            required="">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Identity Card</label>
                        <input type="text" class="form-control" placeholder="123456789" name="ID" required="">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Phone Number</label>
                        <input type="text" class="form-control" placeholder="0123456789" name="PhoneNumber" required="">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Address</label>
                        <input type="text" class="form-control" placeholder="Quận Thanh Xuân" name="Address" required="">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input type="password" class="form-control" placeholder="*****" name="Password" required="">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="*****" name="ConfirmPass" required="">
                    </div>
 -->
                    <!-- <div class="sub-w3l my-3">
                        <div class="sub-w3layouts_hub">
                            <input type="checkbox" id="brand1" value="" required="">
                            <label for="brand1" class="text-li text-style-w3ls">
                                <span></span>I Accept to the Terms & Conditions</label>
                        </div>
                    </div> -->

                    <button type="submit" class="btn button-style-w3" name="uploadPost">Đăng bài</button>
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