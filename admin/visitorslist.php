<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
    require_once '../classes/visitor.php';
 ?>
 <?php 
    $visitor = new Visitor();
    if (isset($_GET['delId'])) {
        $delUser = $visitor->delUser($_GET['delId']);
    }
?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách khách hàng
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
        <?php if(isset($delUser)) echo $delUser; ?>
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
            <th>Code</th>
            <th>Username</th>
            <th>Email</th>
            <th>Edentity Card</th>
            <th>Phone Number</th>
            <th>Address</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        <?php 
            $showVisitors = $visitor->showVisitors();

            for ($i=0; $i<count($showVisitors); $i++) {
         ?>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><span><?php echo (int)$i + 1; ?></span></td>
            <td><?php echo "#".$showVisitors[$i]['account_id']; ?></td>
            <td><?php echo $showVisitors[$i]['username']; ?></td>
            <td><span class="text-ellipsis"><?php echo $showVisitors[$i]['email']; ?></span></td>
            <td><span class="text-ellipsis"><?php echo $showVisitors[$i]['identity_card']; ?></span></td>
            <td><span><?php echo $showVisitors[$i]['phone_number']; ?></span></td>
            <td><span><?php echo $showVisitors[$i]['address']; ?></span></td>
            <td>
              <a onclick="return confirm('Bạn chắc chắn muốn xóa tài khoản này?');" href="?delId=<?php echo $showVisitors[$i]['account_id']; ?>" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
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
