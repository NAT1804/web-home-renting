<?php 
    include_once '../helpers/format.php';
    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/SMTP.php";
    require_once "../PHPMailer/Exception.php";
    use PHPMailer\PHPMailer\PHPMailer;
?>

<?php 
    class Mail
    {
        private $fm;

        public function __construct()
        {
            $this->fm = new Format();
        }

        public function sendMail($data) {
        	$email = $this->fm->validation($data['email']);
            $subject = $this->fm->validation($data['subject']);
            $content = htmlspecialchars($data['content']);

            if ($email == "" || $subject == "" || $content == "") {
                $alert = "<span class='error'>Có trường chưa được nhập</span>";
                return $alert;
            }

            $mail = new PHPMailer();

            //smtp settings
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "michigo2802@gmail.com";
            $mail->Password = 'anhtuan184';
            $mail->Port = 465;
            $mail->SMTPSecure = "ssl";

            //email settings
            $mail->isHTML(true);
            $mail->setFrom("michigo2802@gmail.com", "Tuan");
            $mail->addAddress($email);
            $mail->Subject = ("$subject");
            $mail->Body = $content;

            if($mail->send()) {
                $alert = "<span class='success'>Đã gửi thư thành công cho ".$email."</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Đã xảy ra lỗi: ".$mail->ErrorInfo."</span>";
                return $alert;
            }
        }
 
    }
?>