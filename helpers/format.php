<?php 
	/**
	 * 
	 */
	class Format
	{
		
		public function __construct()
		{
			
		}

		public function timeInAgo($timestamp) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $timestamp = strtotime($timestamp) ? strtotime($timestamp) : $timestamp;
            $time = time() - $timestamp;

            switch ($time) {
                //Seconds
                case $time <= 60:
                    return 'Vừa xong!';
                //Minutes
                case $time >= 60 && $time < 3600:
                    return (round($time/60) == 1) ? "1 phút trước" : round($time/60).' phút trước';
                //Hours
                case $time >= 3600 && $time < 86400:
                    return (round($time/3600) == 1) ? "1 tiếng trước" : round($time/3600).' tiếng trước';
                //Days
                case $time >= 86400 && $time < 604800:
                    return (round($time/86400) == 1) ? "1 ngày trước" : round($time/86400).' ngày trước';
                //Weeks
                case $time >= 604800 && $time < 2600640:
                    return (round($time/604800) == 1) ? "1 tuần trước" : round($time/604800).' tuần trước';
                //Months
                case $time >= 2600640 && $time < 31207680:
                    return (round($time/2600640) == 1) ? "1 tháng trước" : round($time/2600640).' tháng trước';
                //Years
                case $time >= 31207680:
                    return (round($time/31207680) == 1) ? "1 năm trước" : round($time/31207680).' năm trước';
                    
            }
        }

        public function textShorten($text, $limit = 400){
            $text = $text. " ";
            $text = substr($text, 0, $limit);
            $text = substr($text, 0, strrpos($text, ' '));
            $text = $text."...";
            return $text;
        }

        public function validation($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public function formatPrice($price) {
            $price = (float)$price;
            return ((float)$price/1000000)." triệu/tháng";
        }

        public function title(){
            $path = $_SERVER['SCRIPT_FILENAME'];
            $title = basename($path, '.php');
            //$title = str_replace('_', ' ', $title);
            if ($title == 'index') {
               $title = 'home';
           }elseif ($title == 'contact') {
               $title = 'contact';
           }
           return $title = ucfirst($title);
        }

        public function format_currency($n=0){
            $n=(string)$n;
            $n=strrev($n);
            $res='';
            for($i=0;$i<strlen($n);$i++){
                if($i%3==0 && $i!=0){
                    $res.='.';
                    
                }
                $res.=$n[$i];
            }
            $res=strrev($res);
            return $res;    
        }

        public function formatDate($date){
            return date('F j, Y, g:i a', strtotime($date));
        }

	}
 ?>