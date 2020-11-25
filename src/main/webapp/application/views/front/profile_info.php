<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designingmedia.com/html/estate-plus/ by HTTrack Website Copier/3.x [XR&CO'2005], Fri, 15 Jul 2016 04:18:49 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Profile Information | Welcome to YIKSON </title>
	<?php include("include/header_css.php"); ?>
</head>
<body>

<!-- Body Start here -->
<div class="wrap">
	<!-- header start -->
		<?php include("include/inner_header.php"); ?>
	<!-- header end -->
	
	<section class="clearfix main_page">
		<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="row">
					<div class="col-lg-7 col-lg-offset-2 col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						<div class="row">
							<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 profile_details" style="background: url('posted_img.jpg')">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 profile_pic">
										<a href="<?php echo site_url('edit_profile'); ?>" class=" font_19 ash"> <img src="<?php echo base_url(); ?>assets/front/images/profile_pag/profile_pic.png"> <?php echo $this->session->userdata('full_name');?></a>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 profile_pic_lft">
										<ul class="profile_acc pull-right">
											
											<li class="information"><a href="<?php echo site_url('profile_information'); ?>" class="active"></a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 secnd_main2 mrg_tp5_px" style="background-color:#ebebeb;">
								<div class="row">
									<ul class=" profile_option">
										<li><a href="Profile_edit.php" class="posters"></a></li>
										<li><a href="profile_photos.php" class="return_pic"></a></li>
										<li><a href="profilr_video.php" class="video"></a></li>
										<li><a href="profile_friend.php" class="friends"></a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mrg_tp5_px text-center">
								<div class="row ">
								<div class="col-lg-6 col-lg-offset-3 col-xs-12 col-sm-8 col-md-7 col-md-offset-3 col-sm-offset-2">
									<div class="score_brd mrg_tp10_px">
										<div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
											<div class="row">
												<p class="score_p">User Score</p>
												<p class="score_p">Creator Score</p>
												<p class="score_p">Account Balance</p>
												<p class="score_p">Uploaded Watermark</p>
											</div>
										</div>
										<div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
											<div class="row">
												<p class="score_val">9.2</p>
												<p class="score_val">1.2</p>
												<p class="score_val">$ 52</p>
												<p class="score_val"><a href="" class="">Saved</a></p>
											</div>
										</div>
									</div>
								</div>
								</div>
								<div class="row ">
									<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6 mrg_tp10_px">
										<h2 class="profile">PROFILE SETTINGS</h2>
										<div class="score_brd">
											<div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
												<div class="row">
													<p class="score_p">User Name</p>
													<p class="score_p">First Name</p>
													<p class="score_p">Second Name</p>
													<p class="score_p">Display Name</p>
												</div>
											</div>
											<div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
												<div class="row">
													<p class="score_val">Yeswolf</p>
													<p class="score_val">Yeswolf</p>
													<p class="score_val">Yeswolf</p>
													<p class="score_val">Yeswolf</p>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6 mrg_tp10_px">
										<h2 class="profile">CONTACT SETTINGS</h2>
										<div class="score_brd">
											<div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
												<div class="row">
													<p class="score_p">Email</p>
													<p class="score_p">Phone Number</p>
													<p class="score_p">Lives in</p>
												</div>
											</div>
											<div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
												<div class="row">
													<p class="score_val">Yeswolf</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row ">
									<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6 mrg_tp10_px">
										<h2 class="profile">ABOUT</h2>
										<div class="score_brd">
											<div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
												<div class="row">
													<p class="score_p">School</p>
													<p class="score_p">College</p>
												</div>
											</div>
											<div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
												<div class="row">
													<p class="score_val">Yeswolf</p>
													<p class="score_val">Yeswolf</p>
													<p class="score_val">Yeswolf</p>
													<p class="score_val">Yeswolf</p>
												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="clearfix copyright">
		<div class="container">
			<div class="row">
				
			</div>
		</div>
	</section>
	<!-- Image Zoom Start -->
								
								<?php include 'include/zoom_image.php' ?>
								<!-- Image Zoom End -->
								
								<!-- Add Post Start -->
								
								<?php include 'include/add_post.php' ?>
								<!-- Add Post End -->
</div>

<!-- JavaScripts -->
<?php include("include/inner_footer.php"); ?>
		<?php include("include/footer.php"); ?>
<!-- End JavaScripts -->
</body>
</html>