<?php 
    $file_path = realpath(dirname(__FILE__));
    require_once ($file_path."/../PHPMailer/PHPMailer.php");
    require_once ($file_path."/../PHPMailer/SMTP.php");
    require_once ($file_path."/../PHPMailer/Exception.php");
    require_once ($file_path."/../config/config.php");
    use PHPMailer\PHPMailer\PHPMailer;
?>

<?php 
    class Mail
    {
        private $mail;
        public function __construct() {
            $this->mail = new PHPMailer();
        }

        public function sendMail($email, $subject, $content) {
            if ($email == "" || $subject == "" || $content == "") {
                $status = "false";
                $alert = "<span id='error'>Các trường không được rỗng</span>";
                $result = array("status"=>$status, "alert"=>$alert);
                return $result;
            }

            //$mail = new PHPMailer();

            //smtp settings
            $this->mail->isSMTP();
            $this->mail->Host = E_HOST;
            $this->mail->SMTPAuth = true;
            $this->mail->Username = E_MAIL;
            $this->mail->Password = E_PASS;
            $this->mail->Port = E_PORT;
            $this->mail->SMTPSecure = SMTPS;

            //email settings
            $this->mail->isHTML(true);
            $this->mail->setFrom(E_MAIL, "EasyAccomod Admin");
            $this->mail->addAddress($email);
            $this->mail->Subject = ("$subject");
            $this->mail->Body = $content;

            if($this->mail->Send()) {
                $status = "true";
                $alert = "<span id='success'>Đã gửi thư thành công cho ".$email."</span>";
                $result = array("status"=>$status, "alert"=>$alert);
                return $result;
            } else {
                $status = "false";
                $alert = "<span id='error'>Đã xảy ra lỗi: ".$this->mail->ErrorInfo."</span>";
                $result = array("status"=>$status, "alert"=>$alert);
                return $result;
            }
        }
 
    }
?>