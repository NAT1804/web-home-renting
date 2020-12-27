<?php include "inc/header.php"; ?>
<?php include_once "classes/post.php"; ?>
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
    <!-- <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div> -->
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <!-- <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th> -->
            <th>ID</th>
            <th>Mã bài đăng</th>
            <th>Tên bài đăng</th>
            <th>Mô tả</th>
            <th>Ngày đăng bài</th>
            <th>Ngày duyệt bài</th>
            <th>Phí đăng bài</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        <?php 
        	$post = new Post();
        	$accId = Session::get('userId');
            $showPostOfAccId = $post->showPostOfAccId($accId);

            for ($i=0; $i<count($showPostOfAccId); $i++) {
         ?>
          <tr>
            <!-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> -->
            <td><span><?php echo (int)$i + 1; ?></span></td>
            <td><?php echo '#'.$showPostOfAccId[$i]['post_id']; ?></td>
            <td><?php echo $showPostOfAccId[$i]['post_title']; ?></td>
            <td><span><?php echo $showPostOfAccId[$i]['post_description']; ?></span></td>
            <td><span><?php echo $showPostOfAccId[$i]['update_time']; ?></span></td>
            <td><span><?php echo $showPostOfAccId[$i]['confirm_date']; ?></span></td>
            <td><span><?php echo $showPostOfAccId[$i]['post_price']; ?></span></td>
            <td>
            	<?php if(!empty($showPostOfAccId[$i]['confirm_date'])) { ?>
				<a onclick="return alert('Bài viết đã được duyệt không thể sửa!');" href="?accAccId=<?php echo $showPostOfAccId[$i]['account_id']; ?>&accPostId=<?php echo $showPostOfAccId[$i]['post_id']; ?>" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active">Sửa</i></a>
				<?php } ?>

				<?php if($showPostOfAccId[$i]['rental_status'] == 0) { ?>
				<a onclick="return confirm('Bạn chắc chắn muốn cập nhật trạng thái đã được thuê cho bài viết này?');" href="?rmPostId=<?php echo $showPostOfAccId[$i]['post_id']; ?>&rmAccId=<?php echo $showPostOfAccId[$i]['account_id']; ?>" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text">Cập nhật</i></a>
				<?php } else { ?>
				<a onclick="return confirm('Bạn chắc chắn muốn cập nhật trạng thái đã được thuê cho bài viết này?');" href="?rmPostId=<?php echo $showPostOfAccId[$i]['post_id']; ?>&rmAccId=<?php echo $showPostOfAccId[$i]['account_id']; ?>" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text">Cập nhật</i></a>
				<?php } ?>

				<?php if($showPostOfAccId[$i]['expiry_date'] > (new \DateTime())->format('Y-m-d H:i:s')) { ?>
				<a onclick="return alert('Bạn chưa hết hạn bài viết này?');" href="?rmPostId=<?php echo $showPostOfAccId[$i]['post_id']; ?>&rmAccId=<?php echo $showPostOfAccId[$i]['account_id']; ?>" class="active" ui-toggle-class=""><i class="fa fa-calendar text">Gia hạn</i></a>
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