<?php 
include_once '../lib/database.php';
include_once '../helpers/format.php';
require "../vendor/autoload.php";
require "../config/config-cloud.php";
?>

<?php 
    class Post
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function showPostsActive() {
            $query = "SELECT * FROM activepostslist";
            $result = $this->db->doPreparedQuery($query, array());

            return $result;
        }

        public function showPostsNonActive() {
            $query = "SELECT * FROM nonactivepostslist";
            $result = $this->db->doPreparedQuery($query, array());

            return $result;
        }

        public function showPostsRemoved() {
            $query = "SELECT * FROM removedpostslist";
            $result = $this->db->doPreparedQuery($query, array());

            return $result;
        }

        public function acceptPost($postId) {
            $query = "UPDATE post SET status = ?, confirm_date = NOW(), expiry_date = DATE_ADD(NOW(), INTERVAL time DAY) WHERE post_id = ?";
            $result = $this->db->doPreparedSql($query, array(1, $postId));

            return $result;
        }

        public function removePost($posId){
            $query = "UPDATE post SET status = ? WHERE post_id = ?";
            $result = $this->db->doPreparedSql($query, array(2, $posId));

            return $result;
        }

        public function delPost($postId) {
            $query = "DELETE FROM post WHERE post_id = ?";
            $result = $this->db->doPreparedSql($query, array($posId));

            return $result;
        }

        public function getPostById($postId) {
            $query = "SELECT p.*, a.*, m.* FROM post p INNER JOIN account a ON a.account_id = p.account_id INNER JOIN motel m ON m.post_id = p.post_id WHERE p.post_id = ?";
            $result = $this->db->doPreparedQuery($query, array($postId));

            return $result;
        }

        public function addPost($data, $files) {
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
            $accId = Session::get('adminId');
            $query = "INSERT INTO post(account_id,post_title, post_description, update_time, post_price, status, `time`, confirm_date, expiry_date) VALUES(?,?,?,now(),?,?,?,now(), DATE_ADD(NOW(), INTERVAL `time` DAY))";
            $result = $this->db->doPreparedSql($query, array($accId,$title,$description,$price,1,$time));

            if($result == 0) {
                $alert = "<span id='error'>Thêm bài đăng bị lỗi</span>";
                return $alert;
            }

            $query2 = "SELECT post_id from post ORDER BY post_id DESC LIMIT 1";
            $result2 = $this->db->doPreparedQuery($query2, array());
            if(!empty($result2)) {
                $postId = $result2[0]['post_id'];
            } else {
                $alert = "<span id='error'>Thêm bài đăng bị lỗi</span>";
                return $alert;
            }

            $query3 = "INSERT INTO motel(post_id,house_number,street,province_id,district_id,close_place,number_of_rooms,area,price,owner,bath_type,water_heater,kitchen,air_conditioner,balcony,electric_water,electric_price,water_price,style_id,number_image) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $result3 = $this->db->doPreparedSql($query3, array((int)$postId,$numberhouse,$street,$city,$district,$close,$numberroom,$area,$rentprice,$owner,$bath,$waterheater,$kitchen,$air,$balcony,$elecwater,$elec,$water,$style,$totalImage));
            if($result3 == 0) {
                $alert = "<span id='error'>Thêm bài đăng bị lỗi</span>";
                return $alert;
            }

            //upload image to cloudinary
            for ($i=0; $i<$totalImage; $i++) {
                $file_tmp = $_FILES['upload']['tmp_name'][$i];
                $name = "img".$i;
                $folder = "home-renting/acc".$accId."/post/post".$postId."/";
                \Cloudinary\Uploader::upload($file_tmp, array("public_id" => $name, "folder" => $folder));
            }

            $alert = "<span id='success'>Thêm bài đăng hợp lệ</span>";
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

            if ($totalImage != 0) {
                $accId = $infoPost[0]['account_id'];

                for ($i=0; $i<$totalImage; $i++) {
                    $file_tmp = $_FILES['upload']['tmp_name'][$i];
                    $number = (int)$i + (int)$numberimage;
                    $name = "img".$number;
                    $folder = "home-renting/acc".$accId."/post/post".$postId."/";
                    \Cloudinary\Uploader::upload($file_tmp, array("public_id" => $name, "folder" => $folder));
                }
            }

            $alert = "<span id='success'>Sửa bài đăng thành công</span>";
            return $alert;
        }   
    }
?>