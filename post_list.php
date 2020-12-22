<?php
    include "inc/header.php" ;
?>
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
<?php
    include "inc/footer.php" ;
?>
