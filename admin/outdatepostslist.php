<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
    require_once '../classes/post.php';
 ?>
 <?php 
    $post = new Post();
    if (isset($_GET['accPostId']) && isset($_GET['accAccId'])) {
      $accId = $_GET['accAccId'];
      $postId = $_GET['accPostId'];
      $acceptPost = $post->acceptPost($accId, $postId);
    }
    if (isset($_GET['delPostId'])) {
        $delPost = $post->delPost($_GET['delPostId']);
    }
?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách bài đăng hết hạn
    </div>
    <div class="row w3-res-tb">
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
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>ID</th>
            <th>Người đăng</th>
            <th>Mã bài đăng</th>
            <th>Tên bài đăng</th>
            <th>Mô tả</th>
            <th>Ngày đăng bài</th>
            <th>Ngày hết hạn</th>
            <th>Trạng thái</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        <?php 
            $showPostsOutDate = $post->showPostsOutDate();

            for ($i=0; $i<count($showPostsOutDate); $i++) {
         ?>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><span><?php echo (int)$i + 1; ?></span></td>
            <td><?php echo $showPostsOutDate[$i]['username']; ?></td>
            <td><?php echo '#'.$showPostsOutDate[$i]['post_id']; ?></td>
            <td><?php echo $fm->textShorten($showPostsOutDate[$i]['post_title'], 30); ?></td>
            <td><?php echo $fm->textShorten($showPostsOutDate[$i]['post_description'], 50); ?></td>
            <td><span><?php echo $showPostsOutDate[$i]['update_time']; ?></span></td>
            <td><span><?php echo $showPostsOutDate[$i]['expiry_date']; ?></span></td>
            <td><span><?php echo ($showPostsOutDate[$i]['rental_status'] == 0) ? "Chưa thuê" : "Được thuê"; ?></span></td>
            <td>
                <a onclick="return confirm('Bạn chắc chắn duyệt bài viết này?');" href="?accAccId=<?php echo $showPostsOutDate[$i]['account_id']; ?>&accPostId=<?php echo $showPostsOutDate[$i]['post_id']; ?>" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active">Gia hạn</i></a>
                <a onclick="return confirm('Bạn chắc chắn muốn xoá bài viết này?');" href="?delPostId=<?php echo $showPostsOutDate[$i]['post_id']; ?>" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text">Xóa</i></a>
                <a href="editpost.php?editPostId=<?php echo $showPostsOutDate[$i]['post_id']; ?>" class="active" ui-toggle-class=""><i class="fa fa-book text">Chi tiết</i></a>
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
