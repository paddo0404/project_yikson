<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>LOGIN | REGISTER | Welcome to YIKSON </title>
	<!-- Google Fonts -->
	<?php include("include/header_css.php"); ?>
</head>
<body>

<!-- Body Start here -->
<div class="wrap">
	<div class="container pad-30_px">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-lg-10 col-lg-offset-2 col-sm-offset-2 col-md-10 col-sm-10 col-xs-12 pad_tp5">
				<div class="col-md-2 col-sm-2 col-xs-5 col-xs-offset-3 col-lg-offset-0 col-md-offset-0 col-sm-offset-0">
					<div class="logo">
						<a href="index.php"><img class="img-responsive" src="<?php echo base_url(); ?>assets/front/images/ico/logo_original.png" alt="logo" width="77px"></a>
					</div>
				</div>
				<div class="col-md-8 pad_tp20_px col-sm-8">

				        <?php
					if(isset($_GET['ferr'])){  ?>
						
                        <div class="alert alert-danger" style="font-size:12px;">
									
											<strong>
												<i class="icon-remove"></i>
												Error!
											</strong>

											<?php echo $_GET['ferr']; ?>
											<br />
										</div>
				<?php }  if(isset($_GET['fsuccess'])) {?>		
                      <div class="alert alert-block alert-success" style="font-size:12px;"> 
												<strong>
													<i class="icon-ok"></i>
													Success!
												</strong>
												<?php echo $_GET['fsuccess']; ?>
											</div>
						<?php } ?>


					<form id="login_frm" method="post" action="<?php echo site_url('check_login'); ?>">
						<div class="row">
							<div class="col-lg-5 col-md-6 col-xs-12">
								<div class="form-group">
									<input type="email" class="form-control form-custom" id="txtUserName" name="txtUserName" placeholder="E-mail">
								</div>
							</div>
							<div class="col-lg-5 col-md-6 col-xs-12">
								<div class="form-group">
									<input type="password" class="form-control form-custom" id="txtPassword" name="txtPassword" placeholder="Password">
								</div>
							</div>
							<div class="col-lg-10 col-xs-12">
								<div class="pull-right">
									<button class="btn  btn-orange" type="submit">Log In</button>
								</div>
							</div>
							</form>
							<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
								<a href="<?php echo site_url('forgot_pwd'); ?>" class="pull-right forgot_text mrg_btm30_px">Forgot Password ? </a>
							</div>
							 <form  id="singup_frm" method="post" action="<?php echo site_url('register_member'); ?>">

							<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 ">
								<div class="form-group">
									<input type="text" class="form-control form-custom" name="txtFullName" id="txtFullName" placeholder="Full Name">
								</div>
							</div>
							<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="email" class="form-control form-custom" name="txtEmailID" id="txtEmailID" placeholder="E-mail">
								</div>
							</div>
							<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
								<div class="row">
									<div class="col-lg-4 form-group col-md-4 col-sm-4">
										<label class="input-name"> Date of Birth </label>
									</div>
									<div class="col-lg-8 col-md-8 col-sm-8">
										<div class="form-group">
											<div class="input-group check_in_field">
												<input type="text" name="txtDob" id="txtDob" class="form-control form-custom"  placeholder="MM/DD/YYYY" data-provide="datepicker">
												<span class="input-group-addon">
												<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
											<label for="txtDob" generated="true" class="error"></label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="password" class="form-control form-custom" name="txtPwd" id="txtPwd" placeholder="Password">
								</div>
							</div>
							<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="password" class="form-control form-custom" name="txtRetypePassword" id="txtRetypePassword" placeholder="Confirm Password">
								</div>
							</div>
							<div class="col-lg-10 col-md-12 col-sm-12  col-xs-12">
								<div class="row">
									<div class="col-lg-4 form-group col-md-4 col-sm-4 col-xs-5">
										<label class="input-name"> Gender </label>
									</div>
									<div class="col-lg-8 col-md-8 col-sm-8 mrg_tp5_px">
										<div class="form-group">
											<label class="radio-inline radio_contn ash input-name female">
											  <input type="radio" name="rdbGender"  value="Female"> Female
											</label>
											<label class="radio-inline radio_contn ash input-name">
											  <input type="radio" name="rdbGender" value="Male"> Male
											</label>
										</div>
										<label for="rdbGender" generated="true" class="error"></label>
									</div>
								</div>
							</div>
						
								<!-- modifi 29-aug -->
							<div class="col-lg-8 col-lg-offset-1 col-md-12 col-sm-12  col-xs-12">
								<p class="terms_condi">By clicking Create, you agree to our <a href="">Terms</a> and that you have read <br/>our <a href="">Data Policy</a>, including our <a href=""> Cookies Use</a>.</p>
							</div>
							<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 text-center mrg_btm30_px">
									<button class="btn  btn-orange" type="submit">Create</button>
							</div>
							<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 text-center mrg_btm30_px">
								<a href="#" class="btn btn-orange">Connect</a>
								
							</div>
							<!-- modifi 29-aug -->
							
						</div>
					</form>
				</div>
				</div>
			</div>
		</div>
	</div>
	<section class="clearfix copyright">
		<div class="container">
			
		</div>
	</section>
</div>

<!-- JavaScripts -->
		<?php include("include/footer.php"); ?>
<!-- End JavaScripts -->
</body>
</html>
<script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#singup_frm").validate({
    
        // Specify the validation rules
        rules: {
            txtFullName: "required",

            txtEmailID: {
                required: true,
                email: true
            },
		  
		   txtPwd: {
					required: true,
					minlength: 6
				},
			 txtRetypePassword: {
					required: true,
					minlength: 6,
					equalTo: "#txtPwd"
				},
            txtDob: "required",
		 rdbGender:{
				  required: function() {
					return $('[name="rdbGender"]:checked').length; 
				  }
    }
        },
        
        // Specify the validation error messages
        messages: {
            txtFullName: "Please enter your full name",
			
             txtEmailID: { required:"Please enter your email address",
					 email:"Please enter valid email address"
					 },
                 txtPwd: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
						
                    },
             txtRetypePassword: {
                        required: "Re-type password",
                        minlength: "Your re-type password must be at least 6 characters long",
						equalTo:"Re-type password must be match with password"
                    },
				txtDob: "Please enter Date of birth",
			rdbGender: {
						  required: "Please select a gender"
						}
			
        },
        
        submitHandler: function(form) {form.submit();}
    });

	

  });

  
  </script>
