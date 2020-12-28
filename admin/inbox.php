<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
    include_once '../classes/notification.php';
    require_once '../helpers/format.php';
?>
<?php 
    $fm = new Format();
    $showNotificationsAdmin = $noti->showNotificationsAdmin();
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="mail-w3agile">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-3 com-w3ls">
                <section class="panel">
                    <div class="panel-body">
                        <a href="mail_compose.php"  class="btn btn-compose">
                            Soạn thư
                        </a>
                        <ul class="nav nav-pills nav-stacked mail-nav">
                            <li class="active"><a href="inbox.php"> <i class="fa fa-inbox"></i>Thông báo<span class="label label-danger pull-right inbox-notification"><?php echo count($showNotificationsAdmin); ?></span></a></li>
                            <li><a href="#"> <i class="fa fa-envelope-o"></i>Thư đã gửi</a></li>
                            <li><a href="#"> <i class="fa fa-certificate"></i>Quan trọng</a></li>
                            <li><a href="#"> <i class="fa fa-file-text-o"></i>Bản nháp<span class="label label-info pull-right inbox-notification"></span></a></a></li>
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
            <div class="col-sm-9 mail-w3agile">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                       <h4 class="gen-case">Thông báo (<?php echo count($showNotificationsAdmin); ?>)
                        <form action="#" class="pull-right mail-src-position">
                            <div class="input-append">
                                <input type="text" class="form-control " placeholder="Search Mail">
                            </div>
                        </form>
                       </h4>
                    </header>
                    <div class="panel-body minimal">
                        <div class="mail-option">
                            <div class="chk-all">
                                <div class="pull-left mail-checkbox ">
                                    <input type="checkbox" class="">
                                </div>

                                <div class="btn-group">
                                    <a data-toggle="dropdown" href="#" class="btn mini all">
                                        All
                                        <i class="fa fa-angle-down "></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"> None</a></li>
                                        <li><a href="#"> Read</a></li>
                                        <li><a href="#"> Unread</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="btn-group">
                                <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                                    <i class=" fa fa-refresh"></i>
                                </a>
                            </div>
                            <div class="btn-group hidden-phone">
                                <a data-toggle="dropdown" href="#" class="btn mini blue">
                                    More
                                    <i class="fa fa-angle-down "></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                                    <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                </ul>
                            </div>
                            <div class="btn-group">
                                <a data-toggle="dropdown" href="#" class="btn mini blue">
                                    Move to
                                    <i class="fa fa-angle-down "></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                                    <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                </ul>
                            </div>

                            <ul class="unstyled inbox-pagination">
                                <li><span>1-50 of 124</span></li>
                                <li>
                                    <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                                </li>
                                <li>
                                    <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="table-inbox-wrap ">
                        <table class="table table-inbox table-hover">
                        <tbody>
                        <?php   
                            for ($i=0; $i < count($showNotificationsAdmin); $i++) {
                        ?>
                        <?php if ($showNotificationsAdmin[$i]['reply'] == NULL) { ?>
                        <tr class="unread">
                        <?php } else { ?>
                        <tr class=""> 
                        <?php } ?>    
                            <td class="inbox-small-cells">
                                <input type="checkbox" class="mail-checkbox">
                            </td>
                            <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                            <td class="view-message  dont-show"><span class="label label-danger pull-right"><?php echo ($showNotificationsAdmin[$i]['role'] == 0) ? 'admin' : 'user' ?></span>
                                <a href=""><?php echo $showNotificationsAdmin[$i]['username']; ?></a>
                            </td>
                            <td class="view-message ">
                                <a href="<?php 
                                    switch ($showNotificationsAdmin[$i]['type']) {
                                        case "A":
                                            echo "nonactiveposterslist.php";
                                            break;
                                        case "P":
                                            if ($showNotificationsAdmin[$i]['role'] == 0) {
                                                echo "editpost.php?editPostId=".$showNotificationsAdmin[$i]['post_id'];
                                                break;
                                            } else {
                                                echo "nonactivepostslist.php";
                                                break;
                                            }
                                        case "R":
                                            echo "outdatepostslist.php";
                                                break;
                                        case "O":
                                            if ($showNotificationsAdmin[$i]['role'] == 0) {
                                                echo "editpost.php?editPostId=".$showNotificationsAdmin[$i]['post_id'];
                                                break;
                                            } else {
                                                echo "post_detail.php?detailPostId=".$showNotificationsAdmin[$i]['post_id']."&detailAccId=".$showNotificationsAdmin[$i]['account_id'];
                                                break;
                                            }
                                        case "C":
                                            echo "commentlist.php";
                                            break;
                                        case "V":
                                            echo "removedpostslist.php";
                                            break;
                                    }                                
                                 ?>"><?php echo $showNotificationsAdmin[$i]['message']; ?></a>
                            </td>
                            <!-- <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td> -->
                            <td class="view-message">
                                <a href=""><?php echo $showNotificationsAdmin[$i]['reply']." ".$showNotificationsAdmin[$i]['reply_at']; ?></a>
                            </td>
                            <td class="view-message  text-right"><?php echo $fm->timeInAgo($showNotificationsAdmin[$i]['create_at']); ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table>

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
