<?php include "inc/header.php"; ?>
<?php include_once "classes/post.php"; ?>
<?php 
    $post = new Post();
    // cap nhat trang thai
    if (isset($_GET['rtPostId']) && isset($_GET['rtAccId'])) {
        $updateStatusPost = $post->updateStatusPost($_GET['rtAccId'], $_GET['rtPostId']);
    }

    // sua bai viet
    if (isset($_GET['editPostId']) && isset($_GET['editAccId'])) {
        $editPost = $post->editPost($_GET['editAccId'], $_GET['editPostId']);
    }

    // dang lại
    if (isset($_GET['restorePostId']) && isset($_GET['restoreAccId'])) {
        $requestPost = $post->requestPost($_GET['restoreAccId'], $_GET['restorePostId']);
    }
?>
<!--main content start-->
<br>
<div class="container py-xl-5 py-lg-3">
<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách bài đăng của bạn
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">              
      </div>
      <div class="col-sm-4">
        <?php if(isset($updateStatusPost)) echo $updateStatusPost; ?>
        <?php if(isset($editPost)) echo $editPost; ?>
        <?php if(isset($requestPost)) echo $requestPost; ?>
      </div>
      <div class="col-sm-3">
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>ID</th>
            <th>Mã bài đăng</th>
            <th>Tên bài đăng</th>
            <th>Mô tả</th>
            <th>Ngày duyệt bài</th>
            <th>Ngày hết hạn</th>
            <th>Trạng thái</th>
            <th>Phí đăng bài</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        <?php 
        	$post = new Post();
            $fm = new Format();
        	$accId = Session::get('userId');
            $showPostOfAccId = $post->showPostOfAccId($accId);

            for ($i=0; $i<count($showPostOfAccId); $i++) {
         ?>
          <tr>
            <td><span><?php echo (int)$i + 1; ?></span></td>
            <td><?php echo '#'.$showPostOfAccId[$i]['post_id']; ?></td>
            <td><?php echo $fm->textShorten($showPostOfAccId[$i]['post_title'], 50); ?></td>
            <td><span><?php echo $fm->textShorten($showPostOfAccId[$i]['post_description'], 50); ?></span></td>
            <td><span><?php 
                echo ($showPostOfAccId[$i]['status'] != 2) ? ((empty($showPostOfAccId[$i]['confirm_date'])) ? "Chưa được duyệt" : $showPostOfAccId[$i]['confirm_date']) : "Đã duyệt"; 
                ?>   
                </span></td>
            <td><span><?php echo ($showPostOfAccId[$i]['status'] != 2) ? $showPostOfAccId[$i]['expiry_date'] : "Bị loại"; ?></span></td>
            <td><span><?php echo ($showPostOfAccId[$i]['rental_status'] == 0) ? "Chưa thuê" : "Đã thuê"; ?></span></td>
            <td><span><?php echo ($showPostOfAccId[$i]['status'] != 2) ? $fm->format_currency($showPostOfAccId[$i]['post_price']) : "0"; ?></span></td>
            <td>
                <?php if ($showPostOfAccId[$i]['status'] == 2) { ?>
                <a href="?restorePostId=<?php echo $showPostOfAccId[$i]['post_id']; ?>&restoreAccId=<?php echo $showPostOfAccId[$i]['account_id']; ?>" class="active" ui-toggle-class=""><i class="fa fa-check text-active">Đăng lại</i></a>
                <?php } ?>
                <a href="my_post_details.php?detailPostId=<?php echo $showPostOfAccId[$i]['post_id']; ?>&detailAccId=<?php echo $showPostOfAccId[$i]['account_id']; ?>" class="active" ui-toggle-class=""><i class="fa fa-check text-active">Chi tiết</i></a>
            	<?php if(empty($showPostOfAccId[$i]['confirm_date'])) { ?>
				<a href="edit_my_post.php?editPostId=<?php echo $showPostOfAccId[$i]['post_id']; ?>&editAccId=<?php echo $showPostOfAccId[$i]['account_id']; ?>" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active">Sửa</i></a>
				<?php } ?>

				<?php if($showPostOfAccId[$i]['status'] == 1 && $showPostOfAccId[$i]['rental_status'] == 0) { ?>
				<a onclick="return confirm('Bạn chắc chắn muốn cập nhật trạng thái đã được thuê cho bài viết này?');" href="?rtPostId=<?php echo $showPostOfAccId[$i]['post_id']; ?>&rtAccId=<?php echo $showPostOfAccId[$i]['account_id']; ?>" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text">Cập nhật</i></a>
				<?php } ?>

				<?php if(($showPostOfAccId[$i]['expiry_date'] < (new \DateTime())->format('Y-m-d H:i:s')) && !empty($showPostOfAccId[$i]['expiry_date'])) { ?>
				<a onclick="return alert('Bạn chưa hết hạn bài viết này?');" href="" class="active" ui-toggle-class=""><i class="fa fa-calendar text">Gia hạn</i></a>
				<?php } ?>
            </td>
          </tr>
        <?php } ?>  
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
</section>
</div>
<!--main content end-->

<?php include "inc/footer.php"; ?>