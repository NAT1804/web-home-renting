<?php 
    $file_path = realpath(dirname(__FILE__));
    include_once ($file_path.'/../lib/database.php');
    include_once ($file_path.'/../helpers/format.php');
    include_once ($file_path."/../vendor/autoload.php");
    include_once ($file_path."/../config/config-cloud.php");
    include_once "notification.php";
    include_once "account.php";
?>

<?php 
    class Post
    {
        private $db;
        private $fm;
        private $noti;
        private $acc;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
            $this->noti = new Notification();
            $this->acc = new Account();
        }

        public function showPostOfAccId($accId) {
            $query = "SELECT p.*, a.username FROM post p INNER JOIN account a ON a.account_id = p.account_id WHERE p.account_id = ? ORDER BY post_id DESC";
            $result = $this->db->doPreparedQuery($query, array($accId));
            return $result;
        }

        public function showPostsActive() {
            $query = "SELECT * FROM activepostslist WHERE expiry_date > NOW() ORDER BY post_id DESC";
            $result = $this->db->doPreparedQuery($query, array());

            return $result;
        }

        public function showPostsNonActive() {
            $query = "SELECT * FROM nonactivepostslist ORDER BY post_id DESC";
            $result = $this->db->doPreparedQuery($query, array());

            return $result;
        }

        public function showPostsRemoved() {
            $query = "SELECT * FROM removedpostslist ORDER BY post_id DESC";
            $result = $this->db->doPreparedQuery($query, array());

            return $result;
        }

        public function showPostsOutDate() {
            $query = "SELECT * FROM activepostslist WHERE expiry_date < NOW() ORDER BY post_id DESC";
            $result = $this->db->doPreparedQuery($query, array());

            return $result;
        }

        public function acceptPost($accId, $postId) {
            $query = "UPDATE post SET status = ?, confirm_date = NOW(), expiry_date = DATE_ADD(NOW(), INTERVAL time DAY) WHERE post_id = ?";
            $result = $this->db->doPreparedSql($query, array(1, $postId));

            $reply = "Bài đăng #".$postId." đã được duyệt.";
            $type = "P";
            $this->noti->sendNotificationToUser($accId, $postId, $reply, $type);
            if (!empty($result)) {
                $alert = "<span id='success'>Duyệt bài thành công</span>";
                return $alert;
            } else {
                $alert = "<span id='error'>Duyệt bài thất bại</span>";
                return $alert;
            }
        }

        public function removePost($accId, $posId){
            $query = "UPDATE post SET status = ? WHERE post_id = ?";
            $result = $this->db->doPreparedSql($query, array(2, $posId));

            $reply = "Bài đăng #".$postId." đã bị loại bỏ.";
            $type = "P";
            $this->noti->sendNotificationToUser($accId, $postId, $reply, $type);
            if (!empty($result)) {
                $alert = "<span id='success'>Loại bỏ bài thành công</span>";
                return $alert;
            } else {
                $alert = "<span id='error'>Loại bỏ bài thất bại</span>";
                return $alert;
            }
        }

        public function delPost($postId) {
            $query = "DELETE FROM post WHERE post_id = ?";
            $result = $this->db->doPreparedSql($query, array($postId));

            // $message = "Xóa bài đăng #".$postId;
            // $accId = Session::get('adminId');
            // $this->noti->addNotificationToAdmin($accId, $message);
            if (!empty($result)) {
                $alert = "<span id='success'>Xóa bài thành công</span>";
                return $alert;
            } else {
                $alert = "<span id='error'>Xóa bài thất bại</span>";
                return $alert;
            }
        }

        public function updateStatusPost($accId, $postId) {
            $query = "UPDATE post SET confirm_date = now(), rental_status = ? WHERE post_id = ?";
            $result = $this->db->doPreparedSql($query, array(1, $postId));

            $message = "Cập nhật trạng thái đã thuê của bài viết #".$postId;
            $type = "R";
            $this->noti->addNotificationToAdmin($accId, $postId, $message, $type);
            if (!empty($result)) {
                $alert = "<span id='success'>Cập nhật trạng thái thành công</span>";
                return $alert;
            } else {
                $alert = "<span id='error'>Cập nhật trạng thái thất bại</span>";
                return $alert;
            }
        }

        public function editRequiredPost($accId, $postId){
            $message = "Yêu cầu chỉnh sửa bài viết #".$postId;
            $type = "O";
            $result = $this->noti->addNotificationToAdmin($accId, $postId, $message, $type);
            if (!empty($result)) {
                $alert = "<span id='success'>Gửi yêu cầu thành công</span>";
                return $alert;
            } else {
                $alert = "<span id='error'>Gửi yêu cầu thất bại</span>";
                return $alert;
            }
        }

        public function getPostById($postId) {
            $query = "SELECT p.*, a.*, m.*, s.*, pr.*, d.* FROM post p INNER JOIN account a ON a.account_id = p.account_id INNER JOIN motel m ON m.post_id = p.post_id INNER JOIN style s ON s.style_id = m.style_id INNER JOIN province pr ON pr.province_id = m.province_id INNER JOIN district d ON d.district_id = m.district_id WHERE p.post_id = ?";
            $result = $this->db->doPreparedQuery($query, array($postId));

            return $result;
        }

        public function getPostByStyle($styleId) {
            $query = "SELECT p.*, a.*, m.*, s.*, pr.*, d.* FROM post p INNER JOIN account a ON a.account_id = p.account_id INNER JOIN motel m ON m.post_id = p.post_id INNER JOIN style s ON s.style_id = m.style_id INNER JOIN province pr ON pr.province_id = m.province_id INNER JOIN district d ON d.district_id = m.district_id WHERE s.style_id = ?";
            $result = $this->db->doPreparedQuery($query, array($styleId));

            return $result;
        }

        public function getPostByProvince($styleId, $provinceId) {
            $query = "SELECT p.*, a.*, m.*, s.*, pr.*, d.* FROM post p INNER JOIN account a ON a.account_id = p.account_id INNER JOIN motel m ON m.post_id = p.post_id INNER JOIN style s ON s.style_id = m.style_id INNER JOIN province pr ON pr.province_id = m.province_id INNER JOIN district d ON d.district_id = m.district_id WHERE s.style_id = ? AND m.province_id = ?";
            $result = $this->db->doPreparedQuery($query, array($styleId, $provinceId));

            return $result;
        }

        public function getPostByProvinceAndDistrict($styleId, $provinceId, $districtId) {
            $query = "SELECT p.*, a.*, m.*, s.*, pr.*, d.* FROM post p INNER JOIN account a ON a.account_id = p.account_id INNER JOIN motel m ON m.post_id = p.post_id INNER JOIN style s ON s.style_id = m.style_id INNER JOIN province pr ON pr.province_id = m.province_id INNER JOIN district d ON d.district_id = m.district_id WHERE s.style_id = ? AND m.district_id = ? AND m.province_id = ?";
            $result = $this->db->doPreparedQuery($query, array($styleId, $districtId, $provinceId));

            return $result;
        }

        public function addPost($accId, $data, $files) {
            $title = $this->fm->validation($data['title']);
            $style = $this->fm->validation($data['style']);
            $city = $this->fm->validation($data['city']);
            $district = $this->fm->validation($data['district']);
            $street = $this->fm->validation($data['street']);
            $numberhouse = $this->fm->validation($data['numberhouse']);
            $area = $this->fm->validation($data['area']);
            $numberroom = $this->fm->validation($data['numberroom']);
            $owner = $this->fm->validation($data['owner']);
            $bath = $this->fm->validation($data['bath']);
            $waterheater = $this->fm->validation($data['waterheater']);
            $kitchen = $this->fm->validation($data['kitchen']);
            $air = $this->fm->validation($data['air']);
            $balcony = $this->fm->validation($data['balcony']);
            $rentprice = $this->fm->validation($data['rentprice']);
            $elecwater = $this->fm->validation($data['elecwater']);
            $elec = $this->fm->validation($data['elec']);
            $water = $this->fm->validation($data['water']);
            $close = $this->fm->validation($data['close']);
            $time = $this->fm->validation($data['time']);
            $price = $this->fm->validation($data['price']);
            $description = htmlspecialchars($data['description']);
            $totalImage = count(array_filter($_FILES['upload']['name']));

            if ($title == "" ||
                $style == "" ||
                $city == "" ||
                $district == "" ||
                $street == "" ||
                $numberhouse == "" ||
                $area == "" ||
                $numberroom == "" ||
                $owner == "" ||
                $bath == "" ||
                $waterheater == "" ||
                $kitchen == "" ||
                $air == "" ||
                $balcony == "" ||
                $rentprice == "" ||
                $elecwater == "" ||
                $elec == "" ||
                $water == "" ||
                $close == "" ||
                $time == "" ||
                $price == "" ||
                $description == ""
                ) {
                $alert = "<span id='error'>Các trường không được rỗng</span>";
                return $alert;
            }

            if ($totalImage < 3) {
                $alert = "<span id='error'>Chưa cung cấp đủ hình ảnh (ít nhất 3 ảnh)</span>";
                return $alert;
            }


            $checkRoleQuery = $this->acc->roleAccById($accId);
            if ($checkRoleQuery[0]['role'] == 0) {
                $status = 1;
                $query = "INSERT INTO post(account_id,post_title, post_description, update_time, post_price, status, `time`, confirm_date, expiry_date) VALUES(?,?,?,now(),?,?,?,now(), DATE_ADD(NOW(), INTERVAL `time` DAY))";
            } else {
                $status = 0;
                $query = "INSERT INTO post(account_id,post_title, post_description, update_time, post_price, status, `time`) VALUES(?,?,?,now(),?,?,?)";
            }
            
            $result = $this->db->doPreparedSql($query, array($accId,$title,$description,$price,$status,$time));

            if($result == 0) {
                $alert = "<span id='error'>Thêm bài đăng bị lỗi 1</span>";
                return $alert;
            }

            $query2 = "SELECT post_id FROM post ORDER BY post_id DESC LIMIT 1";
            $result2 = $this->db->doPreparedQuery($query2, array());
            if(!empty($result2)) {
                $postId = $result2[0]['post_id'];
            } else {
                $alert = "<span id='error'>Thêm bài đăng bị lỗi 2</span>";
                return $alert;
            }

            $query3 = "INSERT INTO motel(motel_id,post_id,house_number,street,province_id,district_id,close_place,number_of_rooms,area,price,owner,bath_type,water_heater,kitchen,air_conditioner,balcony,electric_water,electric_price,water_price,style_id,number_image) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $result3 = $this->db->doPreparedSql($query3, array((int)$postId,(int)$postId,$numberhouse,$street,$city,$district,$close,$numberroom,$area,$rentprice,$owner,$bath,$waterheater,$kitchen,$air,$balcony,$elecwater,$elec,$water,$style,$totalImage));
            if($result3 == 0) {
                $alert = "<span id='error'>Thêm bài đăng bị lỗi 3</span>";
                return $alert;
            }

            //upload image to cloudinary
            for ($i=0; $i<$totalImage; $i++) {
                $file_tmp = $_FILES['upload']['tmp_name'][$i];
                $name = "img".$i;
                $folder = "home-renting/acc".$accId."/post/post".$postId."/";
                \Cloudinary\Uploader::upload($file_tmp, array("public_id" => $name, "folder" => $folder));
            }

            
            if ($status == 1) {
                $alert = "<span id='success'>Thêm bài đăng hợp lệ</span>";
                $message = "Thêm bài đăng mới #".$postId;
            } else {
                $alert = "<span id='success'>Thêm bài đăng hợp lệ đang chờ duyệt</span>";
                $message = "Thêm bài đăng mới #".$postId." đang chờ duyệt";
            }
            $type = "P";
            $this->noti->addNotificationToAdmin($accId, $postId, $message, $type);
            $_POST = array();
            return $alert;

        }

        public function updatePost($data, $files, $postId) {
            $title = $this->fm->validation($data['title']);
            $style = $this->fm->validation($data['style']);
            $city = $this->fm->validation($data['city']);
            $district = $this->fm->validation($data['district']);
            $street = $this->fm->validation($data['street']);
            $numberhouse = $this->fm->validation($data['numberhouse']);
            $area = $this->fm->validation($data['area']);
            $numberroom = $this->fm->validation($data['numberroom']);
            $owner = $this->fm->validation($data['owner']);
            $bath = $this->fm->validation($data['bath']);
            $waterheater = $this->fm->validation($data['waterheater']);
            $kitchen = $this->fm->validation($data['kitchen']);
            $air = $this->fm->validation($data['air']);
            $balcony = $this->fm->validation($data['balcony']);
            $rentprice = $this->fm->validation($data['rentprice']);
            $elecwater = $this->fm->validation($data['elecwater']);
            $elec = $this->fm->validation($data['elec']);
            $water = $this->fm->validation($data['water']);
            $close = $this->fm->validation($data['close']);
            $time = $this->fm->validation($data['time']);
            $price = $this->fm->validation($data['price']);
            $description = htmlspecialchars($data['description']);
            $numberimage = $this->fm->validation($data['numberimage']);
            $totalImage = count(array_filter($_FILES['upload']['name']));

            if ($title == "" ||
                $style == "" ||
                $city == "" ||
                $district == "" ||
                $street == "" ||
                $numberhouse == "" ||
                $area == "" ||
                $numberroom == "" ||
                $owner == "" ||
                $bath == "" ||
                $waterheater == "" ||
                $kitchen == "" ||
                $air == "" ||
                $balcony == "" ||
                $rentprice == "" ||
                $elecwater == "" ||
                $elec == "" ||
                $water == "" ||
                $close == "" ||
                $time == "" ||
                $price == "" ||
                $description == ""
                ) {
                $alert = "<span id='error'>Các trường không được rỗng</span>";
                return $alert;
            }

            $infoPost = $this->getPostById($postId);

            if ($title != $infoPost[0]['post_title'] || $description != $infoPost[0]['post_description']) {
                $query = "UPDATE post SET post_title = ?,post_description = ? WHERE post_id = ?";
                $result = $this->db->doPreparedSql($query, array($title,$description,$postId));

                if($result == 0) {
                    $alert = "<span id='error'>".$title." ".$description."</span>";
                    return $alert;
                }
            }

            $newTotalImage = (int)$numberimage + (int)$totalImage;
            if ($numberhouse != $infoPost[0]['house_number'] ||
                $street != $infoPost[0]['street'] ||
                $city != $infoPost[0]['province_id'] ||
                $district != $infoPost[0]['district_id'] ||
                $close != $infoPost[0]['close_place'] ||
                $numberroom != $infoPost[0]['number_of_rooms'] ||
                $area != $infoPost[0]['area'] ||
                $rentprice != $infoPost[0]['price'] ||
                $owner != $infoPost[0]['owner'] ||
                $bath != $infoPost[0]['bath_type'] ||
                $waterheater != $infoPost[0]['water_heater'] ||
                $kitchen != $infoPost[0]['kitchen'] ||
                $air != $infoPost[0]['air_conditioner'] ||
                $balcony != $infoPost[0]['balcony'] ||
                $elecwater != $infoPost[0]['electric_water'] ||
                $elec != $infoPost[0]['electric_price'] ||
                $water != $infoPost[0]['water_price'] ||
                $style != $infoPost[0]['style_id'] ||
                $newTotalImage != $infoPost[0]['number_image']
                ) {
                $query2 = "UPDATE motel SET house_number = ?, street = ?, province_id = ?, district_id = ?, close_place = ?, number_of_rooms = ?, area = ?, price = ?, owner = ?, bath_type = ?, water_heater = ?, kitchen = ?, air_conditioner = ?, balcony = ?, electric_water = ?, electric_price = ?, water_price = ?, style_id = ?, number_image = ? WHERE post_id = ?";
                $result2 = $this->db->doPreparedSql($query2, array($numberhouse, $street, $city, $district, $close, $numberroom, $area, $rentprice, $owner, $bath, $waterheater, $kitchen, $air, $balcony, $elecwater, $elec, $water, $style, $newTotalImage, $postId));
                if($result2 == 0) {
                    $alert = "<span id='error'>Sửa bài đăng thất bại 2</span>";
                    return $alert;
                }
            }

            $accId = $infoPost[0]['account_id'];
            if ($totalImage != 0) {

                for ($i=0; $i<$totalImage; $i++) {
                    $file_tmp = $_FILES['upload']['tmp_name'][$i];
                    $number = (int)$i + (int)$numberimage;
                    $name = "img".$number;
                    $folder = "home-renting/acc".$accId."/post/post".$postId."/";
                    \Cloudinary\Uploader::upload($file_tmp, array("public_id" => $name, "folder" => $folder));
                }
            }

            $alert = "<span id='success'>Sửa bài đăng thành công</span>";
            $message = "Sửa bài đăng #".$postId;
            $type = "O";
            $this->noti->addNotificationToAdmin($accId, $postId, $message, $type);
            return $alert;
        }   
    }
?>