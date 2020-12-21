<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
    require_once '../classes/post.php';
    require_once '../helpers/format.php';
 ?>
 <?php 
    $post = new Post();
    if (isset($_GET['rmPostId']) && $_GET['rmPostId'] != "") {
        $removePost = $post->removePost($_GET['rmPostId']);
    }
?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách bài đăng đang hoạt động
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
            <th>Tên người đăng</th>
            <th>Tên bài đăng</th>
            <th>Mô tả</th>
            <th>Ngày hết hạn</th>
            <th>Phí đăng bài</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        <?php 
            $showPostsActive = $post->showPostsActive();
            $fm = new Format();
            for ($i=0; $i<count($showPostsActive); $i++) {
        ?>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><span><?php echo (int)$i + 1; ?></span></td>
            <td><?php echo $showPostsActive[$i]['username']; ?></td>
            <!-- <span class="text-ellipsis"></span> -->
            <td><?php echo $showPostsActive[$i]['post_title']; ?></td>
            <td><?php echo $fm->textShorten($showPostsActive[$i]['post_description'],50); ?></td>
            <td><?php echo $showPostsActive[$i]['expiry_date']; ?></td>
            <td><?php echo $showPostsActive[$i]['post_price']; ?></td>
            <td>
              <a href="editpost.php?editPostId=<?php echo $showPostsActive[$i]['post_id'] ?>" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active">Sửa</i></a>
              <a onclick="return confirm('Bạn chắc chắn muốn loại bỏ bài viết này?');" href="?rmPostId=<?php echo $showPostsActive[$i]['post_id'] ?>" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text">Xóa</i></a>
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