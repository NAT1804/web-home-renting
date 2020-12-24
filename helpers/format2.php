<?php
    class Format {

        public function timeInAgo($timestamp) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $timestamp = strtotime($timestamp) ? strtotime($timestamp) : $timestamp;
            $time = time() - $timestamp;

            switch ($time) {
                //Seconds
                case $time <= 60:
                    return 'Just Now!';
                //Minutes
                case $time >= 60 && $time < 3600:
                    return (round($time/60) == 1) ? "a minute ago" : round($time/60).' minutes ago';
                //Hours
                case $time >= 3600 && $time < 86400:
                    return (round($time/3600) == 1) ? "an hour ago" : round($time/3600).' hours ago';
                //Days
                case $time >= 86400 && $time < 604800:
                    return (round($time/86400) == 1) ? "a day ago" : round($time/86400).' days ago';
                //Weeks
                case $time >= 604800 && $time < 2600640:
                    return (round($time/604800) == 1) ? "a week ago" : round($time/604800).' weeks ago';
                //Months
                case $time >= 2600640 && $time < 31207680:
                    return (round($time/2600640) == 1) ? "a month ago" : round($time/2600640).' months ago';
                //Years
                case $time >= 31207680:
                    return (round($time/31207680) == 1) ? "a year ago" : round($time/31207680).' years ago';
                    
            }
        }

        public function formatDate($date){
            return date('F j, Y, g:i a', strtotime($date));
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
        
    }
?>
 
