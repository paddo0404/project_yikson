<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designingmedia.com/html/estate-plus/ by HTTrack Website Copier/3.x [XR&CO'2005], Fri, 15 Jul 2016 04:18:49 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>LOGIN | REGISTER | Welcome to YIKSON </title>
	
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
						<img src="<?php echo base_url(); ?>assets/front/images/ico/logo.png" alt="logo">
					</div>
				</div>
				<div class="col-md-8 pad_tp20_px col-sm-8">
				
						<div class="row">
												
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


						<form class="form-signin" id="formu" method="post" action="<?php echo site_url('check_login'); ?>">
							<div class="col-lg-5 col-md-6 col-xs-12">
								<div class="form-group">
									<input type="email" class="form-control form-custom" name="txtUserName" id="txtUserName" placeholder="E-mail">
								</div>
							</div>
							<div class="col-lg-5 col-md-6 col-xs-12">
								<div class="form-group">
									<input type="password" class="form-control form-custom" name="txtPassword" id="txtPassword" placeholder="Password">
								</div>
							</div>
							<div class="col-lg-10 col-xs-12">
								<div class="pull-right">
								<button class="btn  btn-orange" type="submit">Sign in</button>
									
								</div>
							</div>
							<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
								<a href="<?php echo site_url('forgot_pwd'); ?>" class="pull-right forgot_text mrg_btm30_px">Forgot Password ? </a>
							</div>

						</form>




							<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 ">
								<div class="form-group">
									<input type="text" class="form-control form-custom" id="exampleInputName2" placeholder="Full Name">
								</div>
							</div>
							<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="email" class="form-control form-custom" id="exampleInputEmail2" placeholder="E-mail">
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
												<input type="text" class="form-control form-custom"  placeholder="Date of Birth" data-provide="datepicker">
												<span class="input-group-addon">
												<i class="fa fa-calendar bigger-110"></i>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="password" class="form-control form-custom" id="exampleInputPassword3" placeholder="Password">
								</div>
							</div>
							<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="password" class="form-control form-custom" id="exampleInputPassword3" placeholder="Confirm Password">
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
											  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
											</label>
											<label class="radio-inline radio_contn ash input-name">
											  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Male
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
								<a href="feed.html" class="btn pull-right btn-orange">Create</a>
							</div>
							
						</div>
					
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
		<script src="<?php echo base_url(); ?>assets/front/js/jquery-1.12.4.js"></script>
		<script src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/front/js/05.bootstrap-datepicker.min.js"></script>
</body>
</html>