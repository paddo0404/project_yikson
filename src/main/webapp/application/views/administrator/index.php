
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/header.php'); ?>

</head>
<body>
<div class="navbar navbar-default" id="navbar"> 
  <script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
  <div class="navbar-container" id="navbar-container"> 
 
    <!-- /.navbar-header -->
     <?php include('includes/headermenu.php'); ?>
    <!-- /.navbar-header -->
  </div>
  <!-- /.container -->
</div>
<div class="main-container" id="main-container"> 
  <script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
  <div class="main-container-inner"> <a class="menu-toggler" id="menu-toggler" href="#"> 
    <span class="menu-text"></span> </a> 
    <div class="sidebar" id="sidebar"> 
      <script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>
					 <?php include('includes/leftmenu.php'); ?>
      
      <!-- #sidebar-shortcuts -->
       <?php include('includes/side_menu.php'); ?>
      <!-- /.nav-list -->
      <div class="sidebar-collapse" id="sidebar-collapse"> <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i> 
      </div>
      <script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
    </div>
    <div class="main-content"> 
      <div class="breadcrumbs" id="breadcrumbs"> 
        <script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>
        <ul class="breadcrumb">
          <li> <i class="icon-home home-icon"></i> <a href="<?php echo site_url('administrator/dashboard'); ?>">Home</a> </li>
          <li>Dashboard</li>
         
        </ul>
        <!-- .breadcrumb -->
        <div class="nav-search" id="nav-search"> 
           <?php include('includes/search.php'); ?>
        </div>
        <!-- #nav-search -->
      </div>
      <div class="page-content"> 
        <div class="page-header"> 
        <table><tr><td width="1280px"><h1>Dashboard</h1></td><td align="right">
 
															
        </td></tr></table>
        </div>
        <!-- /.page-header -->
        <div class="row"> 
          <div class="col-xs-12"> 
            <!-- PAGE CONTENT BEGINS -->
           
            <!-- /row -->
         
          
            <div class="row"> 
              <div class="col-xs-12"> 
              Welcome to administrator panel
              
              </div>
            </div>
            
            <!-- PAGE CONTENT ENDS -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.page-content -->
    </div>
    <!-- /.main-content -->
    
    <!-- /#ace-settings-container -->
  </div>
  <!-- /.main-container-inner -->
  <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"> 
  <i class="icon-double-angle-up icon-only bigger-110"></i> </a> </div>
<?php include('includes/footer_top.php'); ?>

</body>
</html>


