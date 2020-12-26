<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
    require_once '../classes/post.php';
    require_once '../helpers/format.php';
 ?>
 <?php 
    $post = new Post();
    if (isset($_GET['accPostId']) && $_GET['accPostId'] != "" && isset($_GET['accAccId'])) {
        $acceptPost = $post->acceptPost($_GET['accAccId'], $_GET['accPostId']);
    } 
    if (isset($_GET['delPostId']) && $_GET['delPostId'] != "") {
        $delPost = $post->delPost($_GET['delPostId']);
    }
?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách bài đăng bị loại
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
            <th>Ngày hết hạn</th>
            <th>Phí đăng bài</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        <?php 
            $showPostsRemoved = $post->showPostsRemoved();
            $fm = new Format();
            for ($i=0; $i<count($showPostsRemoved); $i++) {
        ?>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><span><?php echo (int)$i + 1; ?></span></td>
            <td><?php echo $showPostsRemoved[$i]['username']; ?></td>
            <td><?php echo '#'.$showPostsRemoved[$i]['post_id']; ?></td>
            <td><?php echo $showPostsRemoved[$i]['post_title']; ?></td>
            <td><?php echo $fm->textShorten($showPostsRemoved[$i]['post_description'], 50); ?></td>
            <td><span><?php echo $showPostsRemoved[$i]['expiry_date']; ?></span></td>
            <td><span><?php echo $showPostsRemoved[$i]['post_price']; ?></span></td>
            <td>
              <a onclick="return confirm('Bạn chắc chắn muốn bài viết hoạt động trở lại?')" href="?accPostId=<?php echo $showPostsRemoved[$i]['post_id'] ?>&accAccId=<?php echo $showPostsRemoved[$i]['account_id'] ?>" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
              <a onclick="return confirm('Bạn chắc chắn muốn xóa bài viết này?')" href="?delPostId=<?php echo $showPostsRemoved[$i]['post_id'] ?>" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
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
