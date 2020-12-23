<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
    include '../classes/mail.php';
 ?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		<div class="mail-w3agile">
        <div class="row">
            <div class="col-sm-3 com-w3ls">
                <section class="panel">
                    <div class="panel-body">
                        <a href="mail_compose.php"  class="btn btn-compose">
                            Soạn thư
                        </a>
                        <ul class="nav nav-pills nav-stacked mail-nav">
                            <li class="active"><a href="inbox.php"> <i class="fa fa-inbox"></i>Hộp thư đến<span class="label label-danger pull-right inbox-notification">9</span></a></li>
                            <li><a href="#"> <i class="fa fa-envelope-o"></i>Thư đã gửi</a></li>
                            <li><a href="#"> <i class="fa fa-certificate"></i>Quan trọng</a></li>
                            <li><a href="#"> <i class="fa fa-file-text-o"></i>Bản nháp<span class="label label-info pull-right inbox-notification">123</span></a></a></li>
                            <li><a href="#"> <i class="fa fa-trash-o"></i>Thùng rác</a></li>
                        </ul>
                    </div>
                </section>

                <section class="panel">
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked labels-info ">
                            <li> <h4>Buddy online</h4> </li>
                            <li> <a href="#"> <i class="fa fa-comments-o text-success"></i> Jonathan Smith <p>I do not think</p></a>  </li>
                            <li> <a href="#"> <i class="fa fa-comments-o text-danger"></i> iRon <p>Busy with coding</p></a> </li>
                            <li> <a href="#"> <i class="fa fa-comments-o text-muted "></i> Anjelina Joli <p>I out of control</p></a></li>
                            <li> <a href="#"> <i class="fa fa-comments-o text-muted "></i> Samual Daren <p>I am not here</p></a></li>
                            <li> <a href="#"> <i class="fa fa-comments-o text-muted "></i> Tis man <p>I do not think</p></a>  </li>
                        </ul>
                        <a href="#"> + Add More</a>

                        <div class="inbox-body text-center inbox-action">
                            <div class="btn-group">
                                <a class="btn mini btn-default" href="javascript:;">
                                    <i class="fa fa-power-off"></i>
                                </a>
                            </div>
                            <div class="btn-group">
                                <a class="btn mini btn-default" href="javascript:;">
                                    <i class="fa fa-cog"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php 
                $mail = new Mail();
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                    $email = $_POST['email'];
                    $subject = $_POST['subject'];
                    $content = $_POST['content'];
                    $sendMail = $mail->sendMail($email, $subject, $content);
                }
            ?>
            <div class="col-sm-9 mail-w3agile">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                       <h4 class="gen-case"> Soạn thư
                           <form action="#" class="pull-right mail-src-position">
                            <div class="input-append">
                                <input type="text" class="form-control " placeholder="Search Mail">
                            </div>
                        </form>
                       </h4>
                    </header>
                    <div class="panel-body">
                        <div class="compose-btn pull-right">
                            <button class="btn btn-primary btn-sm"><i class="fa fa-check"></i>Gửi</button>
                            <button class="btn btn-sm"><i class="fa fa-times"></i>Loại bỏ</button>
                            <button class="btn btn-sm">Nháp</button>
                        </div>
                        <div class="compose-mail">
                            <form action="" role="form-horizontal" method="post">
                                <div class="form-group">
                                    <?php 
                                        if(isset($sendMail)) echo $sendMail['alert'];
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="to" class="">To:</label>
                                    <input name="email" type="email" tabindex="1" id="to" class="form-control" required>

                                    <!-- <div class="compose-options">
                                        <a onclick="$(this).hide(); $('#cc').parent().removeClass('hidden'); $('#cc').focus();" href="javascript:;">Cc</a>
                                        <a onclick="$(this).hide(); $('#bcc').parent().removeClass('hidden'); $('#bcc').focus();" href="javascript:;">Bcc</a>
                                    </div> -->
                                </div>

                                <div class="form-group hidden">
                                    <label for="cc" class="">Cc:</label>
                                    <input type="text" tabindex="2" id="cc" class="form-control">
                                </div>

                                <div class="form-group hidden">
                                    <label for="bcc" class="">Bcc:</label>
                                    <input type="text" tabindex="2" id="bcc" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="subject" class="">Subject:</label>
                                    <input name="subject" type="text" tabindex="1" id="subject" class="form-control">
                                </div>

                                <div class="compose-editor">
                                    <textarea name="content" class="wysihtml5 form-control" rows="9"></textarea>
                                    <input name="file" type="file" class="default">
                                </div>
                                <div class="compose-btn">
                                    <button name="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Send</button>
                                    <button class="btn btn-sm"><i class="fa fa-times"></i> Discard</button>
                                    <button class="btn btn-sm">Draft</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- page end-->
		 </div>
</section>
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
