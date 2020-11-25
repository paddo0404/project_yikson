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
         	<li>
								<i class="icon-home home-icon"></i>
								<a href="<?=site_url("administrator/dashboard")?>">Home</a>
							</li>

							<li class="active"><a href="<?=site_url("administrator/admin_users")?>">Manage Admin Users</a></li>
							<li class="active">Add/Edit Admin Users</li>
        </ul>
        <!-- .breadcrumb -->
        <div class="nav-search" id="nav-search"> 
           <?php include('includes/search.php'); ?>
        </div>
        <!-- #nav-search -->
      </div>
      <div class="page-content"> 
        <div class="page-header"> 
          <h1>Add/Modify Admin Users</h1>
        </div>
        <!-- /.page-header -->
        <div class="row"> 
          <div class="col-xs-12"> 
            <!-- PAGE CONTENT BEGINS -->
           
            <!-- /row -->
         
          
            <div class="row"> 
              <div class="col-xs-12"> 
            
                <?php
			 if(isset($_GET['fsuccess'])) { ?>		
                      <div class="alert alert-block alert-success">  <p>
												<strong>
													<i class="icon-ok"></i>
													Success!
												</strong>
												<?=$_GET['fsuccess']?>
											</p></div>
						<?php }else  if(isset($_GET['ferr'])){ ?>
                         <div class="alert alert-danger">
									
											<strong>
												<i class="icon-remove"></i>
												Error!
											</strong>

											<?=$_GET['ferr']?>.
											<br />
										</div>
                        
                        <?php } ?>
                        
                        <?php
							if($this->uri->segment(3)!='')
							{
							   $hdn_value="Modify Changes";
							 
							}
							else
							{ 
							  $hdn_value="Save Changes";
							}
						?>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<form action="<?=site_url('administrator/add_edit_users')?>" method="post" id="frmCreateListing" name="frmCreateListing" class="form-horizontal" onSubmit="return validate();" enctype="multipart/form-data" > 
       <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">First name: </label>
                
                <div class="col-sm-9">
                
                <input id="focusedInput" class="col-xs-10 col-sm-5"  name="firstname" type="text" value="<?=$get_data['0']->first_name?>">
                </div>
                </div>
                    <div class="space-4"></div>
          <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Last name: </label>
                
                <div class="col-sm-9">
                 <input id="focusedInput" class="col-xs-10 col-sm-5"  name="lastname" type="text" value="<?=$get_data['0']->last_name?>">
                </div>
                </div>
                
                 <div class="space-4"></div>
          <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Username: </label>
                
                <div class="col-sm-9">
                
                 <input id="focusedInput" class="col-xs-10 col-sm-5"  name="uname" type="text" value="<?=stripslashes($get_data['0']->user_name)?>" <?php if(stripslashes($get_data['0']->user_name!="")){ echo "readonly"; }?> >
                </div>
                </div>
                
                  <div class="space-4"></div>
          <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Password: </label>
                
                <div class="col-sm-9">
                
                <input id="focusedInput" class="col-xs-10 col-sm-5"  name="pwd" type="password" value="<?php echo $this->adminmodel->pwdDecrypt($get_data['0']->usr_pwd); ?>">
                </div>
                </div>
                <div class="space-4"></div>
                
                  <div class="space-4"></div>
          <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Retype Password: </label>
                
                <div class="col-sm-9">
                
                <input id="focusedInput" class="col-xs-10 col-sm-5"  name="repwd" type="password" value="<?php echo $this->adminmodel->pwdDecrypt($get_data['0']->usr_pwd); ?>">
                </div>
                </div>
                <div class="space-4"></div>
                 
          <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email ID: </label>
                
                <div class="col-sm-9">
                
                <input id="focusedInput" class="col-xs-10 col-sm-5"  name="email" type="text" value="<?=stripslashes($get_data['0']->email)?>">
                </div>
                </div>
                <div class="space-4"></div>
                
               
                <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">User type: </label>
                
                <div class="col-sm-9">
                   <select class="form-control" id="utype" name="utype"  style="width:425px;">
															<option value="Super Admin">Super Admin</option>
    <option value="Admin">Admin</option>
	</select>
	<script type="text/javascript">
                for(var i=0;i<document.getElementById('utype').length;i++)
                {
						if(document.getElementById('utype').options[i].value=="<?php echo  stripslashes($get_data['0']->utype );?>")
						{
						document.getElementById('utype').options[i].selected=true
						}
                }			
                </script>
             
                </div>
                </div>
              
                <div class="space-4"></div>
                          <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Status: </label>
                
                <div class="col-sm-9">
                   <select class="form-control" id="status" name="status"  style="width:425px;">
															<option value="Active">Active</option>
    <option value="Inactive">Inactive</option>
	</select>
	<script type="text/javascript">
                for(var i=0;i<document.getElementById('status').length;i++)
                {
						if(document.getElementById('status').options[i].value==" <?php echo  stripslashes($get_data['0']->status);?>")
						{
						document.getElementById('status').options[i].selected=true
						}
                }			
                </script>
                
                </div>
                </div>
                    <div class="space-4"></div>
                
                <div class="space-4"></div>
                
                <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                <button class="btn btn-info" type="submit" name="submit" value="<?=$hdn_value?>">
                <i class="icon-ok bigger-110"></i>
              <?=$hdn_value?>
                </button>
                
                &nbsp; &nbsp; &nbsp;
                <button class="btn" type="reset">
                <i class="icon-undo bigger-110"></i>
                Reset
                </button>  <input name="hdn_id" type="hidden" value="<?php echo $get_data['0']->user_id?>">
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
		  
			if(trim(document.frmCreateListing.f_name.value)=='')
			{
				alert("Please enter first name");
				document.frmCreateListing.f_name.value='';
				document.frmCreateListing.f_name.focus();
				return false;
			}
			else if(trim(document.frmCreateListing.l_name.value)=='')
			{
				alert("Please enter last name");
				document.frmCreateListing.l_name.value='';
				document.frmCreateListing.l_name.focus();
				return false;
			}
			if(trim(document.frmCreateListing.title.value)=='')
			{
				alert("Please Enter Title");
				document.frmCreateListing.title.value='';
				document.frmCreateListing.title.focus();
				return false;
		    }
		return true;	
}

</script>