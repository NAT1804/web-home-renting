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

        public function acceptPost($postId) {
            $query = "UPDATE post SET status = ?, confirm_date = NOW(), expiry_date = DATE_ADD(NOW(), INTERVAL time DAY) WHERE post_id = ?";
            $result = $this->db->doPreparedSql($query, array(1, $postId));

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
            $totalImage = count($_FILES['upload']['name']);

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
                $alert = "<span class='error'>Các trường không được rỗng</span>";
                return $alert;
            }

            // if ($totalImage < 3) {
            //     $alert = "<span class='error'>Chưa cung cấp đủ hình ảnh</span>";
            //     return $alert;
            // }
            $accId = Session::get('adminId');
            $query = "INSERT INTO post(account_id,post_title, post_description, update_time, post_price, status, `time`, confirm_date, expiry_date) VALUES(?,?,?,now(),?,?,?,now(), DATE_ADD(NOW(), INTERVAL `time` DAY))";
            $result = $this->db->doPreparedSql($query, array($accId,$title,$description,$price,1,$time));

            if($result == 0) {
                $alert = "<span class='error'>Thêm bài đăng bị lỗi 1</span>";
                return $alert;
            }

            $query2 = "SELECT post_id from post ORDER BY post_id DESC LIMIT 1";
            $result2 = $this->db->doPreparedQuery($query2, array());
            if(!empty($result2)) {
                $postId = $result2[0]['post_id'];
            } else {
                $alert = "<span class='error'>Thêm bài đăng bị lỗi 2</span>";
                return $alert;
            }

            $query3 = "INSERT INTO motel(post_id,house_number,street,province_id,district_id,close_place,balcony) VALUES(?,?,?,?,?,?,?)";
            $result3 = $this->db->doPreparedSql($query3, array((int)$postId,$numberhouse,$street,$city,$district,$close,$balcony));
            if($result3 == 0) {
                $alert = "<span class='error'>Thêm bài đăng bị lỗi 3</span>";
                return $alert;
            }

            //upload image to cloudinary
            for ($i=0; $i<$totalImage; $i++) {
                $file_tmp = $_FILES['upload']['tmp_name'][$i];
                $name = "img".$i;
                $folder = "home-renting/acc".$accId."/post/";
                \Cloudinary\Uploader::upload($file_tmp, array("public_id" => $name, "folder" => $folder));
            }

            $alert = "<span class='success'>Thêm bài đăng hợp lệ</span>";
            $_POST = array();
            return $alert;

        }   
    }
?>