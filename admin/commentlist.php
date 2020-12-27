<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
    require_once '../classes/comment.php';
 ?>
 <?php 
    $comment = new Comment();
    if (isset($_GET['acpId'])) {
        $acceptComment = $comment->acceptComment($_GET['acpId']);
    }
    if (isset($_GET['rmId'])) {
        $deleteComment = $comment->deleteComment($_GET['rmId']);
    }
?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách các đánh giá bài viết
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
        <?php 
            if (isset($deleteComment))
                echo $deleteComment; 
        ?>
        <?php 
            if (isset($acceptComment))
                echo $acceptComment; 
        ?>
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
            <th>Người đánh giá</th>
            <th>Mã bài đăng</th>
            <th>Đánh giá</th>
            <th>Bình luận</th>
            <th>Ngày thêm</th>
            <th>Ngày duyệt</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        <?php 
            $getComments = $comment->getComments();

            for ($i=0; $i<count($getComments); $i++) {
         ?>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><span><?php echo (int)$i + 1; ?></span></td>
            <td><?php echo $getComments[$i]['username']; ?></td>
            <td><?php echo '#'.$getComments[$i]['post_id']; ?></td>
            <td><?php echo $getComments[$i]['rating']; ?></td>
            <td><?php echo $getComments[$i]['comment']; ?></td>
            <td><span><?php echo $getComments[$i]['create_at']; ?></span></td>
            <td><span><?php echo $getComments[$i]['rep_at']; ?></span></td>
            <td>
                <?php if(empty($getComments[$i]['rep_at'])) { ?>
                <a onclick="return confirm('Bạn chắc chắn duyệt đánh giá này?');" href="?acpId=<?php echo $getComments[$i]['rate_id']; ?>" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
                <?php } ?>
                <a onclick="return confirm('Bạn chắc chắn muốn loại bỏ đánh giá này?');" href="?rmId=<?php echo $getComments[$i]['rate_id']; ?>" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
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
