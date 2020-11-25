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
        
         <li>Change password</li>
        </ul>
        <!-- .breadcrumb -->
        <div class="nav-search" id="nav-search"> 
           <?php include('includes/search.php'); ?>
        </div>
        <!-- #nav-search -->
      </div>
      <div class="page-content"> 
        <div class="page-header"> 
          <h1>Change password</h1>
        </div>
        <!-- /.page-header -->
        <div class="row"> 
          <div class="col-xs-12"> 
            <!-- PAGE CONTENT BEGINS -->
           
            <!-- /row -->
             <?php
			if(isset($_GET['ferr'])){  ?>
						
                        <div class="alert alert-danger">
									
											<strong>
												<i class="icon-remove"></i>
												Error!
											</strong>

											<?php echo $_GET['ferr']; ?>
											<br />
										</div>
				<?php }  if(isset($_GET['fsuccess'])) {?>		
                      <div class="alert alert-block alert-success">  <p>
												<strong>
													<i class="icon-ok"></i>
													Success!
												</strong>
												<?php echo $_GET['fsuccess']; ?>
											</p></div>
						<?php } ?>
                
          
            <div class="row"> 
              <div class="col-xs-12"> 
         
            <form action="" method="post" id="frmCreateListing" name="frmCreateListing" class="form-horizontal" onSubmit="return validate();" >
						
                <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Old Password</label>
                
                <div class="col-sm-9">
               
                <input class="input-xlarge" id="focusedInput"  name="old_pwd" type="password" value="">
                </div>
                </div>
                
                <div class="space-4"></div>
                
                 <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">New Password</label>
                
                <div class="col-sm-9">
               
                <input class="input-xlarge" id="focusedInput"  name="new_pwd" type="password" value="">
                </div>
                </div>
                
                <div class="space-4"></div>
                
                  <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Retype Password</label>
                
                <div class="col-sm-9">
               
                <input class="input-xlarge" id="focusedInput"  name="re_pwd" type="password" value="">
                </div>
                </div>
                
                <div class="space-4"></div>
             
                <div class="space-4"></div>
                
                <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                <button class="btn btn-info" type="submit" name="submit" value="Change Password">
                <i class="icon-ok bigger-110"></i>
             	Change Password
                </button>
                
               
                </div>
                </div>

								
								</form>
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
<!-- /.main-container -->
<!-- basic scripts -->
<!--[if !IE]> -->
<?php include('includes/footer_top.php'); ?>

</body>
</html>


<script type="text/javascript">
function trim(stringToTrim)
{
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}
function validate(){

if(trim(document.frmCreateListing.old_pwd.value)=='')
{
	alert("Please enter old password");
	document.frmCreateListing.old_pwd.value='';
	document.frmCreateListing.old_pwd.focus();
	return false;
}
else if(trim(document.frmCreateListing.new_pwd.value)=='')
{
	alert("Please enter new password");
	document.frmCreateListing.new_pwd.value='';
	document.frmCreateListing.new_pwd.focus();
	return false;
}
else if(trim(document.frmCreateListing.re_pwd.value)=='')
{
	alert("Please enter retype new password");
	document.frmCreateListing.re_pwd.value='';
	document.frmCreateListing.re_pwd.focus();
	return false;
}
else if(trim(document.frmCreateListing.re_pwd.value)!=trim(document.frmCreateListing.new_pwd.value))
{
	alert("Password must be same");
	document.frmCreateListing.re_pwd.value='';
	document.frmCreateListing.re_pwd.focus();
	return false;
}
return true;	
}

</script>