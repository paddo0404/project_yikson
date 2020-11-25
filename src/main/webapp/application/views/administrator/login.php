
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Login Page - <?php echo stripslashes($site_settings['0']->title); ?> </title>
<meta name="description" content="User login page" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- basic styles -->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
<!--[if IE 7]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
<!-- page specific plugin styles -->
<!-- fonts -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-fonts.css" />
<!-- ace styles -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-rtl.min.css" />
<!--[if lte IE 8]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-ie.min.css" />
		<![endif]-->
<!-- inline styles related to this page -->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
		<script src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
		<![endif]-->
</head>
<body class="login-layout">
<div class="main-container"> 
  <div class="main-content"> 
    <div class="row"> 
      <div class="col-sm-10 col-sm-offset-1"> 
        <div class="login-container"> 
          <div class="center"> 
            <h1> <i class="icon-leaf green"></i> 
              <span class="white"><?php echo stripslashes($site_settings['0']->c_name); ?></span> </h1>
            <h4 class="blue">&copy; Admin Panel</h4>
          </div>
          <div class="space-6"></div>
          <div class="position-relative"> 
            <div id="login-box" class="login-box visible widget-box no-border"> 
              <div class="widget-body"> 
                <div class="widget-main"> 
                  <h4 class="header blue lighter bigger"> <i class="icon-coffee green"></i> 
                    Please Enter Your Information </h4>
                  <div class="space-6"></div>
                <?php if(validation_errors()){ ?>
                  <div class="alert alert-info" style="color:red;"> 
                   <?php echo validation_errors(); ?>
                  </div>
                  <?php } ?>
                    <?php 
	   $login_message =$this->uri->segment(3);
	   if($login_message=="fail" &&$login_message!=" "){?>
		<div id="form_error" class="formerror" style="color:#F00;"><p><?php echo "Invalid User Details."; ?></p></div>   
	<?php }?>
                  <div class="space-6"></div>
                  <form class="form-horizontal" action="<?php echo site_url('administrator/checkLogin'); ?>" method="post">
                    <fieldset>
                    <label class="block clearfix"> <span class="block input-icon input-icon-right"> 
                    <input type="text" class="form-control" name="uname" id="username" placeholder="Username" />
                    <i class="icon-user"></i> </span> </label>
                    <label class="block clearfix"> <span class="block input-icon input-icon-right"> 
                    <input type="password" class="form-control" name="pwd" id="password" placeholder="Password" />
                    <i class="icon-lock"></i> </span> </label>
                    <div class="space"></div>
                    <div class="clearfix"> 
                      <button type="submit" name="submit" class="width-35 pull-right btn btn-sm btn-primary"> 
                      <i class="icon-key"></i> Login </button>
                    </div>
                    <div class="space-4"></div>
                    </fieldset>
                  </form>
                </div>
                <!-- /widget-main -->
                <div class="toolbar clearfix"> 
                  <div> <a href="<?=site_url('administrator/forgot_pwd')?>"  class="forgot-password-link">
													<i class="icon-arrow-left"></i>
													I forgot my password
												</a>
                  </div>
                </div>
              </div>
              <!-- /widget-body -->
            </div>
            <!-- /login-box -->
            
            <!-- /forgot-box -->
          </div>
          <!-- /position-relative -->
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
</div>
<!-- /.main-container -->
<!-- basic scripts -->
<!--[if !IE]> -->
</body>
</html>
